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
        <h2>QUẢN LÝ SẢN PHẨM</h2>
    </center>
    <a href="./addproduct.php">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
    </a>
    <!-- <form>
        <select name="sapxep" id="sapxep">
            <option value="tang">TANG</option>
            <option value="giam">GIAM</option>
            
        </select>
        <input type="submit" value="submit">
    </form> -->

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><a class="column_sort" id="ma_sp" data-order="desc" href="#">Mã</a></th>
                <th style="width : 200px"><a class="column_sort" id="hinhanhsp" data-order="desc" href="#">Hình Ảnh</a></th>
                <th><a class="column_sort" id="tensp" data-order="desc" href="#">Tên</a></th>
                <th><a class="column_sort" id="loaisp" data-order="desc" href="#">Loại</a></th>
                <th><a class="column_sort" id="giasp" data-order="desc" href="#">Giá</a></th>
                <th><a class="column_sort" id="soluongsp" data-order="desc" href="#">SL</a></th>
                <th style="width : 100px"><a class="column_sort" id="donvisp" data-order="desc" href="#">Đơn Vị</a></th>
                <th><a class="column_sort" id="motasp" data-order="desc" href="#">Mô Tả</a></th>
                <th width="50px"></th>
                <th width="50px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Lay danh sach danh muc tu database
            $limit = 10;
            $page  = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
            if ($page <= 0) {
                $page = 1;
            }
            $firstIndex = ($page - 1) * $limit;
            // $sql2 = 'select * from sanpham where 1 limit ' . $firstIndex . ' , ' . $limit  ;
            // $sql1 ="(SELECT * FROM sanpham WHERE 1 ORDER BY MaSP LIMIT $firstIndex) UNION SELECT * FROM sanpham WHERE 1 ORDER BY MaSP DESC LIMIT $limit ";
           // $sql = "SELECT * FROM sanpham ORDER BY MaSP DESC";  
           $sql = "SELECT sanpham.* , loai.TenLoai FROM sanpham INNER JOIN loai ON loai.MaLoai = sanpham.MaLoai ORDER BY MASP DESC LIMIT $limit OFFSET $firstIndex";

            $categoryList = executeResult($sql);

            $sql         = 'select count(MaSP) as total from sanpham';
            $countResult = executeSingleResult($sql);
            $number      = 0;
            if ($countResult != null) {
                $count  = $countResult['total'];
                $number = ceil($count / $limit);
            }

            $sql = "select * from sanpham";
            $dssanpham = executeResult($sql);
            $index = 1;
            foreach ($categoryList as $item) {
                echo '<tr>
				<td>' . ($item['MaSP']) . '</td>
				<td><img src=".' . $item['HinhAnh'] . '" style="max-width: 100px"/></td>
				<td>' . $item['TenSP'] . '</td>
				<td>' . $item['TenLoai'] . '</td>
				<td>' . $item['DonGia'] . '</td>
				<td>' . $item['SoLuong'] . '</td>
                <td>' . $item['DonViTinh'] . '</td>
                <td>' . $item['MoTaSanPham'] . '</td>
				<td>
					<a href="addproduct.php?id=' . $item['MaSP'] . '"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteProduct(' . $item['MaSP'] . ')">Xoá</button>
				</td>
			</tr>';
            }
            ?>



        </tbody>
    </table>

    <!-- Phân Trang -->
    <ul class="pagination">
        <?php
        if ($page > 1) {
            echo ' <li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
        }

        ?>
        <?php
        for ($i = 0; $i < $number; $i++) {
            if ($page == ($i + 1)) {
                echo '<li class="page-item active"><a class="page-link" href="?page=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
            }
        }
        ?>
        <?php
        if ($page < $number) {
            echo ' <li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
        }

        ?>
    </ul>
</div>
<script type="text/javascript">
    function deleteProduct(id) {
        var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
        if (!option) {
            return;
        }

        console.log(id)
        $.post('ajax.php', {
            'id': id,
            'action': 'delete'
        }, function(data) {
            location.reload()
        })
    }
</script>

<?php

include('./footer.php');
?>