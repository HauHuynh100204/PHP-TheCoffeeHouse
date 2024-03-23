<?php
$act = 'forget';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forget':
        include_once "./View/forgetpassword.php";
        break;

    case 'forget_action':
        // nếu người dùng nhấn vào nút submit thì nhận email về
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email']; //  lychau2387@gmail.com
            $_SESSION['email'] = array();
            // Kiểm tra xem email này có tồn tại trong database hay không
            $kh = new user();
            $checkemail = $kh->checkEmail($email)->rowCount();
            if ($checkemail > 0) {
                // cấp mã code
                $code = random_int(10000, 1000000);
                // lưu thông tin code vào email này vào session để kh lấy code nhập vào và so sánh lại trong session
                // tạo đối tượng
                $item = array(
                    'id' => $code,
                    'email' => $email,
                );
                // add đối tượng vào trong session
                $_SESSION['email'][] = $item;
                // tiến hành gưi mail
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "huynhthuchau100204@gmail.com"; // địa chỉ của trang web
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "qpzc krew ofbr gabs"; //mật khẩu ứng dụng
                $mail->SMTPSecure = "tls";  // ssl
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587"; // 465
                $mail->From = 'huynhthuchau100204@gmail.com';
                $mail->FromName = 'ThucHau';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'reciever_name');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code . '';
                if ($mail->Send()) {
                    echo '<script> alert("Check Your Email and Click on the
                    link sent to your email"); </script>';
                    include "./View/resetpw.php";
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                    include "./View/forgetpassword.php";
                }
                // include "./View/resetpw.php";
            } else {
                echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                include "./View/forgetpassword.php";
            }
        }
        break;

    case 'reset':
        if (isset($_POST['submit_password'])) {
            $pass = $_POST['password'];
            // dò trong session
            foreach ($_SESSION['email'] as $key => $item) {
                echo $item['id'];
                if ($item['id'] == $pass) {
                    echo $pass;
                    $emailold = $item['email'];
                    $saltF = "G4335#";
                    $saltL = "F5567!";
                    $passnew = md5($saltF . $pass . $saltL);
                    // viết lệnh update bên model xử lý
                    $kh = new user();
                    $kh->updatePassEmail($emailold, $passnew);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0; url =../Thecoffeehouse/index.php?action=login"/>';
        break;
}
