
    <!-- ..........................category............................... -->
    <section class="category">
        <div class="row">
            <div class="category-left">
                <li class="category-left-li"><a href="#">Category</a>
                    <ul>
                        <?php
                        foreach($category as $key => $cate){
                        ?>
                            <li><a href="<?php echo base_url('danh-muc/'.$cate->id)?>"><?php echo $cate->title ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="category-left-li"><a href="#">Brand</a>
                    <ul>
                        <?php
                        foreach($brand as $key => $bra){
                        ?>
                            <li><a href="<?php echo base_url('thuong-hieu/'.$bra->id)?>"><?php echo $bra->title ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </div>

            <div class="category-right">
                <div class="category-right-top-item">
                    <?php if (!empty($category_title)){
                    ?>
                        <p>Từ khóa: <?php echo $category_title?></p>
                    <?php
                    }else{
                    ?> 
                        <p>Danh sách tất cả sản phẩm</p>
                    <?php
                    } 
                    ?>
                </div>
                
                <div class="category-right-content">
                    <div class="category-right-content-item">
                        <?php
                        if(empty($category_title)){
                            foreach($allproduct as $key => $pro){
                                if($pro->quantity > 0){
                        ?>
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" >
                                            <a href="<?php echo base_url('san-pham/'.$pro->id)?>">
                                                <div class="item-new-prod">
                                                    <div class="product-arrival">
                                                        <div class="img-product">
                                                            <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="">
                                                        </div>
                                                        <div class="info-product">                             
                                                            <div class="title-product"><?php echo $pro->title ?> </div>
                                                            <div class="price-product">
                                                                <span><?php echo number_format($pro->price,0,',','.') ?> đ</span>
                                                                <div class="add-to-cart">
                                                                    <i class="ti-shopping-cart-full"></i>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                }
                        ?>
                        <?php
                            }
                        }else{
                            foreach($product as $key => $pro){
                                if($pro->quantity > 0){
                            ?>
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" >
                                        <a href="<?php echo base_url('san-pham/'.$pro->id)?>">
                                            <div class="item-new-prod">
                                                <div class="product-arrival">
                                                    <div class="img-product">
                                                            <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="">
                                                    </div>
                                                    <div class="info-product">                             
                                                        <div class="title-product"><?php echo $pro->title ?> </div>
                                                        <div class="price-product">
                                                            <span><?php echo number_format($pro->price,0,',','.') ?> đ</span>
                                                            <div class="add-to-cart">
                                                                <i class="ti-shopping-cart-full"></i>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php
                                }
                            
                            }
                        }
                            ?>
                    </div>
                </div>
                
            </div> 

        </div>                          
    </section>
