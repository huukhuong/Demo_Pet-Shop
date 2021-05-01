<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- BOOTSTRAP 4.5 -->
    <link rel="stylesheet" href="./css/bootstrap-4.5/bootstrap.min.css">
    <!-- FONTAWESOME 5.15.3-->
    <link rel="stylesheet" href="./fonts/fontawesome-5.15.3/css/all.min.css">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl-carousel/owl.theme.default.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- JQUERY 3.5.1 -->
    <script src="./js/jquery-3.5.1/jquery-3.3.1.slim.min.js"></script>

</head>


<body>

    <?php
    include("./templates/header.php");
    $cart = $_SESSION['cart'];
    $sub_total = 0;
    ?>

    <div class="container">
        <!-- CART -->
        <h2 class="text-center my-4">Chi tiết đơn hàng</h2>
        <table class="table table-bordered">
            <tr>
                <th>Sản phẩm</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Thành tiền</th>
            </tr>

            <?php
            foreach ($cart as $key => $value) {
            ?>
                <tr>
                    <td>
                        <p class="my-0"><?php echo $value['tenSP'] ?></p>
                    </td>
                    <td class="text-center">
                        <span>
                            <?php echo $value['soLuong'] ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php echo number_format($value['donGia'] * $value['soLuong']); ?>
                    </td>
                </tr>
            <?php
                $sub_total += $value['donGia'] * $value['soLuong'];
            }
            ?>

            <tr>
                <td class="text-right text-danger" colspan="2">
                    <h4 class="my-0">Tổng cộng:</h4>
                </td>
                <td class="text-danger">
                    <h4 class="my-0 text-center"><?php echo number_format($sub_total) ?>đ</h4>
                </td>
            </tr>
        </table>
        <!-- END CART -->

        <!-- INFO CUSTOMER -->
        <h2 class="text-center my-4 pt-2 border-top">Thông tin giao hàng</h2>
        <?php
        include "./service/config.php";
        $id = "";
        $fullname = "";
        $phonenumber = "";
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM KhachHang WHERE TenDangNhap='$username'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $fullname = $row['HoTen'];
            $phonenumber = $row['DienThoai'];
        }
        ?>
        <div class="container">
            <form>
                <input type="hidden" id="id" value="<?php echo $id ?>">
                <input type="hidden" id="total" value="<?php echo $sub_total ?>">

                <div class="md-form row mt-2">
                    <label for="fullname" class="col-sm-2 col-form-label text-right text-muted">Người nhận</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-dark" id="fullname" placeholder="vd: Nguyễn Văn Anh" value="<?php echo $fullname ?>">
                    </div>
                </div>
                <div class="md-form row mt-2">
                    <label for="phonenumber" class="col-sm-2 col-form-label text-right text-muted">Điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-dark" id="phonenumber" placeholder="vd: 077668235" value="<?php echo $phonenumber ?>">
                    </div>
                </div>
                <div class="md-form row mt-2">
                    <label for="address" class="col-sm-2 col-form-label text-right text-muted">Địa chỉ nhận hàng</label>
                    <div class="col-sm-10">
                        <textarea class="form-control text-dark" id="address" rows="3" placeholder="vd: 123 Cao Lỗ, Phường 4, Quận 8"></textarea>
                        <small id="err-address" class="text-danger d-none">Không được để trống địa chỉ</small>
                    </div>
                </div>
                <div class="md-form row mt-2">
                    <button class="btn mx-auto" type="submit" id="btnCheckout">Tiến hành đặt hàng</button>
                </div>
            </form>
        </div>
        <!-- INFO CUSTOMER -->
    </div>

    <?php
    include("./templates/footer.php");
    ?>

    <script>
        $(document).ready(function() {
            $('#btnCheckout').click(function() {
                $('#err-address').addClass('d-none');
                $('#address').css('border-color', '#ccc');

                let flag = true;
                let maKH = $('#id').val();
                let tongTien = $('#total').val();
                let address = $('#address').val();
                
                if (address.trim() == "") {
                    $('#address').css('border-color', 'red');
                    $('#err-address').removeClass('d-none');
                    flag = false;
                }

                if (!flag)
                    return false;


                $.ajax({
                    url: "./service/checkout-service.php",
                    method: "POST",
                    data: {
                        maKH: maKH,
                        tongTien: tongTien,
                        diaChi: address
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert("Mua hàng thành công");
                            window.location.href="./cart.php";
                        } else {
                            alert("Mua hàng thất bại");
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>