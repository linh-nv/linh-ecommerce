<div class="forget-password-form" style="margin-top: 100px;">
        <p>QUÊN MẬT KHẨU</p>
        <?php
            if($this->session->flashdata('success')){
            ?>
                    <div style="color: green;"><?php echo $this->session->flashdata('success') ?></div>
            <?php   
                }else if($this->session->flashdata('error')){
            ?>
                    <div style="color: red;"><?php echo $this->session->flashdata('error') ?></div>
            <?php            
                }
            ?>
        <form method="post" action="<?php echo base_url('forgot-password-post') ?>">
            <div class="forget-password-item">
                <div class="forget-password-item-text">
                    <p>Nhập số email</p>
                    <p>Nhập mật khẩu mới</p>
                    <p>Nhập lại mật khẩu mới</p>
                </div>
                <div class="forget-password-item-input">   
                        <input type="text" name="email">
                        <input type="password" name="new_password">
                        <input type="password" name="re_password">
                </div>   
            </div> 
            <div class="forget-password-item">
                <button type="submit">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
