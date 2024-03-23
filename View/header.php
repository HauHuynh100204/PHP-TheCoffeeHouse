<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eJGqxQa9cAqDJ9yRFTsYUpg2jOg6NRrLhOaF8s3BR9FZB1xl/9cGLC8XaVrKT4x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8y+DJW5ZcZiCpMSy9H2p2YVz3yYbKm54tkYxF6kpScfFZO0HjLEQD8lJTkfb" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cf6aed4189.js" crossorigin="anonymous"></script>

    <style>
        /* css phần địa chỉ */
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 960px;
            }
        }

        @media (min-width: 768px) {
            .container {
                width: 740px;
            }
        }

        .container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .header-meta-list {
            display: flex;
            margin: 0;
            padding: 10px 0;
            justify-content: center;
        }

        @media (min-width: 992px) {
            .header-meta-list>div {
                padding: 0 4.2%
            }
        }

        .header-meta-list>div>a {
            font-size: 12px;
            color: #00000099;
        }

        .header-meta-list a {
            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            font-size: 100%;
            margin: 0;
            outline: 0;
            padding: 0;
            vertical-align: baseline;


            text-decoration: none;
            color: #191919;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;

        }

        .header-meta-list span {
            font-size: 120%;
        }

        .header-user {
            display: flex;
            justify-content: end;
        }

        /* kết thúc css phần địa chỉ */

        /* css navbar */
        .nav-item {
            padding-right: 20px;
            font-weight: bold;
        }

        /* kết thúc css navbar */
    </style>
</head>

<body>
    <Header>
        <!-- Phần địa chỉ với đặt hàng ở đầu -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-meta-list">
                            <div>
                                <a href="/" previewlistener="true">
                                    <img src="https://file.hstatic.net/1000075078/file/vector_706a88566eab4f009bed6eea93cd890b.png">
                                    <span>147 Cửa hàng khắp cả nước</span>
                                </a>
                            </div>
                            <div>
                                <a href="/" previewlistener="true">
                                    <img src="https://file.hstatic.net/1000075078/file/group_8de276faa50c486b9d485826c506803b.png">
                                    <span>Đặt hàng: 1800.6936</span>
                                </a>
                            </div>
                        </div>
                        <!-- Phần đăng kí, đăng nhập, đăng xuất và hiện thông tin người dùng  -->
                        <div class="header-user">
                            <?php
                            if (!isset($_SESSION['makh'])) {
                                echo '<span class="nav-item">
                                <a href="index.php?action=register" class="nav-link">Đăng Ký</a>
                            </span>
                            <span class="nav-item">
                                <a href="index.php?action=login" class="nav-link">Đăng Nhập</a>
                            </span>';
                            }
                            ?>

                            <?php
                            if (isset($_SESSION['makh'])) {
                                echo '<span class="nav-item">
                                        <a href="index.php?action=logout" class="nav-link">Đăng Xuất</a>
                                    </span>';
                            }
                            ?>

                            <span style="padding-right: 20px;">
                                <a href="index.php?action=cart" class="nav-link"><img src="Content/imagethecoffeehouse/cartx2.png" width="30px" height="30px" alt=""></a>
                            </span>
                            <!-- <span>
                                <p style="color: red; margin-top: 20px; margin-left: 0px;">(0)</p>
                            </span> -->
                            <?php
                            if (isset($_SESSION['makh']) && isset($_SESSION['tenkh'])) {
                                echo '<span style="color: red; margin-left: 0px;">' . $_SESSION['tenkh'] . '</span>';
                            } else {
                                echo '<span style="color: red; margin-left: 0px; font-weight: 600">Xin chào !</span>';
                            }
                            ?>
                        </div>
                        <!-- Kết thúc phần đăng kí, đăng nhập, đăng xuất và hiện thông tin người dùng -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Kết thúc phần địa chỉ với đặt hàng ở đầu -->
    </Header>

    <!-- Phần nav-bar menu -->
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="Content/imagethecoffeehouse/logo.png" alt="" style="width: 200px; padding-right: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?action=menu&act=3">Cà phê</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=menu&act=4">Trà</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php?action=menu" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $menu = new menu();
                                $result = $menu->getMenu();
                                while ($set = $result->fetch()) :
                                ?>
                                    <li><a class="dropdown-item" href="index.php?action=menu&act=<?php echo $set['id'] ?>"><?php echo $set['name'] ?></a></li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Chuyện Nhà
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="index.php?action=coffeeholic">Coffeeholic</a></li>
                                <li><a class="dropdown-item" href="index.php?action=teaholic">Teaholic</a></li>
                                <li><a class="dropdown-item" href="index.php?action=blog">Blog</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cảm hứng CloudFee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cửa hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tuyển dụng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Hết phần navbar menu -->

    <!-- Đoạn javascript điều khiển nút bấm navbar-toggler menu -->
    <!-- <script>
        document.getElementById('navbarToggleBtn').addEventListener('click', function() {
            var navbarContent = document.getElementById('navbarSupportedContent');

            // Kiểm tra xem menu đã hiển thị hay chưa
            if (navbarContent.classList.contains('show')) {
                // Nếu đã hiển thị, ẩn đi
                navbarContent.classList.remove('show');
            } else {
                // Nếu chưa hiển thị, hiển thị lên
                navbarContent.classList.add('show');
            }
        });
    </script> -->
    <!--Kết thúc đoạn javascript điều khiển nút bấm navbar-toggler menu -->
</body>

</html>