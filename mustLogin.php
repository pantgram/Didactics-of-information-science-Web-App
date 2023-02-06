<?php
  session_start();

  if (!isset($_SESSION['loginame'])) {
  	header('location: login.php');
  }
  ?>
