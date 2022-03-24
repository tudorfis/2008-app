<?php
  
  session_start();
  include 'functions.php';
  $user = new User();
  $user->user_logout();
  header("Location: login.php");
