<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
  <section id="login-section" class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 login-sec">
          <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
          <form id="login-form" action="index.php?action=forget&act=forget_action" method="post">

            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase"><b>NHẬP ĐỊA CHỈ EMAIL ĐỂ NHẬN LẠI MẬT KHẨU MỚI</b></label>
              <input type="text" class="form-control" id="email-input" name="email" placeholder="Enter your email address">
            </div>
            <div class="form-check pt-2 ps-1">
              <input type="submit" name="submit_email" class="btn btn-primary" value="Xác Nhận">
            </div>

          </form>

          <!-- <div class="copy-text">Shop Giày <i class="fa fa-heart"></i> <a href="http://grafreez.com">shopgiay.com</a></div> -->
        </div>

      </div>
    </div>
  </section>
</body>

</html>