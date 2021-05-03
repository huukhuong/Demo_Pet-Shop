<?php
require_once('../libs/dbhelper.php');

$rec_id = $_POST['id'];

$tongtien = null;

$sql = "SELECT * FROM cthoadon where MaHD =" . $rec_id;
$dscthd = execute($sql);
?>
 
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="200px">Mã HĐ </th>
            <th width="200px">Mã SP </th>
            <th width="200px">SL</th>
            <th width="200px">Đơn Giá</th>
            <th width="300px">Thành Tiền</th>
            
           
        </tr>
    </thead>
    <?php
    //Lay danh sach danh muc tu database

   
    $sql = "SELECT * FROM cthoadon where MaHD =" . $rec_id;
    $dscthd = executeResult($sql);
    foreach ($dscthd as $row) {
        
    ?>
        <tbody>

            <td><?php echo $row['MaHD'];  ?></td>
            <td><?php echo $row['MaSP'];  ?></td>
            <td><?php echo $row['SoLuong'];  ?></td>
            <td><?php echo $row['DonGia'];  ?></td>
            <td><?php echo $row['ThanhTien'] . " VNĐ";  ?></td>
            <?php  $tongtien += $row['ThanhTien']; ?>

        </tbody>
        
    <?php
    }
    
    ?>
    
</table>

<?php 
    echo '<h3 style = "text-align : right; color : red; "> Tổng Hoá Đơn : '.$tongtien.' VNĐ </h3>'; 
?>