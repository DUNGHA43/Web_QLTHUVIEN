<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
?>
<h1><span class="badge badge-secondary mb-5">Sửa tên ở đây nè!</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6">
            <form action="path" method="POST" class="form-change-multi">
                <div class="d-flex align-items-start">
                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ids" value="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form id="form-search" class="input-group">
                <input type="text" placeholder="Input here!" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex">
        <div class=" col-md-4 d-flex ml-auto">
            <button type="button" class="btn btn-outline-success ml-auto" style="width:150px;" data-toggle="modal" data-target="#Create">
                Thêm +
            </button>
        </div>
    </div>
</div>


<table class="table table-hover table-sm text-center" checkboxMulti>
    <thead>
        <tr>
            <th>
                <input type="checkbox" name="checkAll">
            </th>
            <th>Index</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="checkbox" name="id">
            </td>
            <td>
                <a href="">text</a>
            </td>
            <td>
                <a href="">text</a>
            </td>
            <td>
                <a href="">text</a>
            </td>
            <td>
                <a href="">text</a>
            </td>
            <td>
                <button class="badge badge-danger">Inactive</button>
            </td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalLoginForm">
                    Edit
                </button>
                <button class="btn btn-danger btn-sm ml-1">Delete</button>
            </td>
        </tr>

        <!-- End of product loop -->
    </tbody>
</table>

<!-- Modal -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">Login</button>

                            <a class="btn btn-link" href="">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End modal -->

<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Create</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nơi sinh</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="address" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SĐT</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="phoneNumber" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="fav_language" value="HTML" ">
                                <label for=" html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="fav_language" value="CSS">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->
<?php
$content = ob_get_clean(); // Lấy nội dung từ bộ nhớ đệm đầu ra

$htmlFilePath = ADMIN_PATH . 'layouts/default.php';

include $htmlFilePath; // Thực hiện thừa kế
?>

<style>
    .modal-content {
        margin-top: 100px;
    }
</style>