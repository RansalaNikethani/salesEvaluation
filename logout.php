<?php
 session_start();
 unset($_SESSION['login_code']);
 unset($_SESSION['user_role']);
session_destroy();
header("Location:login.php");
?>
