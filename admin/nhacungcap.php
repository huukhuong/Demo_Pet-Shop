
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
                        <h2>QUẢN LÝ NHÀ CUNG CẤP</h2>
                    </center>
                    <a href="./addnhacungcap.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm NCC</button>
                    </a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="150px">Mã NCC </th>
                                <th width="150px">Tên NCC</th>
                                <th width="150px">Địa Chỉ</th>
                                <th width="150px">Điện Thoại</th>
                                <th width="50"></th>
                                <th width="50px"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $sql = "select * from nhacungcap";
                            $dssanpham = executeResult($sql);

                            foreach ($dssanpham as $item) {
                                echo '<tr>
				<td>' . ($item['MaNCC']) . '</td>
				
				<td>' . $item['TenNCC'] . '</td>
                <td>' . $item['DiaChi'] . '</td>
                <td>' . $item['DienThoai'] . '</td>
				
				<td>
					<a href="addnhacungcap.php?id=' . $item['MaNCC'] . '"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="xoancc(' . $item['MaNCC'] . ')">Xoá</button>
				</td>
			</tr>';
                            }
                            ?>



                        </tbody>
                    </table>



</div>
<script type="text/javascript">
        function xoancc(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá NCC này không?')
            if (!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'deletencc'
            }, function(data) {
                location.reload()
            })
        }
    </script>
  <?php

include('./footer.php');
?>