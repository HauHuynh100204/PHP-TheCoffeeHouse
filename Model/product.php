<?php
// Đặt tên model là gì thì đặt tên class như thế (nhằm mục đích chạy hàm gọi modal tự động)
class product
{
    // Thuộc tính
    // Hàm tạo 

    // Phương thức trả về 1 banner mới nhất
    function getOneBannerNew()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT image FROM banner ORDER BY idbanner DESC LIMIT 1"; // lấy 1 banner mới nhất đầu tiên
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getInstance($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức trả về 4 banner mới nhất (trừ banner mới nhất)
    function getBannerNew_Later()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT image FROM banner ORDER BY idbanner DESC LIMIT 4 OFFSET 1"; // lấy banner mới nhất mà bỏ qua banner mới nhất đầu tiên
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra 2 sản phẩm mới nhất đầu tiên
    function getProductNew()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT image, name, id, price FROM product ORDER BY id DESC LIMIT 2";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra 3 sản phẩm mới nhất (trừ 2 sản phẩm đầu tiên)
    function getFourProductNew_Later()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT image, name, id, price FROM product ORDER BY id DESC LIMIT 4 OFFSET 2";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    //Phương thức lấy ra 3 chuyện nhà mới nhất của Coffeeholic
    function getThreeChuyenNhaNew_Coffeeholic()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DATE_FORMAT(b.time, '%d/%m/%Y') AS time, b.image, b.caption, b.content_detail FROM chuyennha a, content b WHERE a.id = b.type AND a.name = 'Coffeeholic' ORDER BY b.id DESC LIMIT 3;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    //Phương thức lấy ra 3 chuyện nhà mới nhất của Teaholic
    function getThreeChuyenNhaNew_Teaholic()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DATE_FORMAT(b.time, '%d/%m/%Y') AS time, b.image, b.caption, b.content_detail FROM chuyennha a, content b WHERE a.id = b.type AND a.name = 'Teaholic' ORDER BY b.id DESC LIMIT 3;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra dòng dữ liệu trùng id product đã chọn
    function getProductId($id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT b.id, b.name, b.price, b.description, b.image, b.product_type FROM product_detail a, product b WHERE a.product = b.id AND b.id = $id";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getInstance($select); // vì trả về đúng 1 row
        return $result; // thông 1 product dạng array(id: 24, name:...)
    }

    // lấy ra size
    function getProductSize($id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT b.name, b.price, b.id FROM product_detail a, size b WHERE a.size = b.id AND a.product = $id";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result;
    }

    // lấy ra topping
    function getProductTopping($id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT b.name, b.price, b.id FROM product_detail a, topping b WHERE a.topping = b.id AND a.product = $id";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result;
    }

    // Lấy ra thông tin của các product liên quan thuộc chung category
    function getProductRelated($product_type, $id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT b.id, b.name, b.price, b.image FROM product_detail a, product b WHERE a.product = b.id AND b.product_type = $product_type AND a.product != $id LIMIT 6";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result;
    }



    //Phương thức lấy ra 3 chuyện nhà mới nhất của Blog
    function getThreeChuyenNhaNew_Blog()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DATE_FORMAT(b.time, '%d/%m/%Y') AS time, b.image, b.caption, b.content_detail FROM chuyennha a, content b WHERE a.id = b.type AND a.name = 'Blog' ORDER BY b.id DESC LIMIT 3;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra danh sách menu
    function getMenu()
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DATE_FORMAT(b.time, '%d/%m/%Y') AS time, b.image, b.caption, b.content_detail FROM chuyennha a, content b WHERE a.id = b.type AND a.name = 'Blog' ORDER BY b.id DESC LIMIT 3;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }

    // Phương thức lấy ra dòng dữ liệu trùng id hàng hóa đã chọn
    function getProductImageId($id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "select image FROM product WHERE id = $id;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getInstance($select); // vì trả về đúng 1 row
        return $result; // thông 1 sp dạng array(mahh: 24, tenhh:...)
    }

    // Phương thức lấy tên tên size
    function getProductSizeId($id, $giasize)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT a.name, a.id FROM size a, product_detail b WHERE a.id = b.size AND b.product = $id AND a.price = $giasize";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $reusult = $db->getInstance($select);
        return $reusult;
    }

    // Phương thức lấy tên tên size
    function getProductToppingId($id, $giatopping)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT DISTINCT a.name, a.id FROM topping a, product_detail b WHERE a.id = b.topping AND b.product = $id AND a.price = $giatopping";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $reusult = $db->getInstance($select);
        return $reusult;
    }
}
