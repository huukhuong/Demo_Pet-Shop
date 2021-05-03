<?php
require_once('../libs/dbhelper.php');
$mancc = $tenncc = $maloai = $diachi = $sdt = $idsp = '';
if (isset($_GET['id'])) {
    $idsp      = $_GET['id'];
    $sql     = 'select * from nhacungcap where MaNCC = ' . $idsp;
    $product = executeSingleResult($sql);
    if ($product != null) {

        $tenncc = $product['TenNCC'];
 
        $diachi = $product['DiaChi'];

        $sdt = $product['DienThoai'];
    }
}

if (!empty($_POST)) {
    if (isset($_POST['tenncc'])) {
        $tenncc = $_POST['tenncc'];
        $tenncc = str_replace('"', '\\"', $tenncc);
    }

    if (isset($_POST['diachi'])) {
        $diachi = $_POST['diachi'];
        $diachi = str_replace('"', '\\"', $diachi);
    }

    if (isset($_POST['sdt'])) {
        $sdt = $_POST['sdt'];
        $content = str_replace('"', '\\"', $sdt);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (!empty($tenncc)) {

        //Luu vao database
        if ($id == '') {

            $sql = 'insert into nhacungcap (TenNCC,DiaChi,DienThoai) values ( "' . $tenncc . '", "' . $diachi . '", "' . $sdt . '" )  ';
        } else {
            $sql = 'update nhacungcap set  TenNCC = "' . $tenncc . '",DiaChi = "' . $diachi . '",DienThoai = "' . $sdt . '" where MaNCC = "' . $id . '" ';
        }

        execute($sql);
        header('Location: ./nhacungcap.php');

        die();
    }
}


?>
<?php
include('./header.php');
include('./navbar.php');
?>

<div class="container-fluid">
    <center>
        <h2>QUẢN LÝ NHÀ CUNG CẤP</h2>
    </center>
    <form method="post">
        <div class="form-group">
            <label for="temsp">Tên Nhà Cung Cấp:</label>
            <input type="text" name="id" value="<?= $idsp ?>" hidden="true">
            <input required="true" type="text" class="form-control" id="tenncc" name="tenncc" value="<?= $tenncc ?>">
        </div>


        <div class="form-group">
            <label for="diachi">Địa Chỉ:</label>
            <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?= $diachi ?>">
        </div>




        <div class="form-group">
            <label for="sdt"> Số điện thoại:</label>
            <input type="number" class="form-control" name="sdt" id="sdt" value="<?= $sdt ?>">
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>
</div>
<?php

include('./footer.php');
?>