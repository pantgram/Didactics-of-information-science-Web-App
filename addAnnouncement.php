<?php include('mustLogin.php')?>
<?php include('mustTutor.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Δημιουργία Ανακοίνωσης</title>
    </head>
<body>
  <?php require_once('config.php') ?>
    <?php require_once('ann_functions.php') ?>
  <div class="header">
    <h1> Ανακοινώσεις </h1>
      </div>
      <?php include('sidenav.php') ?>
      <h2>Δημιουργία Ανακοίνωσης</h2>
      <div class="container">
        <form action="" method="post">

          <label for="date" style="font-size: 130%">Date</label>
          <input class="inputCom" type="date" id="date" name="date" value="<?php echo $date ?>">

          <label for="subject" style="font-size: 130%">Subject</label>
          <input class="inputCom" type="text" id="subject" name="subject" value="<?php echo $subject ?>">

          <label for="Text" style="font-size:130%">Text</label>
          <textarea class="inputCom" id="Text" name="text" value="<?php echo $text ?>" placeholder="Write something.." style="height:150px"></textarea>

          <input class="submitCom" type="submit" name="submitAnn" value="Submit">
      </div>
    </body>
  </html>
