<?php
require_once('../libs/dbhelper.php');
$madv = $tendv = $id  = '';

if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from donvi where MaDV = ' . $id;
    $product = executeSingleResult($sql);
    if ($product != null) {
        $tendv = $product['TenDV'];
        $madv = $product['MaDV'];
    }
}

?>



<?php
include('./header.php');
include('./navbar.php');
?>
<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');
?>
<div class="container-fluid">

    <center>
        <h2>QUẢN LÝ LOẠI</h2>
    </center>
    <form method="get" action="addCTPN-service.php">
        <div class="form-group">
            <input type="text" name="id" value="<?= $id ?>" hidden="true">
            <label for="loai">Tên sản phẩm:</label>
            <select class="form-control" name="maloai" id="maloai">
                <option value="0">-- Lựa chọn loại sản phẩm --</option>
                <?php
                $sql   = 'select * from sanpham';
                $dsloai = executeResult($sql);

                foreach ($dsloai as $item) {

                    echo '<option id="' . $item['MaSP'] . '" value="' . $item['MaSP'] . '">' . $item['TenSP'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tensp">Số Lượng:</label>
            <input required="true" type="number" class="form-control" id="soluong" name="soluong">

        </div>
        <div class="form-group">
            <label for="tensp">Đơn Giá:</label>
            <input required="true" type="number" class="form-control" id="dongia" name="dongia">
        </div>
        <button class="btn btn-success">Lưu</button>
    </form>

</div>
<?php

include('./footer.php');
?>