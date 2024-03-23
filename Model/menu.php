<?php
// Đặt tên model là gì thì đặt tên class như thế (nhằm mục đích chạy hàm gọi modal tự động)
class menu
{
    // Thuộc tính
    // Hàm tạo 

    // Phương thức lấy ra danh sách menu
    function getMenu() {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT id, name FROM menu WHERE id != 1;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra category của menu
    function getCategory($id) {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.id, a.type FROM category a, menu b WHERE a.category_type = b.id AND b.id = $id";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra danh sách tất cả các product thuộc category
    function getProduct_Category($id) {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.id, a.name, a.price, a.image FROM product a, category b WHERE a.product_type = b.id AND b.id = $id";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

}

?>