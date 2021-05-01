<?php
require_once("./config.php");
session_start();

if (
    isset($_POST['fullname']) && isset($_POST['username']) &&
    isset($_POST['phonenumber']) && isset($_POST['password'])
) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    // Chống SQL Injection
    $fullname = strip_tags($fullname);
    $fullname = addslashes($fullname);
    $username = strip_tags($username);
    $username = addslashes($username);
    $phonenumber = strip_tags($phonenumber);
    $phonenumber = addslashes($phonenumber);
    $password = strip_tags($password);
    $password = addslashes($password);
    $password = md5($password);


    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // check trùng tên đăng nhập
    $sql = "SELECT * FROM KhachHang WHERE TenDangNhap='" . $username . "'";
    $query = mysqli_query($conn, $sql);
    // bị trùng

    if (mysqli_num_rows($query)  == 1) {
        echo 0;
    }
    // không trùng 
    else {
        $sql = "INSERT INTO KhachHang(TenDangNhap, MatKhau, HoTen, GioiTinh, NgaySinh, DienThoai, TinhTrang) 
                VALUES ('$username','$password','$fullname','Nam','1990-01-01','$phonenumber','1')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            echo 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
