<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/cf6aed4189.js" crossorigin="anonymous"></script> -->
    <style>
        /* Thêm các quy tắc CSS tùy chỉnh */
        .btn-custom {
            color: #000;
            background-color: white;
            border: 1px solid #000;
            font-size: 14px;
            padding: 6px;
            border-radius: 8px;
            border-color: silver;
            /* Màu viền đen */
            margin-right: 10px;
            /* Khoảng cách giữa các nút */
            margin-top: 10px;
        }

        #productPriceDisplay {
            line-height: 0.75;
            font-family: "SF Pro Display", sans-serif;
            font-size: 26px;
            color: #E57905;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <?php
            // Truyền id để lấy thông tin của một sản phẩm
            if (isset($_GET['id'])) {
                $id = $_GET['id']; // id = 11
                //Yêu cầu model lấy thông tin của sản phẩm 11
                $pd = new product();
                $product_detail = $pd->getProductId($id); // $sanpham = array(id = 11, name:...)
                $name_product = $product_detail['name'];
                $description_product = $product_detail['description'];
                $price_product = $product_detail['price'];
                $image_product = $product_detail['image'];
                $product_type = $product_detail['product_type'];
            }
            ?>
            <div class="col-md-6">
                <img src="Content\imagethecoffeehouse\<?= $image_product ?>" alt="Hình sản phẩm" class="img-fluid">
            </div>
            <div class="col-md-6">
                <form action="index.php?action=cart&act=cart_action" method="post"> <!--chỉ nhận các giá trị input-->
                    <input type="hidden" name="mahh" value="<?php echo $id ?>">
                    <h2><input type="hidden" name="name_product" value="<?= $name_product ?>"><?= $name_product ?></h2> <!--Ẩn đi thông tin của input dùng hidden-->
                    <p>
                        <input type="hidden" hidden name="price" id="productPriceInput" value="<?= number_format($price_product, 0, ".", ".") ?>"> <!--Ẩn đi thông tin của input dùng hidden-->
                        <span id="productPriceDisplay"><?= number_format($price_product, 0, ".", ".") ?></span>
                    </p>
                    <!-- Size Options -->
                    <?php
                    $sizes_product = $pd->getProductSize($id);
                    if ($sizes_product->rowCount() > 1) :
                    ?>
                        <div class="mb-3">
                            <label>Chọn size (bắt buộc)</label>
                            <br>
                            <?php
                            $sizes_inner = $pd->getProductSize($id);
                            $firstSize = true; // Biến để kiểm tra radio button đầu tiên
                            while ($set = $sizes_inner->fetch()) :
                                if ($set['size_name'] !== 'Null') :
                            ?>
                                    <label class="btn-custom">
                                        <input type="radio" name="size" value="<?= $set['price'] ?>" id="size_<?= $set['id'] ?>" <?php if ($firstSize) echo 'checked'; ?>> <!--Khởi động giá trị ban đầu cho radio-->
                                        <?= $set['size_name'] . ' + ' . number_format($set['price'], 0, ",", ".") ?> <span>đ</span>
                                    </label>
                            <?php
                                    $firstSize = false; // Sau khi radio button đầu tiên được chọn, đặt biến này thành false
                                endif;
                            endwhile;
                            ?>
                        </div>
                    <?php
                    endif;
                    ?>

                    <!-- Topping Options -->
                    <?php
                    $toppings_product = $pd->getProductTopping($id);
                    if ($toppings_product->rowCount() > 1) :
                    ?>
                        <div class="mb-3">
                            <label>Topping</label>
                            <br>
                            <?php
                            $toppings_inner = $pd->getProductTopping($id);
                            $firstTopping = true; // Biến để kiểm tra radio button đầu tiên
                            while ($set = $toppings_inner->fetch()) :
                                if ($set['topping_name'] !== 'Null') :
                            ?>
                                    <label class="btn-custom">
                                        <input type="radio" name="topping" value="<?= $set['price'] ?>" id="topping_<?= $set['id'] ?>"> <!--Khởi động giá trị ban đầu cho radio-->
                                        <?= $set['topping_name'] . ' + ' . number_format($set['price'], 0, ",", ".") ?> <span>đ</span>
                                    </label>
                            <?php
                                    $firstTopping = false; // Sau khi radio button đầu tiên được chọn, đặt biến này thành false
                                endif;
                            endwhile;
                            ?>
                        </div>
                    <?php
                    endif;
                    ?>
                    <br>
                    Số Lượng:

                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" size="10" />
                    <br> <br>

                    <button type="submit" name="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>

        <!-- Mô Tả Sản Phẩm -->
        <div class="mt-4">
            <h4>Mô Tả Sản Phẩm</h4>
            <p>
                <?= $description_product ?>
            </p>
        </div>

        <!-- Sản Phẩm Liên Quan -->
        <div class="mt-4 pb-2">
            <h4>Sản Phẩm Liên Quan</h4>
            <div class="row">
                <?php
                $relatedProducts = $pd->getProductRelated($product_type, $id);
                while ($relatedProduct = $relatedProducts->fetch()) :
                ?>
                    <div class="col-lg-2 col-md-4 col-6 col img-thumbnail">
                        <a href="index.php?action=product_detail&id=<?= $relatedProduct['id'] ?>">
                            <img src="Content/imagethecoffeehouse/<?= $relatedProduct['image'] ?>" alt="" class="img-thumbnail img-thumbnail-fixed">
                        </a>
                        <p><a href="index.php?action=product_detail&id=<?= $relatedProduct['id'] ?>" style="text-decoration: none; color: black; font-weight: bold;"><?= $relatedProduct['name'] ?></a></p>
                        <p><?= number_format($relatedProduct['price'], 0, ",", ".") ?><sup><u>đ</u></sup></p>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Khởi tạo tổng giá với giá sản phẩm mặc định
            var totalPrice = <?= $price_product ?>;

            // Hàm cập nhật giá trị của phần tử input
            function updatePriceInput() {
                var priceInput = document.getElementById('productPriceInput');
                priceInput.value = numberWithCommas(totalPrice.toFixed(0));
            }

            // Hàm cập nhật tổng giá dựa trên lựa chọn của người dùng
            function updateTotalPrice() {
                // Nhận các giá trị size đã chọn
                var selectedSize = document.querySelector('input[name="size"]:checked');
                var sizePrice = selectedSize ? parseFloat(selectedSize.value) : 0;

                // Nhận các giá trị topping đã chọn
                var selectedToppings = document.querySelectorAll('input[name="topping"]:checked');
                var toppingsPrice = 0;
                selectedToppings.forEach(function(topping) {
                    toppingsPrice += parseFloat(topping.value);
                });

                // Tính tổng giá tiền
                totalPrice = <?= $price_product ?> + sizePrice + toppingsPrice;

                // Cập nhật giá trị của phần tử input
                updatePriceInput();

                // Cập nhật tổng giá được hiển thị
                document.getElementById('productPriceDisplay').innerText = numberWithCommas(totalPrice.toFixed(0)) + " đ";
            }

            // Hàm thêm dấu phẩy vào giá để dễ đọc hơn
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            // Xử lý sự kiện khi chọn size và topping
            var sizeButtons = document.querySelectorAll('input[name="size"]');
            sizeButtons.forEach(function(button) {
                button.addEventListener('change', updateTotalPrice);
            });

            var toppingButtons = document.querySelectorAll('input[name="topping"]');
            toppingButtons.forEach(function(button) {
                button.addEventListener('change', updateTotalPrice);
            });

            // Cập nhật lần đầu tổng giá
            updateTotalPrice();
        });
    </script>

</body>

</html>