<?php
require_once('../libs/dbhelper.php');
require_once('../libs/utility.php');
?>
<?php
include('./header.php');
include('./navbar.php');
?>

<div class="container-fluid">
    <center>
        <h2>QUẢN LÝ KHÁCH HÀNG</h2>
    </center>
 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="150px">Mã KH </th>
                <th width="150px">Tên Đăng Nhập</th>
                <th width="150px">Họ Tên</th>
                <th width="150px">Giới Tính</th>
                <th width="150px">Ngày Sinh</th>
                <th width="150px">Điện Thoại</th>
                <th width="150px">Tình Trạng</th>


            </tr>
        </thead>
        <tbody>
            <?php


            $sql = "select * from khachhang";
            $dssanpham = executeResult($sql);

            foreach ($dssanpham as $item) {

                /// 1 là bình thường
                /// 0 là khoá tài khoản
                $trangthai = '<td> <button  class="btn btn-success" onclick="lock(' . $item['id'] . ')">Bình Thường</button> </td>';
                if ($item['TinhTrang'] == 0) {
                    $trangthai = '<td><button class="btn btn-danger"   onclick="unlock(' . $item['id'] . ')">Đang Khoá</button></td>';
                }
                echo '<tr>
                                    <td>' . ($item['id']) . '</td>
                                    
                                    <td>' . $item['TenDangNhap'] . '</td>
                                    <td>' . $item['HoTen'] . '</td>
                                    <td>' . $item['GioiTinh'] . '</td>
                                    <td>' . $item['NgaySinh'] . '</td>
                                    <td>' . $item['DienThoai'] . '</td>
                                    ' . $trangthai . '
		                    	</tr>';
            }
            ?>



        </tbody>
    </table>





</div>
<script type="text/javascript">
        function deleteProduct(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá loại này không?')
            if (!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'deletekh'
            }, function(data) {
                location.reload()
            })
        }

        function unlock(id) {
            var option = confirm('Bạn có muốn mởp khoá tài khoản này không  ?')
            if (!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'unlockaccount'
            }, function(data) {
                location.reload()
            })
        }

        function lock(id) {
            var option = confirm('Bạn có muốn  khoá tài khoản này không  ?')
            if (!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'lockaccount'
            }, function(data) {
                location.reload()
            })
        }
    </script>
<?php

include('./footer.php');
?>