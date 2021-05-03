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
        <h2>Xin Chào <?php echo $_SESSION['username'];  ?></h2>
    </center>
    
    
            <?php


            $sql = "select * from taikhoan";
            $dssanpham = executeResult($sql);

            foreach ($dssanpham as $item) {
                if($item['TenDangNhap'] = $_SESSION['username']){
                    echo 'Tài Khoản '. $item['TenDangNhap']. '<br>Mật Khẩu :******<br> Quyền :' .$item['Quyen']  ;
                    break;
                }
            }
            ?>



      

</div>


<?php

include('./footer.php');
?>