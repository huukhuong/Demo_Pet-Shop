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
        <h2>QUẢN LÝ LOẠI SẢN PHẨM</h2>
    </center>
     <a href="./addloai.php">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Loại</button>
    </a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50px">Mã Loại </th>
                <th width="150px">Tên Loại</th>

                <th width="50px"></th>
                <th width="50px"></th>

            </tr>
        </thead>
        <tbody>
            <?php


            $sql = "select * from loai";
            $dssanpham = executeResult($sql);

            foreach ($dssanpham as $item) {
                echo '<tr>
				<td>' . ($item['MaLoai']) . '</td>
				
				<td>' . $item['TenLoai'] . '</td>
				
				<td>
					<a href="addloai.php?id=' . $item['MaLoai'] . '"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteProduct(' . $item['MaLoai'] . ')">Xoá</button>
				</td>
                
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
            'action': 'deleteloai'
        }, function(data) {
            location.reload()
        })
    }
</script>
<?php

include('./footer.php');
?>