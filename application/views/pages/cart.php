        <!-- cart -->

<section class="cart">
    <div class="container" style="margin-top: 200px">
        <div class="cart-content row">
            <div class="cart-content-left">
                
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    
                    <?php
                    $subtotal = 0;
                    $total = 0;
                    $index = 0;

                    if (empty($cart_details)) {
                        echo '<tr>
                            <td>
                                Chưa có sản phẩm nào 
                            </td>
                        </tr>';
                    } else {
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
                                <td><img src="<?php echo base_url('uploads/product/'.$product->product_image) ?>" alt=""></td>
                                <td><p><?php echo $product->product_title ?></p></td>
                                <td><input type="number" value="<?php echo $product->product_quantity ?>" min="1"></td>
                                <td><?php echo number_format($subtotal, 0, ',', '.') ?> đ</td>
                                <td><a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('delete-item/'.$product->product_id) ?>"><i class="ti-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    
                </table>
            </div>

            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>

                    <tr>
                        <td>Tổng sản phẩm</td>
                        <td><?php echo $index ?></td>
                    </tr>
                    <tr>
                        <td>Tổng tiền hàng</td>
                        <td><p><?php echo number_format($total,0,',','.') ?> đ</p></td>
                    </tr>

                </table>

                
                <div class="cart-content-right-bottom">
                    <a href="<?php echo base_url('danh-muc') ?>">Tiếp tục mua sắm</a>
                    <?php
                    if($cart_details){
                    ?>
                    <a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('delete-all-cart/'.$loggedInCustomer['id']) ?>">
                        Xóa tất cả
                    </a>
                    <a href="<?php echo base_url('checkout') ?>">Đặt hàng</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>