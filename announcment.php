<?php include('mustLogin.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ανακοινώσεις</title>
    </head>
<body>
<div class="header">
  <h1> Ανακοινώσεις </h1>
    </div>
    <div class="sidenav">
  <a href="index.html">Αρχική Σελίδα</a>
  <a href="announcment.html">Ανακοινώσεις</a>
  <a href="communication.html">Επικοινωνία</a>
  <a href="documents.html">Έγραφα μαθήματος</a>
  <a href="homework.html">Εργασίες</a>
</div>
  <h2> ΑΝΑΚΟΙΝΩΣΗ 1 </h2>
  <div class="main ">
<p><b> Ημερομηνία: </b> 1/10/2022 </p>
<p> <b>Θέμα:</b> Έναρξη μαθημάτων </p>
<p> Τα μαθήματα αρχίζουν την Τρίτη 1/10/2022. </p>
</div>
<hr class="solid">
<h2> ΑΝΑΚΟΙΝΩΣΗ 2 </h2>
<div class="main ">
<p><b> Ημερομηνία: </b> 28/10/2022 </p>
<p> <b>Θέμα:</b> Ανακοίνωση εργασίας </p>
<p> Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="homework.html">Εργασίες</a></p>
</div>
<hr class="solid">
<h2> ΑΝΑΚΟΙΝΩΣΗ 3 </h2>
<div class="main ">
<p><b> Ημερομηνία: </b> 08/01/2023 </p>
<p> <b>Θέμα:</b> Ανακοίνωση εργασίας </p>
<p> Η 2η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="homework.html">Εργασίες</a> </p>
</div>
<hr class="solid">
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