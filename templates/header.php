<?php
if (!isset($_SESSION))
    session_start();
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./index.php">
            <h3 style="text-transform: uppercase;">3KS PetShop</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shop.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php#contact">Liên hệ</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 d-flex">
                <li class="nav-item">
                    <a class="nav-link nav-icon" id="search-btn" href="./search-page.php">
                        <i class="fas fa-search"></i></a>
                </li>

                <li class="nav-item drop-down">
                    <?php
                    if (!isset($_SESSION['username'])) {
                    ?>
                        <a class="nav-link nav-icon" type="button" data-toggle="modal" data-target="#loginModal">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link nav-icon">
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="drop-down-box">
                            <ul class="drop-down-list">
                                <li class="drop-down-item">
                                    <a href="user.php" class="drop-down-link">
                                        Chi tiết tài khoản
                                    </a>
                                </li>
                                <li class="drop-down-item">
                                    <a href="./service/logout.php" class="drop-down-link">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-icon" href="./cart.php"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<!-- END NAVBAR -->

<?php
include("./templates/login.php");
include("./templates/register.php");
?>