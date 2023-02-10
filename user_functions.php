<?php
error_reporting(0);

function getUsers() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM user ";
	$result = mysqli_query($conn, $sql);

	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $users;
}
/* - - - - - - - - - -
-  Admin users actions
- - - - - - - - - - -*/
// if user clicks the create user button
if (isset($_POST['create_user'])) {
	createUser($_POST);
}
// if user clicks the Edit user button
if (isset($_GET['edit_user'])) {
	$loginame = $_GET['edit_user'];
	editUser($loginame);
}
// if user clicks the update user button
if (isset($_POST['update_user'])) {
	updateUser($_POST,$loginame);
}
// if user clicks the Delete user button
if (isset($_GET['delete_user'])) {
	$loginame = $_GET['delete_user'];
	deleteUser($loginame);
}


function createUser($request_values){
    global $conn;// λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $loginame = mysqli_real_escape_string($conn, $_POST['loginame']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    /*ελέγξτε πρώτα τη βάση δεδομένων για να βεβαιωθείτε
 δεν υπάρχει ήδη χρήστης με το ίδιο loginame*/
    $user_check_query = "SELECT * FROM user WHERE loginame='$loginame' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) { // εάν υπάρχει χρήστης

    $query = "INSERT INTO user (name, surname, role, loginame, password)
            VALUES('$name', '$surname', '$role', '$loginame', '$password')";
            mysqli_query($conn, $query);
            header('location: users.php');
            exit(0);
	             }

}

/* * * * * * * * * * * * * * * * * * * * *
* - Takes user id as parameter
* - Fetches the user from database
* - sets user fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editUser($loginame)
{
	global $conn, $loginame,$password, $name,$surname,$role;

	$sql = "SELECT * FROM user WHERE loginame='$loginame' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);

	// set form values ($loginame and $email) on the form to be updated
	$loginame = $user['loginame'];
	$name = $user['name'];
	$surname = $user['surname'];
	$password = $user['password'];
	$role = $user['role'];
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* - Receives admin request from form and updates in database
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function updateUser($request_values,$loginame){
	global $conn;
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$surname = mysqli_real_escape_string($conn, $_POST['surname']);
	$loginame1 = mysqli_real_escape_string($conn, $_POST['loginame']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	// register user if there are no errors in the form
	/*ελέγξτε πρώτα τη βάση δεδομένων για να βεβαιωθείτε
δεν υπάρχει ήδη χρήστης με το ίδιο email*/
if($loginame1!=$loginame){
	$user_check_query = "SELECT * FROM user WHERE loginame='$loginame1' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);
}
	if (!$user) { // εάν υπάρχει χρήστης

		$query = "UPDATE user SET loginame='$loginame1',name='$name', surname='$surname', role='$role', password='$password'  WHERE loginame='$loginame'";
		 mysqli_query($conn, $query);
		header('location: users.php');
		exit(0);
	}
}
// delete admin user
function deleteUser($loginame) {
	global $conn;
	$sql = "DELETE FROM user WHERE loginame='$loginame'";
	if (mysqli_query($conn, $sql)) {
		header("location: users.php");
		exit(0);
	}
}
