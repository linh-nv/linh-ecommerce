
<div class="container-login">

            <div class="form-row">
                <div class="login">
                    <form action="<?php echo base_url('login-customer') ?>" method="POST">
                        <div class="login-container col">
                            <div class="login-title">
                                <h3 class="title">Bạn đã có tài khoản</h3>
                            </div>
                            <div class="login-content">
                                <p class="description">Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm
                                    thành viên và nhận được những ưu đãi tốt hơn!</p>
                                <div class="login-form">

                                <?php
                                    if($this->session->flashdata('success')){
                                ?>
                                        <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
                                <?php   
                                    }else if($this->session->flashdata('error')){
                                ?>
                                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
                                <?php            
                                    }
                                ?>
                                    <div class="input-login">
                                        <input class="form-control" type="email" name="email" placeholder="Email/SĐT">
                                        <?php echo form_error('email') ?>
                                    </div>
            
                                    <div class="input-login">
                                        <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                                        <?php echo form_error('password') ?>
                                    </div>
            
                                    <div class="other-option">
                                        <a class="form-link" href="<?php echo base_url('forgot-password') ?>">Quên mật khẩu? </a>
                                    </div>
            
                                    <div class="form-button">
                                        <button type="submit" class="btn btn--large" style="font-weight: bold;">ĐĂNG NHẬP</button>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            
                <div class="register">
                    <div class="register-container col">

                        <h3 class="title">Khách hàng mới của nhóm 6</h3>
                            <div class="register-content">
                                <p class="description">
                                        Nếu bạn chưa có tài khoản, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.
                                </p>
                                <p class="description">
                                        Bằng cách cung cấp cho Nhóm 6 thông tin chi tiết của bạn, quá trình mua hàng sẽ là một trải nghiệm thú vị và nhanh chóng hơn!
                                </p>
                                <div class="form-button">
                                    <a href="<?php echo base_url('dang-ky') ?>"> <button class="btn btn--large" style="font-weight: bold;">ĐĂNG KÝ</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
</div>