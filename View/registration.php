<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        // Hàm kiểm tra Full Name
        function kiemTraFullName(value) {
            var fullName = document.getElementById("fullname");
            if (fullName.value.length == 0) {
                document.getElementById("loiFullName").innerHTML = "Bạn không được để trống thông tin";
                fullName.style.border = "1px solid red";
            } else {
                fullName.style.border = "";
                document.getElementById('loiFullName').innerHTML = '';
                return 0;
            }
        }

        // Hàm kiểm tra UserName
        function kiemTraUserName(value) {
            var userName = document.getElementById("username");
            if (userName.value.length == 0) {
                document.getElementById("loiUserName").innerHTML = "Bạn không được để trống thông tin";
                userName.style.border = "1px solid red";
            } else if (userName.value.length < 5 || userName.value.length > 20 || !/^[a-zA-Z]+$/.test(userName.value)) {
                userName.style.border = "1px solid red";
                document.getElementById("loiUserName").innerHTML = 'First name phải là chữ chứa từ 5 đến 20 kí tự';
            } else {
                userName.style.border = "";
                document.getElementById('loiUserName').innerHTML = '';
                return 0;
            }
        }

        // Hàm kiểm tra email
        function kiemTraEmail(value) {
            var email = document.getElementById("email");
            if (email.value.length == 0) {
                document.getElementById("loiEmail").innerHTML = "Bạn không được để trống thông tin";
                email.style.border = "1px solid red";
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                email.style.border = "1px solid red";
                document.getElementById("loiEmail").innerHTML = 'Email phải đúng định dạng (vd: abc@gmail.com)';
            } else {
                email.style.border = "";
                document.getElementById('loiEmail').innerHTML = '';
                return 0;
            }
        }

        // Hàm kiểm tra address
        function kiemTraAddress(value) {
            var address = document.getElementById("address");
            if (address.value.length == 0) {
                document.getElementById("loiAddress").innerHTML = "Bạn không được để trống thông tin";
                address.style.border = "1px solid red";
            } else if (/^[a-zA-Z]+$/.test(address.value)) {
                address.style.border = "1px solid red";
                document.getElementById("loiAddress").innerHTML = 'Gồm các kí tự chữ và số';
            } else if (/^[0-9]+$/.test(address.value)) {
                address.style.border = "1px solid red";
                document.getElementById("loiAddress").innerHTML = 'Gồm các kí tự chữ và số';
            } else {
                address.style.border = "";
                document.getElementById('loiAddress').innerHTML = '';
                return 0;
            }
        }

        // Hàm kiểm tra Phone
        function kiemTraPhone(value) {
            var phone = document.getElementById("phone");
            if (phone.value.length == 0) {
                document.getElementById("loiPhone").innerHTML = "Bạn không được để trống thông tin";
                phone.style.border = "1px solid red";
            } else if (phone.value.length < 10 || phone.value.length > 11 || !/^[0-9]+$/.test(creditcardnumber.value)) {
                phone.style.border = "1px solid red";
                document.getElementById("loiPhone").innerHTML = 'Gồm 10-11 chữ số';
            } else {
                phone.style.border = "";
                document.getElementById('loiPhone').innerHTML = '';
                return 0;
            }
        }

        // Hàm kiểm tra từng vị trí trên form 
        function kiemTra(value) {
            kiemTraFullName(value)
            kiemTraLastName(value)
            kiemTraUserName(value)
            kiemTraEmail(value)
            kiemTraAddress(value)
            kiemTraPhone(value)

            if (kiemTraFullName(value) == 0 && kiemTraLastName(value) == 0 && kiemTraUserName(value) == 0 && kiemTraEmail(value) == 0 && kiemTraAddress(value) == 0 && kiemTraPhone(value) == 0) {
                alert("Bạn đã nhập thành công");
                return true;
            }
            return false;
        }
    </script>
</head>

<body>
    <form action="index.php?action=register&act=register_action" method="post" class="form" role="form" onsubmit="return kiemTra()">
        <div class="container-lg pt-4 pb-4">
            <div class="row bg-light w-75 m-auto">
                <h3>Đăng kí thành viên</h3>
                <div class="col-md-12">
                    <p>Họ và Tên</p>
                    <input type="text" name="txtfullname" id="fullname" placeholder=" Tên khách hàng" class="form-control">
                    <small class="text-danger" id="loiFullName"></small>
                </div>
                <div class="mt-3">
                    <p>Tên đăng nhập</p>
                    <!-- <input type="text" name="" id="" value="@" disabled class="form-check-inline" style="width: 30px; "> -->
                    <input type="text" name="txtusername" id="username" placeholder=" Tên đăng nhập" class="form-control">
                    <small class="text-danger" id="loiUserName"></small>
                </div>

                <div class="mt-3">
                    <p>Email <span class="text-secondary">(Bắt buộc)</span></p>
                    <input type="text" name="txtemail" id="email" placeholder=" you@example.com" class="form-control">
                    <small class="text-danger" id="loiEmail"></small>
                </div>
                <div class="mt-3">
                    <p>Địa chỉ <span class="text-secondary">(Bắt buộc)</span></p>
                    <input type="text" name="txtaddress" id="address" placeholder=" Tân Phú, Hồ Chí Minh" class="form-control">
                    <small class="text-danger" id="loiAddress"></small>
                </div>

                <div class="mt-3">
                    <p>Số điện thoại</p>
                    <input type="text" name="txtphone" id="phone" placeholder="0969123321" class="form-control">
                    <small class="text-danger" id="loiPhone"></small>
                </div>

                <div class="mt-3">
                    <p>Mật khẩu</p>
                    <input class="form-control" name="txtpass" id="pass" placeholder=" Mật khẩu" type="password">
                    <small class="text-danger" id="loiPass"></small>
                </div>

                <div class="mt-3">
                    <p>Nhập lại mật khẩu</p>
                    <input class="form-control" name="retypepassword" id="retypepass" placeholder=" Nhập lại mật khẩu" type="password">
                    <small class="text-danger" id="loiRetypePass"></small>
                </div>

                <div class="text-center mt-2 me-4">
                    <button type="submit" name="submit" value="" class="btn btn-primary d-block w-100">
                        Đăng ký
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>