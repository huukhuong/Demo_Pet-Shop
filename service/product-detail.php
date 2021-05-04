<?php
header("Content-Type: application/json; charset=utf-8", true);

if (isset($_POST['maSP'])) {
    $maSP = $_POST['maSP'];
    include("./config.php");
    $sql = "SELECT * FROM SanPham WHERE MaSP=$maSP";
    $result = mysqli_query($conn, $sql);

    $arr[] = array();
    while ($row = mysqli_fetch_array($result)) {
        $maSP = $row['MaSP'];
        $tenSP = $row['TenSP'];
        $moTaSanPham = $row['MoTaSanPham'];
        $hinhAnh = $row['HinhAnh'];
        $donGia = $row['DonGia'];
        $soLuong = $row['SoLuong'];

        $arr[] = array(
            "maSP" => $maSP,
            "tenSP" => $tenSP,
            "moTaSanPham" => $moTaSanPham,
            "hinhAnh" => $hinhAnh,
            "donGia" => $donGia,
            "tonKho" => $soLuong
        );
    }
    // chuyển array về dạng JSON cho JS xử lý
    echo json_encode($arr);
}
