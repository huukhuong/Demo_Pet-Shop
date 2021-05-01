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

<style>
    .no-cart {
        text-align: center;
        margin: auto;
    }

    .no-cart img {
        width: 100%;
        height: auto;
    }

    .cart-page {
        margin: 80px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 5px;
        background-color: var(--primary-color);
        font-weight: normal;
    }

    th:last-child {
        text-align: right;
    }

    td {
        padding: 10px 5px;
    }

    td:last-child {
        text-align: right;
    }

    .cart-info {
        display: flex;
        flex-wrap: wrap;
    }

    .cart__product--img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    .cart__product-title {
        font-size: 1.2rem;
        margin-bottom: 2px;
    }

    .quantity-cart {
        width: 40px;
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc !important;
        text-align: center;
        border-radius: 2px;
    }

    /* Chrome, Safari, Edge, Opera */
    .quantity-cart::-webkit-outer-spin-button,
    .quantity-cart::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    .quantity-cart[type=number] {
        -moz-appearance: textfield;
    }

    .total-price {
        display: flex;
        justify-content: flex-end;
    }

    .total-price table {
        border-top: 3px solid var(--primary-color);
        width: 100%;
        max-width: 400px;
    }

    @media (max-width: 600px) {
        .cart__product-title {
            display: none;
        }
    }
</style>

<body>

    <?php
    include("./templates/header.php");
    ?>

    <!-- NO CART -->
    <?php
    if (isset($_SESSION['cart'])) {
    ?>
        <div class="container py-5">
            <h2 class="text-center">Bạn chưa có sản phẩm nào trong giỏ hàng</h2>
            <div class="no-cart">
                <img src="./img/empty-cart.png" alt="No cart">
            </div>
        </div>
        <!-- NO CART -->
    <?php
    } else {
    ?>

        <!-- CART -->
        <div class="container cart-page">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/product-img/p2.webp" class="cart__product--img">
                            <div>
                                <p class="cart__product-title">Thức ăn cao cấp cho chó</p>
                                <small>Đơn giá: 200.000đ</small>
                                <br>
                                <a href="" class="text-danger">Xoá</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" class="quantity-cart"></td>
                    <td>200.000đ</td>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/product-img/p1.webp" class="cart__product--img">
                            <div>
                                <p class="cart__product-title">Thức ăn cao cấp cho chó</p>
                                <small>Đơn giá: 200.000đ</small>
                                <br>
                                <a href="" class="text-danger">Xoá</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" class="quantity-cart"></td>
                    <td>200.000đ</td>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="./img/product-img/p3.webp" class="cart__product--img">
                            <div>
                                <p class="cart__product-title">Thức ăn cao cấp cho chó</p>
                                <small>Đơn giá: 200.000đ</small>
                                <br>
                                <a href="" class="text-danger">Xoá</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" class="quantity-cart"></td>
                    <td>200.000đ</td>
                </tr>
            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>
                            <h4>Tổng cộng</h4>
                        </td>
                        <td>
                            <h4>600.000đ</h4>
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