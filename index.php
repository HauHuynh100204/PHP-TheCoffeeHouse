<?php
session_start();
// session_unset();

include_once "Model/class.phpmailer.php";

// include_once "Model/connect.php";
// include_once "Model/hanghoa.php"
// spl_autoload là tự động load lên những class hướng đối tượng
//Cách 1:
// spl_autoload_register('myModelClassLoader'); // nó đăng ký gọi phương thức, mà phương thức đó phải gọi những
// function myModelClassLoader($className) {
//     $path = 'Model/';
//     include_once $path.$className.'.php';
// }
// Cách 2
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



    <title>The Coffee House</title>
</head>

<body>
    <!-- Hiển thị header  -->
    <?php
    // $kn = new connect();
    include_once "View/header.php"
    ?>
    <!-- Hiển thị nội dung  -->
    <div>
        <div>
            <?php
            // Muốn trang chủ hiển thị view nào lên thì khởi tạo biến tên trang đó 
            $ctrl = 'home';
            // index điều hướng đến những controller khác nhau thông qua URL, được đặt bằng tên biến = giá trị
            if (isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            // index gọi controller
            include_once "./Controller/$ctrl.php";
            ?>
        </div>
    </div>
    <!-- Hiển thị footer  -->
    <?php
    include_once "View/footer.php"
    ?>
</body>

</html>