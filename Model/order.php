<?php

class order
{
    function inserOrder($makh, $name, $phone, $address, $status)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $query = "INSERT INTO orders(id, user_id, name_receiver, phone_receiver, address_receiver, time, status, total_price, voucher_id) VALUES (Null, $makh, '$name', '$phone', '$address', '$ngay', $status, 0, 1)";
        // echo $query;
        $db->exec($query);
        // đã insert vào trong database
        $select = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        echo $select;
        $masohd = $db->getInstance($select);
        return $masohd[0]; // masohd = array(17);
    }

    // Phương thức insert vào bảng order_detail
    function inserOrderDetail($masohd, $mahh, $size_id, $topping_id, $soluong, $thanhtien)
    {
        $db = new connect();
        $query = "INSERT INTO order_detail (order_id, product_id, size_id, topping_id, quantity, into_money)
         VALUES ($masohd, $mahh, $size_id, $topping_id, $soluong, $thanhtien)";
        echo $query;
        $db->exec($query);
    }

    // Phương thức update vào bảng order_detail total_amount
    function updateTotalPrice($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "UPDATE orders SET total_price = $tongtien WHERE id = $masohd AND user_id = $makh";
        $db->exec($query);
    }

    //Phương thức lấy thông tin khách hàng trên orders
    function getThongTinKHOrder($masohd)
    {
        $db = new connect();
        $select = "SELECT a.id, a.time, b.fullname, b.phone, b.address FROM orders a, user b WHERE a.user_id = b.id AND a.id = $masohd";
        $reusult = $db->getInstance($select);
        return $reusult;
    }

    // Phương thức lấy thông tin sản phẩm trên cart
    function getThongTinOrderDetail($masohd)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.id, c.name, b.topping_id, b.size_id, b.into_money, a.total_price, b.quantity, d.size_name, e.topping_name FROM orders a, order_detail b, product c, size d, topping e WHERE a.id = b.order_id AND b.product_id = c.id AND d.id = b.size_id AND e.id = b.topping_id AND a.id = $masohd";
        // echo $select;
        $reusult = $db->getList($select);
        return $reusult;
    }
}
include_once "./View/order.php";
