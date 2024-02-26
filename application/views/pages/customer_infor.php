<?php 
foreach($customer_details as $key => $cusdt){
?>
<section class="customer-infor">
    <div class="customer-infor-left">
        <div class="customer-infor-left-title">
            <i class="ti-user"></i>
            <p><?php echo $cusdt->name ?></p>
        </div>
        <div class="customer-infor-left-item">
            <i class="ti-id-badge"></i>
            <p>Thông tin tài khoản</p>
        </div>
        <div class="customer-infor-left-item-change-password">   
            <div class="change-password" style="width: 100%;"><i class="ti-lock"></i>Đổi mật khẩu</div>
        </div>
        <div class="customer-infor-left-item">   
            <a href="<?php echo base_url('dang-xuat') ?>"><i class="ti-export"></i>Đăng xuất</a>
        </div>
    </div>
    <div class="customer-infor-right">
        <div class="customer-infor-right-title">
            <p>Tài khoản của tôi</p>
        </div>
        <div class="customer-infor-right-takenote">
            <p>"Vì chính sách an toàn thẻ, bạn không thể thay đổi SĐT, Email, Họ tên."</p>
        </div>
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
        
        <form method="post" action="<?php echo base_url('update-adress/'.$cusdt->id) ?>">
            <div class="customer-infor-right-item">
            
                <div class="customer-infor-right-item-text">
                    <p>Họ Tên</p>
                    <p>Số điện thoại</p>
                    <p>Email</p>
                    <p>Địa chỉ</p>
                </div>
                <div class="customer-infor-right-item-input">           
                        <input type="text" value="<?php echo $cusdt->name ?>" name="">
                        <input type="text" value="<?php echo $cusdt->phone ?>" name="">
                        <input type="text" value="<?php echo $cusdt->email ?>" name="">
                        <input type="text" value="<?php echo $cusdt->adress ?>" name="adress">
                </div>   
            </div> 
            <div class="customer-infor-right-item">
                <a href=""><button type="submit">Cập nhật</button></a>
            </div>
        </form>
    </div>
    <div class="change-password-form">
        <p>ĐỔI MẬT KHẨU</p>
        
        <form method="post" action="<?php echo base_url('update-password/'.$cusdt->id) ?>">
            <div class="customer-infor-right-item">
                <div class="change-password-right-item-text">
                    <p>Nhập lại mật khẩu cũ</p>
                    <p>Nhập mật khẩu mới</p>
                    <p>Nhập lại mật khẩu mới</p>
                </div>
                <div class="change-password-right-item-input">   
                        <input type="password" name="old_password">
                        <input type="password" name="new_password">
                        <input type="password" name="re_password">
                </div>   
            </div> 
            <div class="customer-infor-right-item">
                <a href=""><button type="submit">Đổi mật khẩu</button></a>
            </div>
        </form>
    </div>
</section>
<?php
}
?>