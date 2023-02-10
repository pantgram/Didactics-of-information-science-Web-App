<?php
  session_start();

  if ($_SESSION['role']!="Tutor") {
  	header('location: login.php');
  }
  ?>
