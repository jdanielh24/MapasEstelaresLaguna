<?php
  session_start();

  session_unset();

  session_destroy();

  //header('Location: index.php');
  echo "<script type='text/javascript'> document.location = 'https://mapasestelareslaguna.000webhostapp.com/index.php'; </script>";
?>