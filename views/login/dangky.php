<div class="dang-ky-thanh-vien">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center"><h1 class="tieude-dk">Đăng Ký Thành Viên</h1></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6 form-dang-ky">
                <form action="<?=$routing->site_url('xuly-dangky');?>" method="post">
                    <div class="form-group">
                    <label >Họ Tên</label>
                    <input type="text" class="form-control" name="hoten"  aria-describedby="helpId" placeholder="Nhập Họ Tên">
                    </div>
                    <div class="form-group">
                    <label >Địa Chỉ</label>
                    <input type="text" class="form-control" name="diachi"  aria-describedby="helpId" placeholder="Nhập Địa Chỉ">
                    </div>
                    <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                    <label >Số Điện Thoại</label>
                    <input type="phone" class="form-control" name="sdt"  aria-describedby="helpId" placeholder="Nhập Số Điện Thoại">
                    </div>
                    <div class="form-group">
                    <label >Mật Khẩu</label>
                    <input type="password" class="form-control" name="matkhau"  placeholder="Nhập Mật Khẩu">
                    </div>
                    <div class="form-group">
                    <label >Nhập Lại Mật Khẩu</label>
                    <input type="password" class="form-control" name="nlmatkhau"  placeholder="Nhập Lại Mật Khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary" name="dangky">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
