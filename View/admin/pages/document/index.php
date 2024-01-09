<h1><span class="badge badge-secondary mb-5">Tài liệu</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="author_Controller.php">
                <input type="text" placeholder="Input here!" name="keyword" class="form-control" />
                <div class="input-group-append">
                    <input name="btn_Search" class="btn btn-success" type="submit" value="Search"></input>
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
            <th>Mã tài liệu</th>
            <th>Tên tài liệu</th>
            <th>Số lượng</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <h6>aaa</h6>
            </td>
            <td>
                <a href="" class='btn btn-warning'>Sửa</a>
                <a href="" class='btn btn-danger'>Xóa</a>

            </td>
        </tr>


        <!-- End of product loop -->
    </tbody>

</table>
<!-- Create -->
<div id="Create" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thêm tài liệu</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="author_Controller.php">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Mã tài liệu</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="tenTG" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên tên tài liệu</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="ngaySinh">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số lượng</label>
                        <div>
                            <input type="number" class="form-control input-lg" name="noiSinh" value="" min="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Thể loại</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tác giả</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nhà cung cấp</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Hình ảnh</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="soDT" value="">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-success ml-auto" name="btn-ThemTG">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End create  -->