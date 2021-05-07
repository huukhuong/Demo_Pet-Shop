<?php

require_once('../libs/dbhelper.php');

if(isset($_GET['id']) && isset($_GET['maloai']) && isset($_GET['soluong']) &&isset($_GET['dongia']) ) {
    $id = $_GET['id'];
    $maloai = $_GET['maloai'];
    $soluong = $_GET['soluong'];
    $dongia = $_GET['dongia'];
    $thanhtien = $soluong * $dongia;

    $sql = "UPDATE SanPham SET SoLuong = SoLuong + $soluong WHERE MaSP= $maloai";
    $result = execute($sql);

    $sql = "INSERT INTO ctphieunhap(MaPN, MaSP, SoLuong, DonGia, ThanhTien) VALUES ($id,$maloai,$soluong,$dongia,$thanhtien)";
    $result = execute($sql);

    header("Location: phieunhap.php");
}
