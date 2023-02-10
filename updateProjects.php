<?php include('mustLogin.php')?>
<?php include('mustTutor.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Εργασίας Έγγραφα μαθήματος</title>
    </head>
<body>
  <?php require_once('config.php')?>
  <?php require_once('proj_functions.php')?>
  <div class="header">
    <h1> Εργασίες Έγγραφα μαθήματος </h1>
      </div>
      <?php include('sidenav.php') ?>
      <h2>Επεξεργασία Εργασίας</h2>
      <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

          <label for="date" style="font-size: 130%">Date</label>
          <input class="inputCom" type="date" id="date" name="date" value="<?php echo $date ?>">

          <label for="goals" style="font-size: 130%">Goals</label>
          <input class="inputCom" type="text" id="goals" name="goals" value="<?php echo $goals?>" required>

          <label for="deliverables" style="font-size: 130%">Deliverables</label>
          <input class="inputCom" type="text" id="deliverables" name="deliverables" value="<?php echo $deliverables?>" required>

          <label for='file'>Select File </label>
         <input type="file" id='file' name="file" value="<?php echo $filepath?>" accept=".doc,.docx" required>

          <input class="submitCom" type="submit" name="update_Proj" value="Submit">
          </form>
      </div>
    </body>
</html>
