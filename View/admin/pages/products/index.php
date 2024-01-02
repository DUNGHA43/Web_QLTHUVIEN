<?php
// Thừa kế file layout.php
$pageTitle = "Page Title";
ob_start(); // Bắt đầu bộ nhớ đệm đầu ra
include "../Web_QLTHUVIEN/Model/Author_Model.php";
?>


<form method="post" enctype="multipart/form-data" action="http://localhost/Web_QLTHUVIEN/config/process-form.php">
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
    <label for="image">Image file</label>
    <input type="file" id="image" name="image">
    <button>Upload</button>
</form>
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
            <th>Mã tác giả</th>
            <th>Tên tác giả</th>
            <th>Ngày sinh</th>
            <th>Nơi sinh</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Lựa chọn</th>
        </tr>
    </thead>
    <?php
    $result = show_Author();
    while ($rows = $result->fetch_assoc()) {
    ?>
        <tbody>
            <tr>
                <td>
                    <h6><?php echo $rows['maTG'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['tenTG'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['ngaySinh'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['noiSinh'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['soDT'] ?></h6>
                </td>
                <td>
                    <h6><?php echo $rows['gioiTinh'] ?></h6>
                </td>
                <td>
                <!-- data-toggle="modal" data-target="#UpdateForm -->
                    <a type="button" href = "author_Controller.php?smTG=<?php echo$rows['maTG'];?>" class="btn btn-primary btn-sm" >
                        Sửa
                    </a>
                    <button class="btn btn-danger btn-sm ml-1">
                        <a href="" style="color: aliceblue;">Xóa</a>
                    </button>
                </td>
            </tr>

           
            <!-- End of product loop -->
        </tbody>
    <?php } ?>
</table>
<!-- Modal -->
<!-- Update-->
<?php
    $received_data;
    if(isset($_GET['data']))
    {
        $received_data = unserialize(urldecode($_GET['data']));
        print_r($received_data);
    }
    else
    {
        $received_data = "No data";
    }
?>
<!-- End update  -->
<div id="UpdateForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title"><?php print_r($received_data); ?></h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nơi sinh</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="noiSinh" value="">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label">SĐT</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="gioiTinh" value="Nam">
                                <label for="html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-SuaTG">Sửa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Create</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Tên tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ngày sinh</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nơi sinh</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="noiSinh" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SĐT</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <input type="radio" id="html" name="fav_language" value="HTML" ">
                                <label for=" html">Nam</label>
                                <a href=""></a>
                                <input type="radio" id="css" name="gioiTinh" value="Nữ">
                                <label for="css">Nữ</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name ="btn-ThemTG">Thêm</button>
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