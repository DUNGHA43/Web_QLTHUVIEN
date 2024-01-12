<h1><span class="badge badge-secondary mb-5">Thể loại</span></h1>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-6 ">

        </div>
        <div class="col-6 mb-4">
            <form id="form-search" class="input-group" method="POST" action="nhacungcap_Controller.php">
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
            <th>Mã thể loại</th>
            <th>Tên thể loại</th>
            <th>Lựa chọn</th>
        </tr>

    <tbody>
        <tr>
            <td>
                <h6>
                    aaaaaaaaaaaaaa
                </h6>
            </td>
            <td>
                <h6>
                    aaaaaaaa
                </h6>
            </td>

            <td>
                <!--    -->
                <a href="nhacungcap_Controller.php?act=updatencc&maNCC=<?php echo $rows['maNCC'] ?>" class="btn btn-warning">Sửa</a>
                <a href="nhacungcap_Controller.php?act=deletencc&maNCC=<?php echo $rows['maNCC'] ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>


        <!-- End of product loop -->

        <div id="Create" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Thêm thể loại</h1>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="nhacungcap_Controller.php">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <label class="control-label">Mã thể loại</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="maNCC">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Tên thể loại</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="tenNCC">
                                </div>
                            </div>



                            <div class="form-group ">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-success ml-auto" name="btn-themTL">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End create  -->