<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="index.php?action=login&act=login_action" class="login-form" method="post">
        <div class="container-lg pt-4 pb-4">
            <div class="row bg-light w-75 m-auto">
                <h3>Đăng nhập</h3>
                <div class="form-group">
                    <p>Username</p>
                    <input type="text" class="form-control" name="txtusername" placeholder=" Tên tài khoản">

                </div>
                <div class="form-group">
                    <p>Mật khẩu</p>
                    <input type="password" class="form-control" name="txtpassword" placeholder=" Mật khẩu">
                </div>


                <div class="form-check mt-3">
                    <button class="btn btn-primary float-right" type="submit" name="submit"> Đăng Nhập</button>
                </div>
            </div>
            <div class="row bg-light w-75 m-auto"><a href="index.php?action=forget">Quên mật khẩu</a></div>
        </div>

    </form>
</body>