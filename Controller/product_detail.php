<?php
// Controller gọi đến view để hiển thị ra 
$action = "product_detail";
if(isset($_GET['action']))
{
    $action = $_GET['action'];
}
switch ($action) {
    case 'product_detail':
        include_once "./View/product_detail.php";
        break;
}

?>