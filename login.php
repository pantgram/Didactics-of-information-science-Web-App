<?php include ('config.php')?>
  <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
  <?php require_once('config.php') ?>
</head>
  <body>

<div  style="float:left"> <?php include('errors.php'); ?> </div>
         <form  action="login.php" method="post" style="margin:auto;max-width:300px">
          <div  style="margin:auto;max-width:300px">
           <input type="text" name="loginame" placeholder="loginame" value="<?php echo $loginame; ?>" required>
         </div>
             <div  style="margin:auto;max-width:300px">
              <input type="password"  name="password"  placeholder="password" required>
             </div>
          <button type="submit"  name="login">Login</button>
</form>

</body>
