<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- <script src="https://kit.fontawesome.com/cf6aed4189.js" crossorigin="anonymous"></script> -->
</head>

<body>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 login-sec">
          <!-- <h3 class="text-center"><b>Login Now</b></h3> -->


          <form action="index.php?action=forget&act=reset" class="login-form" method="post">

            <input type="hidden" name="email" value="">
            <p><b>VUI LÒNG XÁC NHẬN MẬT KHẨU MỚI</b></p>
            <input type="password" name='password' class="form-control" placeholder="Enter your new password">
            <div class="pt-2 pb-2">
              <input type="submit" name="submit_password" class="btn btn-primary" value="Xác Nhận Mật Khẩu">
            </div>

          </form>

          <!-- <div class="copy-text">Shop Giày <i class="fa fa-heart"></i> <a href="http://grafreez.com">shopgiay.com</a></div> -->
        </div>
      </div>
  </section>
</body>

</html>