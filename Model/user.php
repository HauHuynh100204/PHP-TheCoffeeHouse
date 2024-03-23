<?php
class user
{

    // Phướng thức kiểm tra user và email có trùng hay không
    function checkUser($user, $email)
    {
        $db =  new connect();
        $select = "SELECT a.username, a.email FROM user a WHERE a.username = '$user' or a.email = '$email'";
        $result = $db->getList($select);
        return $result;
    }

    // Phương thức insert vào database
    function insertKH($hotenkh, $sdt, $diachi, $user, $matkhau, $email)
    {
        $db = new connect();
        $query = "INSERT INTO user (id, fullname, phone, address, username, password, email, status) VALUES (NULL, '$hotenkh', '$sdt', '$diachi', '$user', '$matkhau', '$email', 0)";
        $result = $db->exec($query);
        return $result;
    }

    // Phương thức login
    function loginUser($user, $pass)
    {
        $db =  new connect();
        $select = "SELECT a.id, a.fullname, a.phone, a.address, a.password, a.status FROM user a WHERE a.username = '$user' AND a.password = '$pass'";
        $result = $db->getList($select);
        return $result;
    }

    // Phương thức kiểm tra email có tồn tại không
    function checkEmail($email)
    {
        $db =  new connect();
        $select = "SELECT * FROM user a WHERE a.email = '$email'";
        $result = $db->getList($select);
        return $result;
    }

    // phương thức update
    function updatePassEmail($emailold, $passnew)
    {
        $db =  new connect();
        $query = "UPDATE user SET password = '$passnew' WHERE email = '$emailold'";;
        $db->exec($query);
    }
}
