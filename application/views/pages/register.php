<div class="container-resiger">
    <h1>ĐĂNG KÝ</h1>
        <form action="<?php echo base_url('dang-ky-user') ?>" method="POST">
            <div class="resiger-left">
                <h2>Thông Tin Khách Hàng</h2>       
                <div class="form-row-register">
                    <div class="form-column">
                        <label for="last-name">Tên:</label>
                        <input type="text"  name="name" >
                        <?php echo form_error('name') ?>
                    </div>
                </div>
                <div class="form-row-register">
                    <div class="form-column">
                        <label for="email">Email:</label>
                        <input type="email" name="email" >
                        <?php echo form_error('email') ?>

                    </div>
                    <div class="form-column">
                        <label for="phone">Điện thoại:</label>
                        <input type="tel" name="phone" >
                        <?php echo form_error('phone') ?>

                    </div>
                </div>
                
                <div class="form-row-register">
                    <div class="form-column">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" name="adress">
                        <?php echo form_error('adress') ?>

                    </div>
                </div>
            </div>
            <div class="resiger-right">
                <h2>Thông tin mật khẩu</h2>
                <!-- Mật khẩu -->
                <div class="form-column">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" name="password" >
                    <?php echo form_error('password') ?>
                </div>
                <!-- Xác nhận mật khẩu -->
                <div class="form-column">
                    <label for="confirm-password">Xác nhận mật khẩu:</label>
                    <input type="password" name="confirm-password" >
                    <?php echo form_error('confirm-password') ?>
                </div>
                <!-- Nút Đăng ký -->
                <div class="form-actions">
                    <button type="submit">Đăng Ký</button>
                </div>
            </div>
        </form>
    </div>