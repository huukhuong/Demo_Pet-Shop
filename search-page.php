<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3KS Pet Shop</title>
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
    <link rel="stylesheet" type="text/css" href="./css/content.css">

    <!-- JQUERY 3.5.1 -->
    <script src="./js/jquery-3.5.1/jquery-3.3.1.slim.min.js"></script>

</head>

<style>
    .form-search input {
        padding: 4px;
    }

    .box-search {
        width: 40%;
        padding-right: 10px;
        padding-left: 10px;
        padding-top: 4px;
        padding-bottom: 4px;
        display: flex;
        justify-content: center;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 4px;
    }

    #search-inp {
        border-radius: 4px;
        padding: 6px;
        font-size: 1.2rem;
        color: #333;
        width: 100%;
        overflow: hidden;
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }

    #btn-search {
        margin-left: 10px;
        padding: 10px;
        border-radius: 2px;
        background-color: transparent;
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }
</style>

<body>
    <?php
    include("./templates/header-index.php");

    ?>

    <link rel="stylesheet" type="text/css" href="./css/content.css">
    <main class="mainshop">
        <div class="container">
            <div class="shop-content pt-3">
                <div class="row">
                    <!-- PRODUCT -->
                    <div class="col-12">
                        <div class="shop-sort">
                            <form method="POST" class="form-search w-100">
                                <div class="row">
                                    <div class="md-form mx-2 mt-2 col-md-6 col-12">
                                        <span class="mr-2">Khoảng giá: </span>
                                        <br>
                                        <span class="cr-select">
                                            <label for="min_price">Từ: &nbsp;&nbsp;</label>
                                            <input class="border" type="number" name="min_price" id="min_price">
                                            <br>
                                            <label for="max_price">đến:</label>
                                            <input class="border" type="number" name="max_price" id="max_price">
                                        </span>
                                    </div>
                                    <div class="md-form box-search col-md-6 col-12">
                                        <input type="text" id="search-inp" name="search-inp" class="border" placeholder="Tìm kiếm...">
                                        <button type="button" id="btn-search">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="md-form w-100 mt-2">
                                        <label for="category">Phân loại:</label>
                                        <select name="category" id="category" class="border p-1">
                                            <option value="0">Chọn loại</option>
                                            <?php
                                            include "./service/config.php";
                                            $sql = "SELECT * FROM Loai";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row['MaLoai']?>">
                                                    <?php echo $row['TenLoai']?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="product-pagination"></div>
                        <!-- Đổ database phân trang -->
                    </div>
                    <!-- END PRODUCT -->

                </div>
            </div>
        </div>
    </main>


    <?php include("./templates/footer.php");
    ?>


    <script>
        var keyword;
        var min_price;
        var max_price;
        var sort_category;

        $('#btn-search').click(function() {
            keyword = $('#search-inp').val();
            min_price = $('#min_price').val();
            max_price = $('#max_price').val();
            sort_category = $('#category').val();

            min_price = min_price.trim() == '' || min_price < 0 ? 0 : min_price;
            max_price = max_price.trim() == '' || max_price < 0 ? 2147483647 : max_price;

            if (min_price > 2147483647 || max_price > 2147483647) {
                alert("Khoảng giá quá lớn!");
                return;
            }

            if (min_price > max_price) {
                alert("Khoảng giá không hợp lệ!");
                return;
            }

            loadData_pagination();

        });

        function loadData_pagination(page) {
            $.ajax({
                url: "./service/search-pagination.php",
                method: "POST",
                data: {
                    page: page,
                    keyword: keyword,
                    min_price: min_price,
                    max_price: max_price,
                    category: sort_category
                },
                success: function(data) {
                    $('#product-pagination').html(data);
                }
            });
        }

        $('#search-inp').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $('#btn-search').click();
            }
        });

        $('#min-price').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $('#btn-search').click();
            }
        });

        $('#max-price').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $('#btn-search').click();
            }
        });

        $(document).on('click', '.page-link', function() {
            let page = $(this).attr("id");
            loadData_pagination(page);
        });
    </script>
</body>

</html>