<!DOCTYPE html>
<?php include('mustLogin.php')?>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Έγγραφα μαθήματος</title>
    </head>
<body>
  <?php require_once('config.php') ?>
  <?php require_once('doc_functions.php') ?>
  <?php $documents=getDocuments(); ?>
<div class="header">
  <h1> Έγγραφα μαθήματος </h1>
    </div>
<?php include('sidenav.php') ?>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right;  color:#385170;"  href="addDocument.php">Προσθήκη Εγγράφου</a> <hr class="solid">
  </div>
<?php endif ?>
<?php foreach ($documents as $document): ?>
<h2> <?php echo $document['title'] ?> </h2>
<?php if ($_SESSION['role']=="Tutor") : ?>
  <div class="main">
      <a style="float:right;" href="updateDocuments.php?edit_doc=<?php echo $document['id'] ?>"><button class="fa fa-pencil  edit"></button></a>
      <a style="float:right;" href="documents.php?delete_doc=<?php echo $document['id'] ?>"><button class="fa fa-trash  delete"></button></a>
  </div>
<?php endif ?>
<div class="main ">
<p><b> Περιγραφή: </b><?php echo $document['description'] ?> </p>
<a href="<?php echo $document['filepath'] ?>" download>Download</a>
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
