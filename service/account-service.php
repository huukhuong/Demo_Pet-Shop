<?php
session_start();
include "./config.php";

$action = isset($_POST['action']) ? $_POST['action'] : 'update';


if ($action == 'update') {
    if (
        isset($_POST['username']) &&
        isset($_POST['fullname']) &&
        isset($_POST['gender']) &&
        isset($_POST['birthday']) &&
        isset($_POST['phonenumber'])
    ) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $phonenumber = $_POST['phonenumber'];


        if ($gender == 'male')
            $gender =  'Nam';
        else if ($gender == 'female')
            $gender =  'Nữ';
        else
            $gender =  'Khác';

        $date = DateTime::createFromFormat('d/m/Y', $birthday);
        $birthday = $date->format('Y-m-d');


        $sql = "UPDATE KhachHang SET HoTen='$fullname', 
            GioiTinh='$gender', 
            NgaySinh='$birthday', 
            DienThoai='$phonenumber' 
            WHERE TenDangNhap='$username'";


        if (mysqli_query($conn, $sql)) {
            echo "1";
        } else {
            echo 0;
        }
    }
} else if ($action == 'changePass') {
    if (isset($_POST['current_pass']) && isset($_POST['new_pass'])) {
        $username = $_SESSION['username'];
        $old = $_POST['current_pass'];
        $new = $_POST['new_pass'];

        $old = md5($old);
        $new = md5($new);

        $sql = "SELECT * FROM KhachHang WHERE MatKhau='$old' AND TenDangNhap='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo 0;
            die();
        }

        $sql = "UPDATE KhachHang SET MatKhau='$new' WHERE MatKhau='$old' AND TenDangNhap='$username'";

        if (mysqli_query($conn, $sql)) {
            echo 1;
        }
        
    }
}
