<?php
require_once('../libs/dbhelper.php');
$masp = $tensp = $maloai = $soluong = $donvitinh = $hinhanh = $dongia = $mota = $id = '';
if (isset($_GET['id'])) {
    $idsp      = $_GET['id'];
    $sql     = 'select * from sanpham where MaSP = ' . $idsp;
    $product = executeSingleResult($sql);
    if ($product != null) {
        $masp = $product['MaSP'];
        $tensp = $product['TenSP'];
        $maloai = $product['MaLoai'];
        $soluong = $product['SoLuong'];
        $donvitinh = $product['DonViTinh'];
        $hinhanh = $product['HinhAnh'];
        $dongia = $product['DonGia'];
        $mota = $product['MoTaSanPham'];
    }
}

if (!empty($_POST)) {
    if (isset($_POST['tensp'])) {
        $tensp = $_POST['tensp'];
        $tensp = str_replace('"', '\\"', $tensp);
    }
    if (isset($_POST['maloai'])) {
        $maloai = $_POST['maloai'];
        $maloai = str_replace('"', '\\"', $maloai);
    }
    if (isset($_POST['soluong'])) {
        $soluong = $_POST['soluong'];
        $soluong = str_replace('"', '\\"', $soluong);
    }

    if (isset($_POST['donvitinh'])) {
        $donvitinh = $_POST['donvitinh'];
        $donvitinh = str_replace('"', '\\"', $donvitinh);
    }
    if (isset($_POST['dongia'])) {
        $dongia = $_POST['dongia'];
        $dongia = str_replace('"', '\\"', $dongia);
    }
    if (isset($_POST['hinhanh'])) {
        $hinhanh = $_POST['hinhanh'];
        $hinhanh = str_replace('"', '\\"', $hinhanh);
    }
    if (isset($_POST['mota'])) {
        $mota = $_POST['mota'];
        $content = str_replace('"', '\\"', $mota);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['tensp'])) {
        if ($_FILES['uploadFile']['name'] != NULL) {
            // Kiểm tra file up lên có phải là ảnh không
            if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {

                // Nếu là ảnh tiến hành code upload
                $path = "../img/sanpham/"; // Ảnh sẽ lưu vào thư mục images
                $tmp_name = $_FILES['uploadFile']['tmp_name'];
                $name = $_FILES['uploadFile']['name'];

                move_uploaded_file($tmp_name, $path . $name);
                $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                // Insert ảnh vào cơ sở dữ liệu


            } else {
                // Không phải file ảnh
                echo "Kiểu file không phải là ảnh";
            }
        } else {
            echo "Bạn chưa chọn ảnh upload";
        }
    }
    if (!empty($tensp)) {
        if ($name != '') {
            $name = "./img/sanpham/" . $name;
        } else {
            $name = $hinhanh;
        }
        //Luu vao database
        if ($id == '') {
            $sql = 'insert into sanpham (TenSP,MaLoai,SoLuong,DonViTinh,HinhAnh,DonGia,MoTaSanPham) values ( "' . $tensp . '", "' . $maloai . '" , "' . $soluong . '","' . $donvitinh . '", "' . $name . '","' . $dongia . '", "' . $mota . '" )  ';
        } else {
            $sql = 'update sanpham set  TenSP = "' . $tensp . '",MaLoai = "' . $maloai . '",SoLuong = "' . $soluong . '",DonViTinh ="' . $donvitinh . '",HinhAnh ="' . $name . '",DonGia = "' . $dongia . '" ,MoTaSanPham = "' . $mota . '" where MaSP = "' . $id . '" ';
        }


        execute($sql);

        header('Location: ./product.php');
        die();
    }
}

if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from product where id = ' . $id;
    $product = executeSingleResult($sql);
    if ($product != null) {
        $title       = $product['title'];
        $price       = $product['price'];
        $thumbnail   = $product['thumbnail'];
        $id_category = $product['id_category'];
        $content     = $product['content'];
    }
}

?>



<?php
include('./header.php');
include('./navbar.php');
?>
<div class="container-fluid">
    <center>
        <h2>QUẢN LÝ SẢN PHẨM</h2>
    </center>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="temsp">Tên Sản Phẩm:</label>
            <input type="text" name="id" value="<?= $id ?>" hidden="true">
            <input required="true" type="text" class="form-control" id="tensp" name="tensp" value="<?= $tensp ?>">
        </div>
        <div class="form-group">
            <label for="loai">Loại sản phẩm:</label>
            <select class="form-control" name="maloai" id="maloai">
                <option value="0">-- Lựa chọn loại sản phẩm --</option>
                <?php
                $sql   = 'select * from loai';
                $dsloai = executeResult($sql);

                foreach ($dsloai as $item) {
                    if ($item['MaLoai'] == $maloai) {
                        echo '<option selected id="' . $item['MaLoai'] . '" value="' . $item['MaLoai'] . '">' . $item['TenLoai'] . '</option>';
                    } else {
                        echo '<option id="' . $item['MaLoai'] . '" value="' . $item['MaLoai'] . '">' . $item['TenLoai'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="soluong">Số Lượng:</label>
            <input required="true" type="number" class="form-control" id="soluong" name="soluong" value="<?= $soluong ?>">
        </div>

        <div class="form-group">
            <label for="donvitinh">Đơn Vị sản phẩm:</label>
            <select class="form-control" name="donvitinh" id="donvitinh">
                <option>-- Lựa chọn Đơn Vị Sản Phẩm --</option>
                <?php
                $sql   = 'select * from donvi';
                $dsloai = executeResult($sql);

                foreach ($dsloai as $item) {
                    if ($item['MaDV'] == $donvitinh) {
                        echo '<option selected value="' . $item['MaDV'] . '">' . $item['TenDV'] . '</option>';
                    } else {
                        echo '<option value="' . $item['MaDV'] . '">' . $item['TenDV'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="dongia">Đơn giá:</label>
            <input required="true" type="number" class="form-control" id="dongia" name="dongia" value="<?= $dongia ?>">
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình Ảnh:</label>
            Chọn file ảnh: <input type="file" name="uploadFile" id="thumbnail" value="<?= $hinhanh ?>" onchange="readURL(this);"><br>
            <img src=".<?= $hinhanh ?>" style="max-width: 200px" id="blah">
        </div>
        <div class="form-group">
            <label for="mota"> Mô tả sản phẩm:</label>
            <textarea class="form-control" rows="5" name="mota" id="mota"><?= $mota ?></textarea>
        </div>
        <button class="btn btn-success" id="btn-save">Lưu</button>
    </form>


</div>

<script type="text/javascript">
    $('#btn-save').click(function() {
        $('#soluong').val() > 100000 ? alert('Số lượng quá lớn :))') : "";
        $('#dongia').val() > 100000000 ? alert('Đơn giá quá lớn :))') : "";
        $('#maloai').val() == 0 ? alert('Hãy chọn loại SP') : '';
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php

include('./footer.php');
?>