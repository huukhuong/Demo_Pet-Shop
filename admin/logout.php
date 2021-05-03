<?php
session_start();

unset($_SESSION["username-admin"]);
header("Location:dangnhap.php");
?> 