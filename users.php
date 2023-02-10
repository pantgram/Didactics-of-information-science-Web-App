<?php include('mustLogin.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Χρήστες</title>
    </head>
<body>
  <?php require_once('config.php') ?>
  <?php require_once('user_functions.php') ?>
  <?php $users=getUsers(); ?>
<div class="header">
  <h1> Χρήστες </h1>
    </div>
  <?php include('sidenav.php') ?>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right; color:#385170;" href="addUser.php">Προσθήκη Χρήστη</a> <hr class="solid">
  </div>
<?php endif ?>
<?php foreach ($users as $user): ?>
    <h2> Χρήστης: <?php echo $user['loginame'] ?> </h2>
  <?php if ($_SESSION['role']=="Tutor") : ?>
    <div class="main">
        <a  style="float:right; " href="updateUsers.php?edit_user=<?php echo $user['loginame'] ?>"><button class="fa fa-pencil  edit"></button></a>
        <a  style="float:right;" href="users.php?delete_user=<?php echo $user['loginame'] ?>"><button class="fa fa-trash  delete"></button></a>
    </div>
  <?php endif ?>
  <div class="main ">
<p><b> Όνομα: </b> <?php echo $user['name'] ?> </p>
<p> <b>Επίθετο:</b> <?php echo $user['surname'] ?> </p>
<p> <b>Κωδικός:</b> <?php echo $user['password'] ?> </p>
<p> <b>Ρόλος:</b> <?php echo $user['role'] ?> </p>
</div>
<hr class="solid">
<?php endforeach ?>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  </body>
<script>
// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</html>
