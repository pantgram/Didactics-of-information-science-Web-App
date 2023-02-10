<?php include('mustLogin.php')?>
<?php include('mustTutor.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Δημιουργία Εγγράφου</title>
    </head>
<body>
  <?php require_once('config.php')?>
  <?php require_once('doc_functions.php') ?>
  <div class="header">
    <h1> Έγγραφα </h1>
      </div>
      <?php include('sidenav.php') ?>
      <h2>Δημιουργία Εγγράφου</h2>
      <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

          <label for="title" style="font-size: 130%">Title</label>
          <input class="inputCom" type="text" id="title" name="title" value="<?php echo $docTitle?>" required>

          <label for="description" style="font-size: 130%">Description</label>
          <input class="inputCom" type="text" id="description" name="description" value="<?php echo $docDesc?>" required>

          <label for='file'>Select File </label>
         <input type="file" id='file' name="file" value="<?php echo $filepath?>" accept=".doc,.docx" required>
          <input class="submitCom" type="submit" name="submitDoc" value="Submit">
          </form>
      </div>
    </body>
</html>
