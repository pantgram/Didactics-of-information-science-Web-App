<!DOCTYPE html>
<?php include('mustLogin.php')?>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Επικοινωνία</title>
    </head>
<body>
<div class="header">
  <h1> Επικοινωνία </h1>
    </div>
    <div class="sidenav">
  <a href="index.html" class="active">Αρχική Σελίδα</a>
  <a href="announcment.html">Ανακοινώσεις</a>
  <a href="communication.html">Επικοινωνία</a>
  <a href="documents.html">Έγραφα μαθήματος</a>
  <a href="homework.html">Εργασίες</a>
</div>
<div class="main">
<p>Η συγκεκριμένη ιστοσελίδα θα παρέχει δύο δυνατότητες για την αποστολή e-mail στον καθηγητή:</p>
<ul>
  <li>Μέσω web φόρμας </li>
  <li>Με χρήση e-mail διεύθυνσης</li>
</ul>
</div>
<h2>Αποστολή e-mail μέσω web φόρμας</h2>
<div class="container">
  <form action="action_page.php">

    <label for="sender" style="font-size: 130%">Your Email</label>
    <input type="text" id="sender" name="sender">

    <label for="subject" style="font-size: 130%">Subject</label>
    <input type="text" id="subject" name="subject">

    <label for="Text" style="font-size:130%">Text</label>
    <textarea id="Text" name="Text" placeholder="Write something.." style="height:150px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
<h2>Αποστολή e-mail με χρήση email διεύθυνσης</h2>
<div class="main">
  <p> Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto:tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a></p>
</div>
  </body>
</html>