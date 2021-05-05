<?php
require_once('../libs/dbhelper.php');
$mapn = $mancc = $ngaynhap = $manv = $tongtien = $id = $idsp = $masp  = $soluong = $dongia = $thanhtien =    '';
if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from phieunhap where MaPN = ' . $id;
    $product = executeSingleResult($sql);
    if ($product != null) {

        $mancc = $product['MaNCC'];
        $ngaynhap = $product['NgayNhap'];
        $manv = $product['MaNV'];
 
            
    }
}

if (!empty($_POST)) {
    if (isset($_POST['tensp'])) {
        $tensp = $_POST['tensp'];
        $tensp = str_replace('"', '\\"', $tensp);
    }
    if (isset($_POST['mancc'])) {
        $mancc = $_POST['mancc'];
        $mancc = str_replace('"', '\\"', $mancc);
    }
    if (isset($_POST['ngaynhap'])) {
        $ngaynhap = $_POST['ngaynhap'];
        $ngaynhap = str_replace('"', '\\"', $ngaynhap);
    }

    if (isset($_POST['manv'])) {
        $manv = $_POST['manv'];
        $manv = str_replace('"', '\\"', $manv);
    }

   
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['masp'])) {
        $masp = $_POST['masp'];
    }

    if (isset($_POST['soluong'])) {
        $soluong = $_POST['soluong'];
    }

    if (isset($_POST['dongia'])) {
        $dongia = $_POST['dongia'];
    }

    if (isset($_POST['thanhtien'])) {
        $thanhtien = $_POST['thanhtien'];
    }



    if (!empty($mancc)) {

        //Luu vao database
        if ($id == '') {
            $sql = 'insert into phieunhap (MaNCC,NgayNhap,MaNV) values ( "' . $mancc . '", "' . $ngaynhap . '","' . $manv . '")  ';
        } else {
            $sql = 'update phieunhap set  MaNCC = "' . $mancc . '",NgayNhap = "' . $ngaynhap . '",MaNV ="' . $manv . '" where MaPN = "' . $id . '" ';
        }

        execute($sql);

        header('Location: ./phieunhap.php');
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
        <h2>QUẢN LÝ SẢN PHẨM</h2>
    </center>
    <form method="post">
        <div class="form-group">

            <input type="text" name="id" value="<?= $id ?>" hidden="true">
        </div>
        <div class="form-group">
            <label for="loai">Mã Nhà Cung Cấp:</label>
            <select class="form-control" name="mancc" id="mancc">
                <option>-- Lụa chọn Nhà Cung Cấp --</option>
                <?php
                $sql   = 'select * from nhacungcap';
                $dsloai = executeResult($sql);

                foreach ($dsloai as $item) {
                    if ($item['MaNCC'] == $mancc) {
                        echo '<option selected value="' . $item['MaNCC'] . '">' . $item['TenNCC'] . '</option>';
                    } else {
                        echo '<option value="' . $item['MaNCC'] . '">' . $item['TenNCC'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ngaynhap">Ngày Nhập:</label>
            <input required="true" type="date" class="form-control" id="ngaynhap" name="ngaynhap" value="<?= $ngaynhap ?>">
        </div>

        <div class="form-group">
            <label for="manv">Mã Nhân Viên:</label>
            <select class="form-control" name="manv" id="manv">
                <option selected>-- Lụa chọn Nhân Viên--</option>
                <?php
                $sql   = 'select * from nhanvien';
                $dsloai = executeResult($sql);

                foreach ($dsloai as $item) {
                    if ($item['MaNV'] == $manv) {
                        echo '<option selected value="' . $item['MaNV'] . '">' . $item['HoTen'] . '</option>';
                    } else {
                        echo '<option value="' . $item['MaNV'] . '">' . $item['HoTen'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

   











        <button class="btn btn-success">Lưu</button>
    </form>

</div>
<?php

include('./footer.php');
?>