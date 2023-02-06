<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    error_reporting(0);
//συνδεθείτε στη βάση δεδομένων
$db = mysqli_connect('webpagesdb.it.auth.gr:3306', 'admin100', '6sQ@o3l0', 'student3631partB');

//αρχικοποίηση μεταβλητών
$loginame = "";
$role    = "";
$name= "";
$surname  = "";
$password   = "";
$errors = array();
echo "1";
if (isset($_POST['login'])) {

  $loginame = mysqli_real_escape_string($db, $_POST['loginame']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($loginame)) {
      array_push($errors, "*Loginame απαιτείται");
  }
  if (empty($password)) {
    array_push($errors, "*Password απαιτείται");
  }

  if (count($errors) == 0) {
  // to make more secure, but in this project we dont want to	$password = md5($password);
  	$query = "SELECT * FROM user WHERE loginame='$loginame' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $currentUser = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
      $role=$currentUser['role'];
      $loginame = $currentUser['loginame'];
      $_SESSION['role']=$role;
  	  $_SESSION['loginame'] = $loginame;
  	  header('location: index.php');
  	}else {
      array_push($errors, "*Λανθασμένος συνδυασμός ονόματος χρήστη/κωδικού πρόσβασης");
  	}
  }
}
?>
