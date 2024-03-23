<?php
class cart
{
    // Phương thức thêm vào giỏ hàng
    function addCart($mahh, $name, $price, $size, $topping, $soluong)
    {
        // thiếu hình
        $pd = new product();
        // $j = 0;
        $hinh = $pd->getProductImageId($mahh);
        $img = $hinh['image'];

        $Size = $pd->getProductSizeId($mahh, $size);
        $tenSize = $Size['name'];
        $sizeId = $Size['id'];

        $Topping = $pd->getProductToppingId($mahh, $topping);
        $tenTopping = $Topping['name'];
        $toppingId = $Topping['id'];
            // // echo $tenTopping;


        // var_dump($toppingId);
        // var_dump($tenTopping);
        // var_dump($mahh);
        // var_dump($size);

        $total = $soluong * $price;

        // tạo ra đối tượng, những đối tượng có thuộc tính: id, hình, tên, giá, size, topping, soluong, thanhtien
        // thực hiện kiểm tra cùng cùng mã hàng, cùng size, cùng topping
        $flag = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh && $item['size'] == $tenSize && $item['topping'] == $tenTopping) {
                $flag = true;
                $soluong += $item['soluong']; //$_SESSION['cart][12]['soluong]
                $price = $item['price'];
                // $_SESSION['cart'][$mahh]['soluong']=$soluong;
                $this->update_item($key, $soluong);
                //return;
            }
        }

        if ($flag == false) {
            $item = array(
                // 'id' => $j++,
                'mahh' => $mahh,
                'hinh' => $img,
                'tenhh' => $name,
                'size' => $tenSize,
                'sizeId' => $sizeId,
                'topping' => $tenTopping,
                'toppingID' => $toppingId,
                'dongia' => $price,
                'soluong' => $soluong,
                'thanhtien' => $total
            );
            // Đem đối tượng add và cart
            $_SESSION['cart'][] = $item;
        }
    }

    // Phương thức tính tổng thành tiền
    function get_subTotal()
    {
        $subTotal = 0;
        // duyệt qua cart
        foreach ($_SESSION['cart'] as $item) {
            $subTotal += $item['thanhtien'];
        }
        // định dạng tiền tệ
        $subTotal = number_format($subTotal, 2);
        return $subTotal;
    }

    // phương thức update dựa vào mã hàng 
    function update_item($index, $soluong)
    {

        if ($soluong <= 0) {

            unset($_SESSION['cart'][$index]);
        } else {
            //   cap nhat la phep gan
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tienmoi = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tienmoi;
        }
    }
}
