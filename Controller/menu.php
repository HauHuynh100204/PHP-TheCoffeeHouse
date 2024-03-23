<?php
// Controller gọi đến view để hiển thị ra 
$act = "1";
if(isset($_GET['act']))
{
    $act = $_GET['act'];
}
switch ($act) {
    case '1':
        include_once "./View/menu.php";
        break;
    case '2':
        include_once "./View/menu.php";
        break;
    case '3':
        include_once "./View/menu.php";
        break;
    case '4':
        include_once "./View/menu.php";
        break;
    case '5':
        include_once "./View/menu.php";
        break;
    case '6':
        include_once "./View/menu.php";
        break;
    case '7':
        include_once "./View/menu.php";
        break;
    case '8':
        include_once "./View/menu.php";
        break;
    case '9':
        include_once "./View/menu.php";
        break;
    case '10':
        include_once "./View/menu.php";
        break;
}
