<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <base href="http://localhost/Web_QLTHUVIEN/Controller/">;
    <title>Document</title>
</head>
<body>
    <div class="container justify-content-center align-items-center">
        <div class="row">
            <div class="col-6 offset-md-3">
                <form action="account_Controller.php" id="form_red" class="bg-light p-4 my-3" method="post">
                    <h2 class="py-3 text-center text-uppercase">Đăng kí tài khoản</h2>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" id="fullname">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="">Giới tính</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" checked id="male" value="male">
                                <label for="male" class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" checked id="female" value="female">
                                <label for="female" class="form-check-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-reg" value="Đăng ký">
                </form>
            </div>
        </div>
    </div>
</body>
</html>