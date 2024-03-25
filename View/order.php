<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            /* background: linear-gradient(to right, #C9D6FF, #E2E2E2); */
        }

        #container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        #container h2 {
            margin-top: 0;
            color: red;
            text-align: center;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .custom-table th {
            /* background-color: #007bff; */
            color: black;
        }

        .editable-cell {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .editable-cell:hover {
            background-color: #e5e5e5;
        }

        .editable-cell:focus {
            background-color: #fff;
            outline: 2px solid #007bff;
        }

        .success {
            background-color: #28a745;
            color: #fff;
        }

        .success th {
            background-color: #28a745;
            color: #fff;
            border-color: #28a745;
        }

        .success td {
            background-color: #d4edda;
        }

        /* .success .editable-cell:hover {
            background-color: #c3e6cb;
        }

        .success .editable-cell:focus {
            background-color: #fff;
            outline: 2px solid #28a745;
        } */
    </style>
</head>

<body>
    <div id="container">
        <?php
        if (!isset($_SESSION['makh'])) :
            echo '<script> alert("Bạn chưa đăng nhập"); </script>';
            echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=login"/>';
        ?>

        <?php
        else :
        ?>
            <div>
                <h2>HÓA ĐƠN</h2>
                <form action="">
                    <?php
                    if (isset($_SESSION['masohd'])) {
                        $maOrder = $_SESSION['masohd'];
                        echo $maOrder;
                        $kh = new order();
                        $khOrder = $kh->getThongTinKHOrder($maOrder);
                        $tenkh = $khOrder['fullname'];
                        $ngay = $khOrder['time'];
                        $dc = $khOrder['address'];
                        $sodt = $khOrder['phone'];
                    ?>
                        <table class="custom-table">

                            <tr>
                                <td colspan="2" class="editable-cell">Số Hóa đơn: <?php echo $maOrder ?></td>
                                <td colspan="2" class="editable-cell">Ngày Lập: <?php echo $ngay; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="editable-cell">Họ và tên:</td>
                                <td colspan="2" class="editable-cell"><?php echo $tenkh; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="editable-cell">Địa chỉ:</td>
                                <td colspan="2" class="editable-cell"><?php echo $dc; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="editable-cell">Số điện thoại:</td>
                                <td colspan="2" class="editable-cell"><?php echo $sodt; ?></td>
                            </tr>
                        </table>
                        <br>
                        <h2>Chi Tiết Sản Phẩm</h2>
                        <table class="custom-table">
                            <thead>
                                <tr class="table-success">
                                    <th>Số TT</th>
                                    <th>Thông Tin Sản Phẩm</th>
                                    <th>Tùy Chọn Của Bạn</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 0;
                                $order = new order();
                                $sp = $order->getThongTinOrderDetail($maOrder);
                                while ($set = $sp->fetch()) :
                                    $j++;
                                ?>
                                    <tr>
                                        <td class="editable-cell"><?php echo $j; ?></td>
                                        <td class="editable-cell"><?php echo $set['name']; ?></td>
                                        <td class="editable-cell"><?php if (isset($set['size_name']) && $set['size_name'] !== 'Null') echo 'Size: ' . $set['size_name'];
                                                                    else echo 'Size: Không có' ?> <br> <?php if (isset($set['topping_name']) && $set['topping_name'] !== 'Null') echo 'Topping: ' . $set['topping_name'];
                                                                    else echo 'Topping: Không có' ?></td>
                                        <td class="editable-cell">Đơn Giá: <?php echo $set['total_price'] ?></td>
                                        <td class="editable-cell">Số Lượng: <?php echo $set['quantity']; ?> </td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                                <tr>
                                    <td colspan="3" class="editable-cell"><b>Tổng Tiền</b></td>
                                    <td colspan="2" class="editable-cell">
                                        <b>
                                            <?php
                                            $cart = new cart();
                                            echo $cart->get_subTotal();
                                            ?>
                                            <sup><u>đ</u></sup>
                                        </b>
                                    </td>
                                <?php
                            }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                </form>
            </div>
        <?php
        endif;
        ?>
    </div>
</body>

</html>