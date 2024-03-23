<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <title>The Coffee House</title> -->

    <style>
        /* /* css phần menu * */
        .menu_home {
            padding-top: 40px;
            padding-bottom: 20px;
        }

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


        a :hover {
            color: orange;
        }

        /* Kết thúc css phần menu */

        /* Css phần stori */
        .cloudtea.index {
            font-family: 'SF Pro Text', sans-serif;
            padding: 48px 0 45px;
            background: url('Content/imagethecoffeehouse/background-stori.jpg') top center/contain no-repeat;
        }

        .cloudtea .cloudtea-block {
            margin-bottom: 8px;
        }

        .container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .cloudtea .justify-s {
            justify-content: space-between;
        }

        .cloudtea .align-c {
            align-items: center;
            text-decoration: none;
        }

        .cloudtea .flex-w {
            flex-wrap: wrap;
        }

        .cloudtea .flex-box {
            display: flex;
        }

        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .cloudtea .cloudtea-block.right .info-block {
            order: 1;
        }

        .cloudtea .cloudtea-block .info-block {
            flex: 0 0 49%;
            width: 49%;
        }

        .cloudtea.index .cloudtea-block .info-block .img-title {
            margin-bottom: 12px;
        }

        .cloudtea.index .cloudtea-desc {
            padding: 15px 0;
            font-size: 16px;
            line-height: 25px;
            color: rgba(0, 0, 0, 0.6);
            text-align: justify;
        }

        .cloudtea .cloudtea-desc {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 16px;
        }

        .cloudtea.index .cloudtea-btn3 {
            display: block;
            max-width: 587px;
            background: #778B37;
            text-align: center;
            font-size: 16px;
            line-height: 40px;
            padding: 0 15px;
            font-weight: 600;
            border-radius: 8px;
            color: #fff;
        }

        .cloudtea .cloudtea-block .img-block {
            flex: 0 0 49%;
            width: 49%;
        }

        .cloudtea .cloudtea-block .img-block img {
            width: 100%;
        }

        img {
            border: none;
            max-width: 100%;
            height: auto;
        }

        img,
        iframe {
            max-width: 100%;
        }

        img {
            vertical-align: middle;
        }

        img {
            border: 0;
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        user agent stylesheet img {
            overflow-clip-margin: content-box;
            overflow: clip;
        }

        /* .background-stori {
        background-image: url('Content/imagethecoffeehouse/background-stori.jpg');
        background-size: cover;
    } */

        /* Kết thúc css phần stori */

        /* Css chuyện nhà */
        .chuyenha .container {
            z-index: 1;
            position: relative;

            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        #tieude {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'SF Pro Display', sans-serif;
            font-size: 28px;
            padding-top: 40px;
        }

        .blog_title a {
            text-decoration: none;
            color: #191919;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            font-size: 24px;
            margin: 24px 0;
            padding-left: 12px;
            border-left: 4px solid #E57905;
        }

        .blog_item_image {
            /* width: 400px; */
            /* Độ rộng mong muốn của hình ảnh ban đầu*/
            height: 200px;
            /* Độ cao mong muốn của hình ảnh */
            overflow: hidden;
            /* Ẩn bất kỳ nội dung nào vượt ra khỏi phần tử chứa */
            border-radius: 8px;

            position: relative;
            /* Thiết lập vị chí tương đối cho việc sử dụng absolute position */
        }

        .blog_item_image img {
            width: 100%;
            /* Đảm bảo rằng hình ảnh lấp đầy phần tử chứa */
            height: 100%;
            /* Đảm bảo rằng hình ảnh lấp đầy phần tử chứa */
            object-fit: cover;
            /* Hình ảnh sẽ thích nghi với kích thước không làm biến đổi hình dạng */

            transition: transform 0.3s;
            /* Tạo hiệu ứng chuyển động mềm mại */
        }

        .blog_item_image :hover img {
            transform: scale(1.1);
            /* Phóng to hình ảnh khi con trỏ được đưa vào */
        }

        .blog_item_title h5 {
            white-space: nowrap;
            /* Ngăn chặn văn bản từ việc xuống dòng */
            overflow: hidden;
            /* Ẩn bất kỳ văn bản nào vượt ra khỏi phần tử chứa */
            text-overflow: ellipsis;
            /* Hiển thị dấu ba chấm khi văn bản vượt quá độ dài quy định */
        }

        .blog_item_title a {
            text-decoration: none;
            color: #191919;
        }

        /* Kết thúc css chuyện nhà */
    </style>
</head>

<body>
    <!-- Phần banner -->
    <Banner class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <!-- Câu lệnh PHP  -->
                <?php
                $pd = new product();
                $result = $pd->getOneBannerNew(); // Do hàm này có 1 dòng dữ liệu và đã có fetch luôn nên ko cần dùng vòng lập
                ?>

                <div class="carousel-item active">
                    <img src="Content\imagethecoffeehouse\<?php echo $result['image']; ?>" class="d-block w-100" alt="...">
                </div>
                <!-- Từ đây viết câu lệnh php lấy dữ liệu bảng banner do model (product) xử lý trả về index -->
                <?php

                $result = $pd->getBannerNew_Later(); // 1 bảng gồm tên của các banner mới nhất
                // Lấy từng banner dùng vòng lập
                while ($set = $result->fetch()) : // fetch qua từng dòng trong mảng dữ liệu
                ?>
                    <div class="carousel-item">
                        <img src="Content\imagethecoffeehouse\<?php echo $set['image']; ?>" class="d-block w-100" alt="...">
                    </div>
                <?php
                endwhile;
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </Banner>
    <!-- Kết thúc phần banner -->

    <!-- Phần menu -->
    <section class="menu_home">
        <div class="container">
            <div class="row">
                <!-- Phần image menu  -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 pt-2">
                    <div class="card border-0">
                        <a href="">
                            <img alt="TRÀ XANH TÂY BẮC" class="img-fluid" src="./Content/imagethecoffeehouse/image-menu-1.jpg">
                        </a>
                    </div>
                </div>
                <!-- Hết phần image menu -->

                <!-- Phần code php  -->
                <?php
                $result = $pd->getProductNew(); // Trả về bảng dữ liệu có 2 sản phẩm mới nhất
                while ($set = $result->fetch()) :
                ?>

                    <!-- Phần sản phẩm trong menu -->
                    <!-- Sản phẩm 1, 2 -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 pt-2">
                        <div class="card border-0">
                            <div class="">
                                <a href="index.php?action=product_detail&id=<?= $set['id'] ?>" title="CloudFee Hạnh Nhân Nướng">
                                    <img class="card-img-top" src="Content\imagethecoffeehouse\<?php echo $set['image']; ?>">
                                </a>
                            </div>
                            <br>
                            <h5>
                                <a href="index.php?action=product_detail&id=<?= $set['id'] ?>" title="<?php echo $set['name']; ?>" style="color: #191919; text-decoration: none;"><?php echo $set['name']; ?></a>
                            </h5>
                            <div class="" style="font-size: 14px; color: #00000099; margin-bottom: 10px;"><?php echo number_format($set['price'], 0, ",", "."); ?><sup><u>đ</u></sup></div>
                        </div>
                    </div>
                    <!-- Hết sản phẩm 1, 2 -->

                <?php
                endwhile;
                ?>

                <!-- Code php  -->
                <?php
                $result = $pd->getFourProductNew_Later();
                while ($set = $result->fetch()) :
                ?>

                    <!-- Sản phẩm 3, 4, 5, 6 -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 pt-2">
                        <div class="card border-0">
                            <div class="">
                                <a href="index.php?action=product_detail&id=<?= $set['id'] ?>" title="<?php echo $set['name']; ?>">
                                    <img class="card-img-top" src="Content\imagethecoffeehouse\<?php echo $set['image']; ?>">
                                </a>
                            </div>
                            <br>
                            <h5>
                                <a href="index.php?action=product_detail&id=<?= $set['id'] ?>" title="<?php echo $set['name']; ?>" style="color: #191919; text-decoration: none;"><?php echo $set['name']; ?></a>
                            </h5>
                            <div class="" style="font-size: 14px; color: #00000099; margin-bottom: 10px;"><?php echo number_format($set['price'], 0, ",", "."); ?><sup><u>đ</u></div>
                        </div>
                    </div>
                    <!-- Hết sản phẩm 3, 4, 5, 6 -->

                <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
    <!-- Kết thúc phần menu -->

    <!-- Phần stori -->
    <section class="cloudtea index">
        <div class="cloudtea-block right">
            <div class="container">
                <div class="row flex-box flex-w align-c justify-s">
                    <div class="info-block">
                        <div class="img-title"><img src="Content/imagethecoffeehouse/image-stori.png" alt="123123"></div>
                        <div class="cloudtea-desc">Được trồng trọt và chăm chút kỹ lưỡng, nuôi dưỡng từ thổ nhưỡng phì nhiêu, nguồn nước mát lành, bao bọc bởi mây và sương cùng nền nhiệt độ mát mẻ quanh năm, những búp trà ở Tây Bắc mập mạp và xanh mướt, hội tụ đầy đủ dưỡng chất, sinh khí, và tinh hoa đất trời.Chính khí hậu đặc trưng cùng phương pháp canh tác của đồng bào dân tộc nơi đây đã tạo ra Trà Xanh vị mộc dễ uống, dễ yêu, không thể trộn lẫn với bất kỳ vùng miền nào khác.</div>
                        <a class="flex-box align-c cloudtea-btn3" href="" target="_blank" title="Thử ngay" previewlistener="true">
                            <span>Thử ngay</span>
                        </a>
                    </div>
                    <div class="img-block">
                        <img src="">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Kết thúc phần stori -->

    <!-- Phần chuyện nhà -->
    <div class="chuyennha" style="background: #FFF7E6; padding-bottom: 11%;">
        <div class="container">
            <h2 id="tieude">
                <img src="Content/imagethecoffeehouse/icon-chuyennha.jpg" alt="">
                Chuyện Nhà
            </h2>

            <!-- Phần Coffeeholic  -->
            <div class="blog_title">
                <h3>
                    <a href="">Coffeeholic</a>
                </h3>
            </div>
            <div class="row">
                <!-- code php -->
                <?php
                $result = $pd->getThreeChuyenNhaNew_Coffeeholic();
                while ($set = $result->fetch()) :
                ?>

                    <div class="col-lg-4 col-md-6 col-12 blog-item">
                        <div class="blog_item_image">
                            <a href="">
                                <img src="Content\imagethecoffeehouse\<?php echo $set['image'] ?>" alt="">
                            </a>
                        </div>

                        <div style="color: #00000099; padding: 10px 0px 0px;">
                            <p><?php echo $set['time'] ?></p>
                        </div>

                        <div class="blog_item_title">
                            <h5>
                                <a href=""><?php echo $set['caption'] ?></a>
                            </h5>
                        </div>

                        <div class="">
                            <p><?php echo $set['content_detail'] ?></p>
                        </div>

                    </div>

                <?php
                endwhile;
                ?>
            </div>
            <!-- Hết phần Coffeeholic -->

            <!-- Phần Teaholic  -->
            <div class="blog_title">
                <h3>
                    <a href="">Teaholic</a>
                </h3>
            </div>
            <div class="row">
                <!-- code php -->
                <?php
                $result = $pd->getThreeChuyenNhaNew_Teaholic();
                while ($set = $result->fetch()) :
                ?>

                    <div class="col-lg-4 col-md-6 col-12 blog-item">
                        <div class="blog_item_image">
                            <a href="">
                                <img src="Content\imagethecoffeehouse\<?php echo $set['image'] ?>" alt="">
                            </a>
                        </div>

                        <div style="color: #00000099; padding: 10px 0px 0px;">
                            <p><?php echo $set['time'] ?></p>
                        </div>

                        <div class="blog_item_title">
                            <h5>
                                <a href=""><?php echo $set['caption'] ?></a>
                            </h5>
                        </div>

                        <div class="">
                            <p><?php echo $set['content_detail'] ?></p>
                        </div>

                    </div>

                <?php
                endwhile;
                ?>
            </div>
            <!-- Hết phần Teaholic -->

            <!-- Phần Blog -->
            <div class="blog_title">
                <h3>
                    <a href="">Blog</a>
                </h3>
            </div>
            <div class="row">
                <!-- code php -->
                <?php
                $result = $pd->getThreeChuyenNhaNew_Blog();
                while ($set = $result->fetch()) :
                ?>

                    <div class="col-lg-4 col-md-6 col-12 blog-item">
                        <div class="blog_item_image">
                            <a href="">
                                <img src="Content\imagethecoffeehouse\<?php echo $set['image'] ?>" alt="">
                            </a>
                        </div>

                        <div style="color: #00000099; padding: 10px 0px 0px;">
                            <p><?php echo $set['time'] ?></p>
                        </div>

                        <div class="blog_item_title">
                            <h5>
                                <a href=""><?php echo $set['caption'] ?></a>
                            </h5>
                        </div>

                        <div class="">
                            <p><?php echo $set['content_detail'] ?></p>
                        </div>

                    </div>

                <?php
                endwhile;
                ?>
            </div>
            <!-- Hết phần Blog -->
        </div>
    </div>
    <!-- Kết thúc phần chuyện nhà -->
</body>

</html>