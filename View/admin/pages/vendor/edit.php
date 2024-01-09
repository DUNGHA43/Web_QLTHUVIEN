<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông nhà cung cấp</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="author_Controller.php">
                <input type="hidden" name="maTG" value="<?php echo $udTG['maTG']; ?>">
                <div class="form-group">
                    <label class="control-label">Mã nhà cung cấp</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="maNCC" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tên tác giả</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="tenTG" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="noiSinh" value="">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label">Địa chỉ</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="soDT" value="">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="btn-SuaTG" value="Sửa">
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->