<?php
include("./config.php");
$record_per_page = 8;
$output = '';

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$min_price = isset($_POST['min_price']) ? $_POST['min_price'] : '';
$max_price = isset($_POST['max_price']) ? $_POST['max_price'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : 0;


//==================================================
//===================================================
$start = ($page - 1) * $record_per_page;

$query = "SELECT * FROM SanPham WHERE TenSP LIKE '%$keyword%' AND DonGia > $min_price AND DonGia < $max_price  ORDER BY DonGia ASC LIMIT $start, $record_per_page";

if ($category != 0) {
    $query = "SELECT * FROM SanPham WHERE TenSP LIKE '%$keyword%' AND MaLoai=$category AND DonGia > $min_price AND DonGia < $max_price  ORDER BY DonGia ASC LIMIT $start, $record_per_page";
}

$result = mysqli_query($conn, $query);
$num_row = mysqli_num_rows($result);
if ($num_row == 0) {
    echo '<h3 class="text-center">Không có sản phẩm nào phù hợp với yêu cầu của bạn :(</h3>';
    die();
}

$output .= '<div class="row">';

while ($row = mysqli_fetch_array($result)) {
    $hinhAnh = $row['HinhAnh'];
    if ($hinhAnh == '') {
        $hinhAnh = "''";
    }
    $tenSP = $row['TenSP'];
    $moTa = $row['MoTaSanPham'];
    $donGia = $row['DonGia'];
    $donGia = number_format($donGia, 0, '', ',') . 'đ';
    $maSP = $row['MaSP'];

    $output .= "
        <div class='col-md-3 col-sm-6 col-12 my-2'>
            <div class='card product-card' style='width: 100%; height: 100%;'>
                <div class='card__img-wrap' style='background-image: url(" . $hinhAnh . ")'></div>
                <div class='card-body'>
                    <h5 class='card-title text-truncate' title='$tenSP'>$tenSP</h5>
                    <p class='card-text crop-text-2' style='max-width:100%; font-size: .8rem'>$moTa</p>
                    <p class='car-price'>$donGia</p>
                    ";

    $output .= "
                    <a class='btn' id='$maSP' onclick='return showProductDetail($maSP);'>
                        <i class='fas fa-cart-plus'></i>
                    </a>
                </div>
            </div>
        </div>
    ";
}
$output .= '</div>';


//============================================
//============================================
// tạo n nút phân trang
$output .= '
    <nav aria-label="Page navigation example">
        <ul class="pagination" style="justify-content: center;">
            <li class="page-item mx-1">
                <a class="page-link" id="1" aria-label="First">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">First</span>
                </a>
            </li>
    ';

$page_query = "SELECT * FROM SanPham WHERE TenSP LIKE '%$keyword%' AND DonGia > $min_price AND DonGia < $max_price";
if ($category != 0) {
    $page_query = "SELECT * FROM SanPham WHERE TenSP LIKE '%$keyword%' AND MaLoai=$category AND DonGia > $min_price AND DonGia < $max_price";
}
$page_result = mysqli_query($conn, $page_query);
$total_record = mysqli_num_rows($page_result);
$total_pages = ceil($total_record / $record_per_page);
$page > $total_pages ? $page = 1 : $page = $page;

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page)
        $output .= "<li class='page-item mx-1 active'><a class='page-link' id='$i'>$i</a></li>";
    else
        $output .= "<li class='page-item mx-1'><a class='page-link' id='$i'>$i</a></li>";
}

$output .= '
            <li class="page-item mx-1">
                <a class="page-link" id="' . $total_pages . '" aria-label="Last">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Last</span>
                </a>
            </li>
        </ul>
    </nav>
';


echo $output;
