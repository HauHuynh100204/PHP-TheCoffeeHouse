<?php
$act = "register";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'register':
        include_once "./View/registration.php";
        break;

    case 'register_action':
        // Gửi thông tin qua đây, nhận thông tin
        $hotenkh = '';
        $dc = '';
        $sodt = '';
        $user = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $hotenkh = $_POST['txtfullname'];
            $dc = $_POST['txtaddress'];
            $sodt = $_POST['txtphone'];
            $user = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $saltF = "G4335#";
            $saltL = "F5567!";
            $passnew = md5($saltF . $pass . $saltL); // Mã hóa mật khẩu nhầm bảo mật an toàn
            // $passnew = md5($pass);
            // Trước khi đăng ký cần kiểm tra xem user và email nó trùng hay không
            $kh = new user();
            $check = $kh->checkUser($user, $email)->rowCount();
            if ($check > 0) {
                echo '<script> alert("Username hoặc email đã tồn tại"); </script>';
                // include_once "./View/registration.php"; 
                echo '<meta http-equiv="refresh" content="0; url=../Thecoffeehouse/index.php?action=register"/>'; // thẻ meta là refresh lại trang với content là 0s và đến trang có link url
            } else {
                // tiến hành insert vào trong database
                $inSKH = $kh->insertKH($hotenkh, $sodt, $dc, $user, $passnew, $email);
                if ($inSKH !== false) // == true
                {
                    echo '<script> alert("Đăng ký thành công"); </script>';
                    echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php"/>';
                } else {
                    echo '<script> alert("Đăng ký không thành công"); </script>';
                    echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=register"/>';
                }
            }
        }
}
