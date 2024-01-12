<div class="modal-dialog" role="document">
    <div class="modal-content modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Sửa tài khoản</h1>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="nhacungcap_Controller.php">
                <input type="hidden" name="_token" value="">
                <div class="form-group">
                    <label class="control-label">Tài khoản</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="taiKhoan">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Mật khẩu</label>
                    <div>
                        <input type="password" class="form-control input-lg" name="matKhau">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Mã SV</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="maSV">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Họ tên</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="hoTen">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Ngày sinh</label>
                    <div>
                        <input type="date" class="form-control input-lg" name="ngaySinh">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số CCCD</label>
                    <div>
                        <input type="number" class="form-control input-lg" name="soCCCD">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <div>
                        <input type="number" class="form-control input-lg" name="soDienThoai">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Địa chỉ</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="diaChi">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Quyền</label>
                    <div>
                        <input type="text" class="form-control input-lg" name="quyen">
                    </div>
                </div>


                <div class="form-group ">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success ml-auto" name="btn-ThemNCC">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-dialog -->