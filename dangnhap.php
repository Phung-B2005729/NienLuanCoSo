<?php 
    include("header.php");?>
    <main> <div class="contaner" id="dangnhap"> 
        <div class="row">
            <div class="col-6">
                <div class="container quangcao">
                    <div class="row">
                        <h1>TRÃI NGHIỆM XEM PHIM TUYỆT VỜI <br/> VỚI ARCH CINEMA!!</h1>
                    </div>
                    <div class="row">
                        <h4>Hệ thống rạp trãi dài trên toàn quốc, suất chiếu dài đặt
                        </h4><h4>Màn hình chiếu 2D, hệ thống ghế ngồi thoải mái</h4>
                        <h4>Đăng ký ngay trở thành thành viên mới của ARCH để có cở hội tích điểm ưu đãi</h4>
                    </div>
                </div>
            </div>
            <div class="col-6">
             <div class="col-6 offset-3 bieumau">
                <div class="row mt-10">
                  <div clas="col-4">
                    <h2>Sign Up Now</h2>
                    <hr style="margin-left: 10px; margin-right: 10px;"/>
                </div>
                </div>
                <div class="container ml-3">
              <form action="xulydangnhap.php" method="POST">
                  <div class="row mb-3 mt-3">
                      <label for="inputEmail" class="col-sm-12 col-form-label nhaninput">Username</label>
                      <div class="col-12">
                        <input type="text" class="form-control" required name="user" id="inputusername" placeholder="Nhập vào email">
                      </div>
                    </div>
                  <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-12 col-form-label nhaninput">Mật khẩu:</label>
                  <div class="col-12">
                    <input type="password" class="form-control" required name="password" id="inputPassword" placeholder="Nhập vào mật khẩu">
                  </div>
                </div>
                      <div class="row mb-3">
                          <div class="col-9">
                              <input type="checkbox" id="ghinho">
                              <label for="ghinho">Lưu mật khẩu đăng nhập</label>
                          </div>
                      </div>
                      <div class="row input-btn mb-3">
                             <button type="submit" name="dangnhap" class="btn">Sign In</button>
                      </div>
              </form>
              <hr/>
              <div class="row mb-3">
                <div class="col-5">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="col-7 p-0 m-0">  <a href="dangky.php">Bạn chưa có tài khoản?</a></div>
              </div>
              </div>
              </div>
        </div>
    </div>
        </div>
</main>
    <?php
    include("footer.php")?>