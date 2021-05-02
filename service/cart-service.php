<?php

include("./config.php");
session_start();

if(!isset($_SESSION['username'])) {
    echo 0;
    die();
}

if (isset($_GET['maSP'])) {

    $maSP = $_GET['maSP'];

    $soLuong =  (isset($_GET['soLuong'])) ? $_GET['soLuong'] : 1;
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

    $sql = "SELECT * FROM SanPham WHERE MaSP=$maSP";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
        $item = [
            'maSP' => $product['MaSP'],
            'tenSP' => $product['TenSP'],
            'hinhAnh' => $product['HinhAnh'],
            'donGia' => $product['DonGia'],
            'soLuong' => $soLuong
        ];

        if ($action == 'add') {
            if (isset($_SESSION['cart'][$maSP])) {
                // CẬP NHẬT GIỎ HÀNG
                $_SESSION['cart'][$maSP]['soLuong'] += $soLuong;
            } else {
                // THÊM MỚI VÀO GIỎ HÀNG
                $_SESSION['cart'][$maSP] = $item;
            }
            echo 1;
            die();
        }

        if ($action == 'update') {
            $_SESSION['cart'][$maSP]['soLuong'] = $soLuong;
            header("Location: ../cart.php");
            die();
        }

        if ($action == 'delete') {
            unset($_SESSION['cart'][$maSP]);

            if (empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }

            header("Location: ../cart.php");
            die();
        }
    }
}
