<!-- new product -->
<section class="home-new-prod">
    <div class="title-section">NEW ARRIVAL</div>
    <div class="new-prod-content">
        <?php
        $count = count($allproduct);
        $showed = 0;
        for ($index = $count - 1; $index >= 0; $index--) {
            $pro = $allproduct[$index];
            $showed++;
            if (($showed <=  8) && ($pro->quantity > 0)) {
                ?>
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <a href="<?php echo base_url('san-pham/'.$pro->id) ?>">
                            <div class="item-new-prod">
                                <div class="product-arrival">
                                    <div class="img-product">
                                        <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="">
                                    </div>
                                    <div class="info-product">                             
                                        <div class="title-product"><?php echo $pro->title ?></div>
                                        <div class="price-product">
                                            <span><?php echo number_format($pro->price,0,',','.') ?> đ</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="add-to-cart">
                            <i class="ti-shopping-cart-full"></i>  
                        
                            <div class="shopping-cart">
                                <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
                                    <p>Chọn số lượng</p>
                                    <input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
                                    <input type="hidden" value="<?php echo $pro->title ?>" name="title">
                                    <input type="hidden" value="<?php echo $pro->image ?>" name="image">
                                    <input type="hidden" value="<?php echo $pro->price ?>" name="price">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $pro->quantity?>">
                                    <button type="submit">
                                        THÊM VÀO GIỎ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="link-all-porduct">
                <a href="<?php echo base_url('/danh-muc') ?>">Xem tất cả sản phẩm</a>
    </div>
</section>

<!-- brand-->
<section class="home-new-prod" style="border: none;background: #fff;">
    <div class="title-section">THƯƠNG HIỆU ĐỒNG HÀNH</div>
    <div class="brand-section">
        <?php
        foreach($brand as $key => $bra){
        ?>
        <div class="brand-section-item">
            <a href="<?php echo base_url('thuong-hieu/'.$bra->id) ?>">
                <img src="<?php echo base_url('uploads/brand/'.$bra->image) ?>" alt="">
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- category -->
<?php
foreach($category as $key => $cate){
?>
<section class="home-new-prod">
    <div class="title-section" style="text-transform: uppercase;"><?php echo $cate->title ?></div>
    <div class="new-prod-content">
        <?php
        $count = count($allproduct);
        $showed = 0;
        $id_category = $cate->id;
        $count_quantity_category = 0;
        foreach($allproduct as $key => $pro){
            
            
            if (($pro->quantity > 0) && ($pro->category_id == $id_category)) {
                $showed++;
                $count_quantity_category++;
                if ($showed <=  8){
                ?>
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <a href="<?php echo base_url('san-pham/'.$pro->id) ?>">
                            <div class="item-new-prod">
                                <div class="product-arrival">
                                    <div class="img-product">
                                        <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="">
                                    </div>
                                    <div class="info-product">                             
                                        <div class="title-product"><?php echo $pro->title ?></div>
                                        <div class="price-product">
                                            <span><?php echo number_format($pro->price,0,',','.') ?> đ</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="add-to-cart">
                            <i class="ti-shopping-cart-full"></i>  
                        
                            <div class="shopping-cart">
                                <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
                                    <p>Chọn số lượng</p>
                                    <input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
                                    <input type="hidden" value="<?php echo $pro->title ?>" name="title">
                                    <input type="hidden" value="<?php echo $pro->image ?>" name="image">
                                    <input type="hidden" value="<?php echo $pro->price ?>" name="price">
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $pro->quantity?>">
                                    <button type="submit">
                                        THÊM VÀO GIỎ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        }
        ?>
    </div>

    <div class="link-all-porduct">
            <div class="all-product" style="display: flex;">
                <a href="<?php echo base_url('danh-muc/'.$id_category) ?>">Xem thêm <?php 
                echo $remaining_product = $count_quantity_category - 8 
                ?> sản phẩm  <p style="font-weight: 600;"><?php echo $cate->title ?></p></a>
            </div>
    </div>
</section>
<?php
}
?>