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
        <h2>QUẢN LÝ PHIẾU NHẬP</h2>
    </center>
    <a href="./addphieunhap.php">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Phiếu Nhập</button>
    </a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="150px">Mã PN </th>
                <th width="150px">Mã NCC</th>
                <th width="150px">Mã NV</th>
                <th width="150px">Ngày Nhập</th>

               
                <th width="50px"></th>
                <th width="50px"></th>
                <th width="50px"></th>
                <th width="50px"></th>

            </tr>
        </thead>
        <tbody>
            <?php


            $sql = "SELECT ncc.TenNCC, pn.*, nv.HoTen FROM phieunhap AS pn INNER JOIN nhacungcap AS ncc ON pn.MaNCC = ncc.MaNCC INNER JOIN nhanvien AS nv ON pn.MaNV = nv.MaNV";
            $dssanpham = executeResult($sql);

            foreach ($dssanpham as $item) {
                echo '<tr>
				<td>' . ($item['MaPN']) . '</td>
				
				<td>' . $item['TenNCC'] . '</td>
                <td>' . $item['HoTen'] . '</td>
                <td>' . $item['NgayNhap'] . '</td>
                
                
				
				<td>
					<a href="addphieunhap.php?id=' . $item['MaPN'] . '"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteProduct(' . $item['MaPN'] . ')">Xoá</button>
				</td>

                <td>
					<button class="btn btn-success get_id"  data-id= ' . $item['MaPN'] . ' onclick="deleteProduct1(' . $item['MaPN'] . ')" data-toggle="modal" data-target="#myModal">CT</button>
				</td>
                <td>
                <a href="addctphieunhap.php?id=' . $item['MaPN'] . '"><button class="btn btn-warning">Thêm</button></a>
            </td>
               
			</tr>';
            }
            ?>



        </tbody>
    </table>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CHI TIẾT PHIẾU NHẬP</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="load_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
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
                'action': 'deletephieunhap'
            }, function(data) {
                location.reload()
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".get_id").click(function() {
                var ids = $(this).data('id');
                $.ajax({
                    url: "chitietphieunhap.php",
                    method: 'POST',
                    data: {
                        id: ids
                    },
                    success: function(data) {

                        $('#load_data').html(data);

                    }

                })
            })

        })
    </script>

<?php

include('./footer.php');
?>