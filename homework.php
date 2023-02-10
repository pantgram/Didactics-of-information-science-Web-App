<!DOCTYPE html>
<?php include('mustLogin.php')?>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Εργασίες Έγγραφα μαθήματος</title>
    </head>
<body>
  <?php require_once('config.php') ?>
  <?php require_once('proj_functions.php')?>
  <?php $projects=getProjects(); ?>
<div class="header">
  <h1> Εργασίες Μαθήματος </h1>
    </div>
<?php include('sidenav.php') ?>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right;  color:#385170;"  href="addProject.php">Προσθήκη Εγγράφου</a> <hr class="solid">
  </div>
<?php endif ?>
<?php foreach ($projects as $project): ?>
<h2> ΕΡΓΑΣΙΑ <?php echo $project['id'] ?> </h2>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right;" href="updateProjects.php?edit_proj=<?php echo $project['id'] ?>"><button class="fa fa-pencil  edit"></button></a>
      <a style="float:right;" href="homework.php?delete_proj=<?php echo $project['id'] ?>"><button class="fa fa-trash  delete"></button></a>
  </div>
<?php endif ?>
<div class="main ">
<p><b> Στοχοι: </b>Οι στόχοι της εργασίας είναι </p>
<p>   <?php echo html_entity_decode($project['goals']); ?>  </p>
 <p> <b>Εκφώνηση:</b> Κατεβάστε την εκφώνηση της εργασίας από </p>
<a href="<?php echo $project['filepath'] ?>" download>εδώ</a>
<p><b> Παραδοτέα:</b></p>
<p> <?php echo html_entity_decode($project['deliverables']); ?> </p>
<p><b>Ημερομηνία παράδοσης:</b> <?php echo $project['date'] ?> </p>
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
