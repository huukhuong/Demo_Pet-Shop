<?php

include("./config.php");
session_start();

if (isset($_GET['maSP'])) {

    $maSP = $_GET['maSP'];

    $soLuong =  (isset($_GET['soLuong'])) ? $_GET['soLuong'] : 1;
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

    // if (isset($_SESSION['cart'][$maSP]) && $action != 'delete') {
    //     $action = 'update';
    // }

    $sql = "SELECT * FROM SanPham WHERE MaSP=$maSP";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $product = mysqli_fetch_array($result);

        $item = [
            'maSP' => $product['MaSP'],
            'tenSP' => $product['TenSP'],
            'hinhAnh' => $product['HinhAnh'],
            'donGia' => $product['DonGia'],
            'soLuong' => $product['SoLuong']
        ];

        if ($action == 'add') {
            if (isset($_SESSION['cart'][$maSP])) {
                if ($_SESSION['cart'][$maSP]['soLuong'] + $soLuong > $item['soLuong']) {
                    echo "Số lượng còn lại không đủ cho yêu cầu của bạn!";
                    die();
                }
                $_SESSION['cart'][$maSP]['soLuong'] += $soLuong;
            } else {
                if ($soLuong > $item['soLuong']) {
                    echo "Số lượng còn lại không đủ cho yêu cầu của bạn!";
                    die();
                }
                $_SESSION['cart'][$maSP] = $item;
                $_SESSION['cart'][$maSP]['soLuong'] = $soLuong;
            }
            echo "Thêm thành công";
            die();
        }

        $item = [
            'maSP' => $product['MaSP'],
            'tenSP' => $product['TenSP'],
            'hinhAnh' => $product['HinhAnh'],
            'donGia' => $product['DonGia'],
            'soLuong' => $product['SoLuong']
        ];


        if ($action == 'update') {
            if ($soLuong > $item['soLuong']) {
                echo "
                <script>
                    alert('Số lượng còn lại không đủ cho yêu cầu của bạn!');
                    window.location.href = '../cart.php';
                </script>";
                die();
            }
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
