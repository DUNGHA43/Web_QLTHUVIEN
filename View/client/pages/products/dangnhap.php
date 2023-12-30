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
            <div class="col-6 offset-md-3 ">
                <form action="account_Controller.php <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="form_red" class="bg-light p-4 my-3" method="post">
                    <h2 class="py-3 text-center text-uppercase">Đăng nhập</h2>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="checksave" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Lưu tài khoản
                    </label>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-login" value="Đăng nhập">
                </form>
            </div>
        </div>

</body>