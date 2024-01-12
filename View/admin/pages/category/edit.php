<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông thể loại</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="author_Controller.php">
                <input type="hidden" name="_token" value="">
                <div class="form-group">
                    <label class="control-label">Mã thể loại</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="maTL" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Tên thể loại</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="tenTL">
                    </div>
                </div>


                <div class="form-group ">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success ml-auto" name="btn-ThemTL">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->