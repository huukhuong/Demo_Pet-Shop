<?php
session_start();
$cart = $_SESSION['cart'];

include "./config.php";

if (isset($_POST['maKH']) && isset($_POST['tongTien']) && isset($_POST['diaChi'])) {
    $maKH = $_POST['maKH'];
    $tongTien = $_POST['tongTien'];
    $diaChi = $_POST['diaChi'];
    $dayNow = date("Y-m-d");
    $last_id = 0;

    $sql = "INSERT INTO HoaDon(MaKH, MaNV, NgayLap, TongTien, TrangThai, DiaChiGiaoHang) 
            VALUES ('$maKH','1','$dayNow','$tongTien','0','$diaChi')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
    }

    foreach ($cart as $key => $value) {
        $maSP = $value['maSP'];
        $soLuong = $value['soLuong'];
        $donGia = $value['donGia'];
        $thanhTien = $value['donGia'] * $value['soLuong'];

        $sql = "INSERT INTO CTHoaDon(MaHD, MaSP, SoLuong, DonGia, ThanhTien) 
                VALUES ('$last_id','$maSP','$soLuong','$donGia','$thanhTien')";
        mysqli_query($conn, $sql);
    }
    unset($_SESSION['cart']);
    echo 1;
} else {
    echo 0;
}
