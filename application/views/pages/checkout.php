
<!------------Delivery-->
<section class="delivery" >
    <div class="container">
        <div class="delivery-container">
            <div class="delivery-content-left">
                <p>Thông tin giao hàng</p>
                
                <form action="<?php echo base_url('confirm-checkout'); ?>" onsubmit="return confirm('Xác nhận đặt hàng')" method="POST">
                    <div class="delivery-content-left-input-top-row">
                    <?php 
                    foreach($customer_details as $key => $cusdt){
                    ?>
                        <div class="delivery-content-left-input-top-item">
                            <lable for="">Họ Tên<span style="color: red;"></span></lable>
                            <input type="text" name="name" placeholder="Name" value="<?php echo $cusdt->name ?>">
                            <?php echo form_error('name') ?>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <lable for="">Điện thoại<span style="color: red;"></span></lable>
                            <input type="text" name="phone" placeholder="phone" value="<?php echo $cusdt->phone ?>">
                            <?php echo form_error('phone') ?>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <lable for="">Email<nav></nav><span style="color: red;"></span></lable>
                            <input type="email" name="email" placeholder="email" value="<?php echo $cusdt->email ?>">
                            <?php echo form_error('email') ?>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <lable for="">Địa chỉ<span style="color: red;"></span></lable>
                            <input type="text" name="adress" placeholder="adress" value="<?php echo $cusdt->adress ?>">
                            <?php echo form_error('adress') ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <label for="">Hình thức thanh toán</label>
                    <select name="shipping_method" id="">
                        <option value="cod">COD</option>
                        <option value="vnpay">VNPAY</option>
                    </select>
                    <div class="delivery-content-left-button row">
                    <a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('gio-hang/'.$loggedInCustomer['id']) ?>"><span>&#171;</span>Quay lại giỏ hàng</a>

                    <?php
                    if($this->session->userdata('LoggedInCustomer')){
                    ?>
                        <a href="<?php echo base_url('') ?>"><button type="submit">THANH TOÁN VÀ GIAO HÀNG</button></a>
                    <?php    
                    }else{
                    ?>
                        <a href="<?php echo base_url('dang-nhap') ?>">HÃY ĐĂNG NHẬP ĐỂ THANH TOÁN</a>
                    <?php
                    }
                    ?>
                    </div>
                </form>
            </div>

    <div class ="delivery-content-right">
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>

            <?php
                    $subtotal = 0;
                    $total = 0;
                    $index = 0;
                    if (!empty($cart_details)) {
                        // Tạo mảng để lưu trữ các cart_details theo product_id
                        $productDetails = array();

                        foreach ($cart_details as $key => $cart) {
                            $product_id = $cart->product_id;

                            // Kiểm tra xem product_id đã tồn tại trong mảng $productDetails chưa
                            if (isset($productDetails[$product_id])) {
                                // Nếu đã tồn tại, cộng thêm quantity vào giá trị hiện tại
                                $productDetails[$product_id]->product_quantity += $cart->product_quantity;
                            } else {
                                // Nếu chưa tồn tại, tạo một bản sao của cart_details cho product_id đó
                                $productDetails[$product_id] = clone $cart;
                            }

                            $subtotal = $cart->product_quantity * $cart->product_price;
                            $total += $subtotal;
                            $index++;
                        }

                        // Hiển thị thông tin sản phẩm và tổng quantity theo từng product_id
                        foreach ($productDetails as $product) {
                            $subtotal = $product->product_quantity * $product->product_price;
                            ?>
                    <tr>
                        <td><?php echo $product->product_title ?></td>
                        <td><?php echo $product->product_quantity ?></td>
                        <td><p><?php echo number_format($product->product_price,0,',','.');  ?> đ</p></td>
                    </tr>      
                <?php
                        }
                    }
                ?>
            
            
            <tr style="font-weight: bold;">
                <td>Tổng</td>
                <td><?php echo $index ?></td>
                <td><p><?php echo number_format($total,0,',','.'); ?> đ</p></td>
            </tr>
            <?php
            ?>
        </table>
        
    </div>
        </div>

</section>
