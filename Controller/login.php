<?php
$act = "login";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'login':
        include_once "./View/login.php";
        break;

    case 'login_action':
        // Nhận thông tin
        $user = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            $saltF = "G4335#";
            $saltL = "F5567!";
            $passnew = md5($saltF . $pass . $saltL); // Mã hóa mật khẩu nhầm bảo mật an toàn
            // $passnew = md5($pass);
            $kh = new user();
            $logUser = $kh->loginUser($user, $passnew); // Trả về cái bảng
            $count = $logUser->rowCount(); // Nếu có thì trả về số dòng trong bảng
            $uslg = $logUser->fetch();
            if ($count > 0) 
            {
                // Nếu như đăng ký thành công thì lưu thông tin vào trong session
                $_SESSION['makh'] = $uslg['id'];
                $_SESSION['tenkh'] = $uslg['fullname'];
                $_SESSION['sdt'] = $uslg['phone'];
                $_SESSION['dc'] = $uslg['address'];
                $_SESSION['status'] = $uslg['status'];
                // echo $_SESSION['makh'];
                echo '<script> alert("Đăng nhập thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php"/>';
            } else 
            {
                echo '<script> alert("Đăng nhập không thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=login"/>';
            }
        }
        break;
}
