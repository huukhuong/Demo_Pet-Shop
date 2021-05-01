<?php

include("./config.php");
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Chống SQL Injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $password = md5($password);
    
    
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT * FROM KhachHang WHERE TenDangNhap='$username' AND MatKhau='$password' AND TinhTrang=1";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query)  == 0) {
        echo 0;
    } else {
        $_SESSION['username'] = $username;
        echo 1;
    }
}
