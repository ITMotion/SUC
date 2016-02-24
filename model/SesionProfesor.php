<?php
  session_start();
  if($_SESSION['permisos'] != 2) {
    if ($_SESSION['permisos'] == 1) {
      header("Location: Administrator.php?unauthorized");
    }
  }
?>
