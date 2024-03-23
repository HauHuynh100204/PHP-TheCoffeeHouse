<?php
// Controller yêu cầu model insert thông tin vào trong orders và tra ra mã số hd vừa insert vào
// unset($_SESSION['cart']);
if (isset($_SESSION['makh'])) {
    $makh = $_SESSION['makh'];
    $name = $_SESSION['tenkh']; // session này đc lưu khi đăng nhập tài khoản thành công
    $phone = $_SESSION['sdt'];
    $address = $_SESSION['dc'];
    $status = $_SESSION['status'];
    $order = new order();
    //Lấy má số hóa đơn vửa mới insert vào
    $sohd = $order->inserOrder($makh, $name, $phone, $address, $status); // Số 17
    echo $sohd;
    $_SESSION['masohd'] = $sohd; // lưu giá trị số orders để mà thực hiện câu truy vấn lấy thông tin khách hàng
    // echo $_SESSION['masohd'];
    $total = 0;
    // Đã có má số orders(cha) thì insert được vào bảng order_detail
    foreach ($_SESSION['cart'] as $key => $item) {
        // Controller yêu cầu model insert vào bảng order_detail
        $order->inserOrderDetail($sohd, $item['mahh'], $item['sizeId'], $item['toppingID'], $item['soluong'], $item['thanhtien']);
        $total += $item['thanhtien'];
        // Cập nhật lại order_detail dựa vào
    }
    // Tiến hành cập nhật lại tổng tiền vào trong bảng orders
    $order->updateTotalPrice($sohd, $makh, $total);
}
include_once "./View/order.php";
// unset($_SESSION['cart']);
