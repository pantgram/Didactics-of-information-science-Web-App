<?php include ('config.php')?>
  <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Πιστοποίηση</title>
  <?php require_once('config.php') ?>
</head>
  <body>
    <div class="header">
      <h1> ΠΙΣΤΟΠΟΙΗΣΗ </h1>
        </div>
<div  style="float:left"> <?php include('errors.php'); ?> </div>
  <div class="container-login">
         <form  action="login.php" method="post">

            <label for="loginame"><b>Username</b></label><br>
           <input class="input-login" type="text" name="loginame" placeholder="Enter loginame" value="<?php echo $loginame; ?>" required>
           <br>
           <label for="password"><b>Password</b></label>
           <br>
          <input class="input-login" type="password"  name="password"  placeholder="Enter password" required>
          <br>
          <button class="submit-login" type="submit"  name="login">Login</button>
</div>
</body>
