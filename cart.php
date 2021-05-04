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
    ?>

    <?php
    if (!isset($_SESSION['cart'])) {
    ?>
        <!-- NO CART -->
        <div class="container py-5">
            <h2 class="text-center">Bạn chưa có sản phẩm nào trong giỏ hàng</h2>
            <div class="no-cart">
                <img src="./img/empty-cart.png" alt="No cart">
            </div>
        </div>
        <!-- NO CART -->
    <?php
    } else {
        $cart = $_SESSION['cart'];
        $sub_total = 0;
    ?>
        <!-- CART -->
        <div class="container cart-page">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>

                <?php
                foreach ($cart as $key => $value) {
                ?>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="<?php echo $value['hinhAnh'] ?>" class="cart__product--img">
                                <div>
                                    <p class="cart__product-title"><?php echo $value['tenSP'] ?></p>
                                    <small>Đơn giá: <?php echo $value['donGia'] ?></small>
                                    <br>
                                    <a href="<?php echo "./service/cart-service.php?action=delete&maSP=" . $value['maSP']; ?>" class="text-danger">
                                        Xoá
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="./service/cart-service.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="maSP" value="<?php echo $value['maSP'] ?>">
                                <input type="number" name="soLuong" value="<?php echo $value['soLuong'] ?>" class="quantity-cart">
                                <button type="submit" class="btn-warning" style="border-radius: 2px;padding: 4px;">
                                    Cập nhật
                                </buton>
                            </form>
                        </td>
                        <td>
                            <?php echo number_format($value['donGia'] * $value['soLuong']); ?>
                        </td>
                    </tr>
                <?php
                    $sub_total += $value['donGia'] * $value['soLuong'];
                }
                ?>


            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>
                            <h4>Tổng cộng</h4>
                        </td>
                        <td>
                            <h4><?php echo number_format($sub_total) ?>đ</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <a href="./checkout.php" class="btn">Thanh toán ngay</a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- END CART -->
    <?php
    }
    ?>
    <?php
    include("./templates/footer.php");
    ?>

</body>

</html>