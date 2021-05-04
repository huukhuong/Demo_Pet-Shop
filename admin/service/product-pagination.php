<?php

include "../../libs/config.php";
include "../../libs/dbhelper.php";
include "../../libs/utility.php";
//Lay danh sach danh muc tu database
$limit = 10;
$page  = isset($_GET['page']) ? $_GET['page'] : 1;
$column = isset($_GET['column']) ? ($_GET['column']) : 'MaSP';
$type = isset($_GET['type']) ? $_GET['type'] : 'ASC';

if ($page <= 0) {
    $page = 1;
}

$firstIndex = ($page - 1) * $limit;
$sql = "SELECT sanpham.* , loai.TenLoai FROM sanpham INNER JOIN loai ON loai.MaLoai = sanpham.MaLoai ORDER BY $column $type LIMIT $limit OFFSET $firstIndex";

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

?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>
                <a class="column_sort" id="ma_sp" href="javascript: changeIdSort();">
                    Mã
                </a>
            </th>
            <th style="width : 200px">
                <a class="column_sort" id="hinhanhsp" href="#">
                    Hình Ảnh
                </a>
            </th>
            <th>
                <a class="column_sort" id="tensp" href="javascript: changeNameSort();">
                    Tên
                </a>
            </th>
            <th><a class="column_sort" id="loaisp" href="#">Loại</a></th>
            <th>
                <a class="column_sort" id="giasp" href="javascript: changePriceSort();">
                    Giá
                </a>
            </th>
            <th>
                <a class="column_sort" id="soluongsp" href="javascript: changeQuantitySort();">
                    SL
                </a>
            </th>
            <th style="width : 100px"><a class="column_sort" id="donvisp" href="#">Đơn Vị</a></th>
            <th><a class="column_sort" id="motasp" href="#">Mô Tả</a></th>
            <th width="50px"></th>
            <th width="50px"></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($categoryList as $item) {
            echo '
            <tr>
                <td>' . ($item['MaSP']) . '</td>
                <td><img src=".' . $item['HinhAnh'] . '" style="max-width: 100px"/></td>
                <td>' . $item['TenSP'] . '</td>
                <td>' . $item['TenLoai'] . '</td>
                <td>' . number_format($item['DonGia']) . '</td>
                <td>' . number_format($item['SoLuong']) . '</td>
                <td>' . $item['DonViTinh'] . '</td>
                <td>' . $item['MoTaSanPham'] . '</td>
                <td>
                    <a href="addproduct.php?id=' . $item['MaSP'] . '"><button class="btn btn-warning">Sửa</button></a>
                </td>
                <td>
                    <button class="btn btn-danger" onclick="deleteProduct(' . $item['MaSP'] . ')">Xoá</button>
                </td>
            </tr>           
        ';
        }
        ?>
    </tbody>
</table>

<!-- Phân Trang -->
<ul class="pagination">
    <?php
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="javascript: loadData_pagination(' . ($page - 1) . ')">Previous</a></li>';
    }

    ?>
    <?php
    for ($i = 0; $i < $number; $i++) {
        if ($page == ($i + 1)) {
            echo '<li class="page-item active"><a class="page-link" href="javascript: loadData_pagination(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="javascript: loadData_pagination(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
    }
    ?>
    <?php
    if ($page < $number) {
        echo ' <li class="page-item"><a class="page-link" href="javascript: loadData_pagination(' . ($page + 1) . ')">Next</a></li>';
    }
    ?>
</ul>