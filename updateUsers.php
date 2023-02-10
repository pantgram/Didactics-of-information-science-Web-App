<?php include('mustLogin.php')?>
<?php include('mustTutor.php')?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Χρήστη</title>
    </head>
<body>
  <?php require_once('config.php') ?>
  <?php require_once('user_functions.php')?>
  <div class="header">
    <h1> Χρήστες </h1>
      </div>
      <?php include('sidenav.php') ?>
      <h2>Επεξεργασία Χρήστη</h2>
      <div class="container">
        <form action="" method="post">

          <label for="loginame" style="font-size: 130%">Loginame</label>
          <input class="inputCom" type="text" id="loginame" name="loginame" value="<?php echo $loginame ?>">

          <label for="name" style="font-size: 130%">Name</label>
          <input class="inputCom" type="text" id="name" name="name" value="<?php echo $name ?>">

          <label for="surname" style="font-size:130%">Surname</label>
          <input class="inputCom" id="surname" name="surname" value="<?php echo $surname ?>">

          <label for="password" style="font-size: 130%">Password</label>
          <input class="inputCom" type="text" id="password" name="password" value="<?php echo $password ?>">

          <label for="role" style="font-size: 130%">Role</label>
          <input class="inputCom" type="text" id="role" name="role" value="<?php echo $role ?>">

          <input class="submitCom" type="submit" name="update_user" value="Submit">
      </div>
    </body>
  </html>
