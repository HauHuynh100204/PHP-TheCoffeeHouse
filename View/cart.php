<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/cf6aed4189.js" crossorigin="anonymous"></script> -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        #cart-container {
            text-align: center;
        }

        #cart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        #cart-table th,
        #cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #cart-table th {
            background-color: #f2f2f2;
        }

        #cart-table img {
            max-width: 50px;
            max-height: 50px;
        }

        #quantity-input {
            width: 50px;
        }

        #cart-total {
            font-weight: bold;
        }

        #checkout-button {
            padding: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        #checkout-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION['makh'])) :
        echo '<script> alert("Bạn chưa đăng nhập"); </script>';
        echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=login"/>';
    ?>
    <?php
    else :
    ?>
        <div id="cart-container">
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            ?>
                <h2>GIỎ HÀNG</h2>

                <form action="index.php?action=cart&act=update_cart" method="post">
                    <table id="cart-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Tùy chọn của bạn</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 0;
                            foreach ($_SESSION['cart'] as $key => $item) {
                                $j++;

                            ?>

                                <tr>
                                    <td><?php echo $j; ?></td>
                                    <td><img src="Content\imagethecoffeehouse\<?php echo $item['hinh']; ?>" alt=""> <?php echo $item['tenhh']; ?></td>
                                    <td>
                                        <?php if (isset($item['size']) && $item['size'] !== 'Null') echo 'Size: ' . $item['size'];
                                        else echo 'Size: Không có' ?>
                                        <br>
                                        <?php if (isset($item['topping']) && $item['topping'] !== 'Null') echo 'Topping: ' . $item['topping'];
                                        else echo 'Topping: Không có' ?>
                                    </td>
                                    <td><?php echo number_format($item['dongia'], 0, ".", ".")  ?></td>
                                    <td><input type="number" id="quantity-input" name="newqty[<?php echo $key; ?>]" value="<?= $item['soluong'] ?>" min="1"></td>
                                    <td><?php echo number_format($item['thanhtien'], 0, ".", ".") ?></td> <!--khắc phục lỗi không nhận đúng giá trị-->
                                    <td><a href="index.php?action=cart&act=delete_cart&id=<?php echo $key; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                        <button type="submit" class="btn btn-secondary">Sửa</button>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"><strong id="cart-total">Tổng tiền</strong></td>
                                <td>
                                    <b>
                                        <?php
                                        $gh = new cart();
                                        echo $gh->get_subTotal()
                                        ?>
                                        <sub><u>đ</u></sub>
                                    </b>
                                </td>
                                <td><a href="index.php?action=pay" class="btn btn-success">Thanh toán</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            <?php
            } else {
                echo '<script> alert("Giỏ hàng của bạn chưa có hàng") </script>';
                echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=home"/>';
            }
            ?>
        </div>
    <?php

    endif;
    ?>

</body>

</html>