<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa thông tin tài liệu</h1>
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
                    <label class="control-label">Nhà cung cấp</label>
                    <div>
                        <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                        <select name="" id="" class='btn btn-light' style="width: 466px;">
                            <OPTION Value="Under 16">Under 16</OPTION>
                            <OPTION Value="Over 60">Over 60</OPTION>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Thể loại</label>
                    <div>
                        <!-- <input type="text" class="form-control input-lg" name="soDT" value=""> -->
                        <select name="" id="" class='btn btn-light' style="width: 466px;">
                            <OPTION Value="Under 16">Under 16</OPTION>
                            <OPTION Value="16 to 25">16 to 25</OPTION>
                            <OPTION Value="26 to 40">26 to 40</OPTION>
                            <OPTION Value="40 to 60">40 to 60</OPTION>
                            <OPTION Value="Over 60">Over 60</OPTION>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Hình ảnh</label>
                    <div>
                        <form method="post" enctype="multipart/form-data" action="http://localhost/Web_QLTHUVIEN/config/process-form.php">
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->
                            <label for="image">Image file</label>
                            <input type="file" id="image" name="image">
                        </form>
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
<OPTION Value="16 to 25">16 to 25</OPTION>
<OPTION Value="26 to 40">26 to 40</OPTION>
<OPTION Value="40 to 60">40 to 60</OPTION>