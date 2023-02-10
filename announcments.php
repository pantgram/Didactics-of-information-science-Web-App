<?php include('mustLogin.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ανακοινώσεις</title>
    </head>
<body>
  <?php require_once('config.php') ?>
  <?php require_once('ann_functions.php') ?>
  <?php $announcements=getAnnouncements(); ?>
<div class="header">
  <h1> Ανακοινώσεις </h1>
    </div>
  <?php include('sidenav.php') ?>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right;  color:#385170;" href="addAnnouncement.php">Προσθήκη Ανακοίνωσης</a> <hr class="solid">
  </div>
<?php endif ?>
<?php foreach ($announcements as $announcement): ?>
  <h2> ΑΝΑΚΟΙΝΩΣΗ <?php echo $announcement['id'] ?> </h2>
  <?php if ($_SESSION['role']=="Tutor") : ?>
    <div class="main">
        <a style="float:right;" href="updateAnnouncements.php?edit_ann=<?php echo $announcement['id'] ?>"><button class="fa fa-pencil  edit"></button></a>
        <a style="float:right;" href="announcement.php?delete_ann=<?php echo $announcement['id'] ?>"><button class="fa fa-trash  delete"></button></a>
    </div>
  <?php endif ?>
  <div class="main ">
<p><b> Ημερομηνία: </b> <?php echo $announcement['date'] ?> </p>
<p> <b>Θέμα:</b> <?php echo $announcement['subject'] ?> </p>
<p> <?php echo $announcement['Text'] ?>
<?php if ($announcement['subject']=="Ανακοίνωση εργασίας") : ?>
  <a href="homework.php">Εργασίες</a>
<?php endif ?> </p>
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
