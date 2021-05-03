

<?php
require_once('../libs/dbhelper.php');
$manv = $tennv  = $gioitinh = $chucvu = $idsp = '';
if (isset($_GET['id'])) {
    $idsp      = $_GET['id'];
    $sql     = 'select * from nhanvien where MaNV = ' . $idsp;
    $product = executeSingleResult($sql);
    if ($product != null) {

        $tennv = $product['HoTen']; 

        $gioitinh = $product['GioiTinh'];

        $chucvu = $product['ChucVu'];
    }
}

if (!empty($_POST)) {
    if (isset($_POST['tennv'])) {
        $tennv = $_POST['tennv'];
        $tennv = str_replace('"', '\\"', $tennv);
    }

    if (isset($_POST['gioitinh'])) {
        $gioitinh = $_POST['gioitinh'];
        $gioitinh = str_replace('"', '\\"', $gioitinh);
    }

    if (isset($_POST['chucvu'])) {
        $chucvu = $_POST['chucvu'];
        $content = str_replace('"', '\\"', $chucvu);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (!empty($tennv)) {

        //Luu vao database
        if ($id == '') {
            
            $sql = 'insert into nhanvien (HoTen,GioiTinh,ChucVu) values ( "' . $tennv . '", "' . $gioitinh . '", "' . $chucvu . '" )  ';
        } else {
            $sql = 'update nhanvien set  HoTen = "' . $tennv . '",GioiTinh = "' . $gioitinh . '",ChucVu = "' . $chucvu . '" where MaNV = "' . $id . '" ';
        }

        execute($sql);
        header('Location: ./nhanvien.php');
        
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
                        <h2>QUẢN LÝ NHÂN VIÊN</h2>
                    </center>
                    <form method="post">
                        <div class="form-group">
                            <label for="temsp">Tên Nhân Viên:</label>
                            <input type="text" name="id" value="<?= $idsp ?>" hidden="true">
                            <input required="true" type="text" class="form-control" id="tennv" name="tennv" value="<?= $tennv ?>">
                        </div>
                        

                        <div class="form-group">
                            <label for="gioitinh">Giới Tính:</label>
                            <input required="true" type="text" class="form-control" id="gioitinh" name="gioitinh" value="<?= $gioitinh ?>">
                        </div>

                        
                        
                        
                        <div class="form-group">
                            <label for="chucvu"> Chức Vụ:</label>
                            <input type="text" class="form-control"   name="chucvu" id="chucvu" value="<?= $chucvu ?>">
                        </div>
                        <button class="btn btn-success">Lưu</button>
                    </form>

</div>
  <?php

include('./footer.php');
?>