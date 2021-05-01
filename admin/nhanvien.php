
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
                        <h2>QUẢN LÝ NHÂN VIÊN</h2>
                    </center>
                    <a href="./addnhanvien.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm NV</button>
                    </a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="150px">Mã NV </th>
                                <th width="150px">Tên NV</th>
                                <th width="150px">Giới Tính</th>
                                <th width="150px">Chức Vụ</th>
                                <th width="50"></th>
                                <th width="50px"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $sql = "select * from nhanvien";
                            $dssanpham = executeResult($sql);

                            foreach ($dssanpham as $item) {
                                echo '<tr>
				<td>' . ($item['MaNV']) . '</td>
				
				<td>' . $item['HoTen'] . '</td>
                <td>' . $item['GioiTinh'] . '</td>
                <td>' . $item['ChucVu'] . '</td>
				
				<td>
					<a href="addnhanvien.php?id=' . $item['MaNV'] . '"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deletenhanvien(' . $item['MaNV'] . ')">Xoá</button>
				</td>
			</tr>';
                            }
                            ?>



                        </tbody>
                    </table>

                    
</div>
<script type="text/javascript">
        function deletenhanvien(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá nhân viên này không?')
            if (!option) {
                return;
            }

            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'deletenv'
            }, function(data) {
                location.reload()
            })
        }
    </script>
  <?php

include('./footer.php');
?>