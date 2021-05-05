<?php
include('./header.php');
include('./navbar.php');
?>
<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');
if (isset($_POST['loc'])) {
  $ngaybatdautop = $_POST['batdautop'];
  $ketthuctop = $_POST['ketthuctop'];
}
?> 

<div class="container-fluid">
  <center>
    <h4>THỐNG KÊ TÌNH HÌNH KINH DOANH</h4>
  </center>

  <div class="table-thongke" style="width:100% ; float :left">
    <br>
    <center>
      <h6 style="color: red;">TOP 5 SẢN PHẨM BÁN CHẠY NHẤT</h6>
    </center>
    <br>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="50px">TOP</th>
          <th width="50px">Mã SP</th>
          <th width="150px">Tên SP</th>
          <th width="150px">Số Lượng Bán Ra</th>


        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST['loc'])) {
          //sql sai
          $sql = "" ;
        } else {
          $sql = "SELECT sanpham.MaSP, sanpham.TenSP, tab.DaBan FROM sanpham, ( SELECT MaSP, DaBan FROM ( SELECT MaSP, SUM(SoLuong) AS DaBan FROM cthoadon GROUP BY MaSP ) temp ) tab WHERE sanpham.MaSP = tab.MaSP ORDER BY tab.DaBan DESC
        ";
          //  $sql = "select * from hoadon where NgayLap BETWEEN '$ngaybatdau' AND '$ketthuc'";  
        }


        $dssanpham = executeResult($sql);
        $top =  1;
        foreach ($dssanpham as $item) {
          echo '<tr>
          <td>' . ($top++) . '</td>
				<td>' . ($item['MaSP']) . '</td>
				
				<td>' . $item['TenSP'] . '</td>
        <td>' . $item['DaBan'] . '</td>
                
			</tr>';
        }
        ?>



      </tbody>
    </table>
        

  </div>



  <?php

  include('./footer.php');
  ?>