<?php
// unset($_SESSION['cart']);
// trước khi người dùng nhìn thấy giỏ hàng thì cần kiểm tra xem use đã có giỏ hàng chưa
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); //chưa nhiều món hàng, mỗi món hàng là object
}
$act = "cart";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'cart':
        include_once "./View/cart.php";
        break;

    case 'cart_action':
        // thông tin mua hàng đc chuyển qua đây mahh, name, giá sau khi chọp size, topping, size, topping, số lượng
        $mahh = 0;
        $name = '';
        $price = '';
        $size = 0;
        $topping = 0;
        $soluong = 1;
        if (isset($_POST['mahh'])) {
            $mahh = intval($_POST['mahh']);
            $name = $_POST['name_product'];
            $price = intval($_POST['price'] * 1000); // lỗi chỗ lấy dữ liệu nên phải nhân 1000
            // var_dump($price);
            if (empty($_POST['size'])) // kiểm tra xem món hàng đó có size hay không
            {
                $size = 0; // giá size trong database là không có size
            } else {
                $size = intval($_POST['size']); // chuyển thành dạng số
            }
            if (empty($_POST['topping'])) // kiểm tra xem món hàng đó có topping hay không
            {
                $topping = 0; // giá topping trong database là không có topping
            } else {
                $topping = intval($_POST['topping']); // chuyển thành dạng số
            }
            // echo $topping;
            $soluong = intval($_POST['quantity']);
            // controller yêu cầu model add vào gio hàng
            $gh = new cart();
            $gh->addCart($mahh, $name, $price, $size, $topping, $soluong);
            echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=cart"/>';
        }
        break;

    case 'delete_cart':
        if (isset($_GET['id'])) {
            $vt = $_GET['id'];
            unset($_SESSION['cart'][$vt]);
        }
        echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=cart"/>';
        break;
    case 'update_cart':
        if (isset($_POST['newqty'])) {
            $slmoi = $_POST['newqty']; // $slmoi=array(1:1,2:3,3:1);
            // duyệt qua giỏ hàng, thằng nào có số lượng mà khác với sl mới thì update
            foreach ($slmoi as $key => $value) {
                if ($_SESSION['cart'][$key]['soluong'] != $value) {
                    $gh = new cart();
                    $gh->update_item($key, $value);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=cart"/>';
        break;
}
