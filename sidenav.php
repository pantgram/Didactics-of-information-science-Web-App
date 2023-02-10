<!DOCTYPE html>
<?php include('mustLogin.php')?>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <body>
<div class="sidenav">
<a href="index.php">Αρχική Σελίδα</a>
<a href="announcements.php">Ανακοινώσεις</a>
<a href="communication.php">Επικοινωνία</a>
<a href="documents.php">Έγραφα μαθήματος</a>
<a href="homework.php">Εργασίες</a>
<?php if ($_SESSION['role']=="Tutor") : ?>
<a href="users.php">Χρήστες</a>
<?php endif ?>
</div>
</body>
</html>
