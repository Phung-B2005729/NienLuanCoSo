
<?php 
    include("header.php");?>
 <main  >
        <section class="dangky">
            <div class="container">
                <div class="row">
                  <div class="col-6">
                    <form class="row g-3 formdangky" id="SignUpForm" onsubmit="return ktdangky(this)" action="xulydangky.php" method="POST">
                      <h2>Đăng ký thành viên</h2>
                      <hr/>
                      <div class="col-md-6">
                        <label for="inputfullname" class="form-label">Họ và tên<span class="error">*</span> </label>
                        <input type="text" name="fullname" required class="form-control" id="inputfullname">
                      </div>
                      <div class="col-md-6">
                        <label for="inputusername" class="form-label">Username<span class="error">*</span> </label>
                        <input type="text" name="user" required class="form-control" id="inputusername">
                      </div>
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email<span class="error">*</span></label>
                        <input type="text" name="email" required class="form-control" id="inputEmail4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error">*</span></label>
                        <input type="text" name="phone" required class="form-control" id="inputNumberl4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Mật khẩu<span class="error">*</span></label>
                        <input type="password" name="password" required class="form-control" id="matkhau">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Nhập lại mật khẩu<span class="error">*</span></label>
                        <input type="password" name="re_password" required class="form-control" id="nhaplai">
                      </div>
                      <div class="col-md-6">
                        <label for="inputCity" class="form-label">Ngày sinh<span class="error">*</span></label>
                        <input type="date" name="birthday" required class="form-control" id="inputdate">
                      </div>
                      <div class="col-md-6">
                        <label for="inputCity" class="form-label">Giới tính</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gioitinh" value="nam" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Nam
                          </label> 
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gioitinh" value="nu" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                           Nữ
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="inputState" class="form-label">Khu vực<span class="error">*</span></label>
                        <select id="inputState" required name="khuvuc" class="form-select">
                          <option selected value=""></option>
                          <option value="An Giang">An Giang</option>
                          <option>Bà Rịa - Vũng Tàu</option>
                          <option>Bắc Giang</option>
                          <option>Bắc Kạn</option>
                          <option>Bạc Liêu</option>
                          <option>Bắc Ninh</option>
                          <option>Bến Tre</option>
                          <option>Bình Định</option>
                          <option>Bình Dương</option>
                          <option>Cà Mau</option>
                          <option>Cần Thơ</option>
                          <option>Đà Nẵng</option>
                          <option>Điện Biên</option>
                          <option>Đồng Nai</option>
                          <option>Đồng Tháp</option>
                          <option>Gia Lai</option>
                          <option>Hà Giang</option>
                          <option>Hà Nội</option>
                          <option>Hải Phòng</option>
                          <option>Hậu Giang</option>
                          <option>Khánh Hoà</option>
                          <option>Kiên Giang</option>
                          <option>Lâm Đồng</option>
                          <option>Ninh Bình</option>
                          <option>Ninh Thuận</option>
                          <option>Quãng Nam</option>
                          <option>Quãng Ngãi</option>
                          <option>Sóc Trăng</option>
                          <option>Sơn La</option>
                          <option>Tây Ninh</option>
                          <option>Thanh Hoá</option>
                          <option>Tiền Giang</option>
                          <option>Hồ Chính Minh</option>
                          <option>Trà Vinh</option>
                          <option>Vĩnh Long</option>
                          <option>Yên Bái</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="agree" required title="Bạn phải đồng ý với điều khoản sử dụng tài khoản của chúng tôi" type="checkbox" id="gridCheck">
                          <label class="form-check-label dieukhoansd" for="gridCheck">
                            <b>Tôi đồng ý</b> <a href="#">với điều khoản sử dụng của ARCH</a>
                          </label>
                        </div>
                      </div>
                      <div class="row mt-3 dangky-button">
                        <button type="submit" class="btn" name="dangky">Đăng ký</button>
                      </div>
                    </form>
                  </div>

                  <div class="col-6 slide_uudai">
                    <div id="carouselExampleCaptions " class="carousel slide uudai" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="Anh/uudia8-3.jpg" class="d-block w-100" alt="...">
                          
                        </div>
                        <div class="carousel-item">
                          <img src="Anh/uudai20k.jpg" class="d-block w-100" alt="...">
                         
                        </div>
                        <div class="carousel-item">
                          <img src="Anh/uudaithanhvien.jpg" class="d-block w-100" alt="...">
                          
                        </div>

                       
                      </div>
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Chương Trình Khuyến mãi</h5>
                        <p>Nhiều chương trình hấp dẫn dành riêng cho thành viên của CGV</p>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                     
                    </div>
                  </div>
                </div>
                
            </div>

        </section>

</main>
    <?php
    include("footer.php")?>