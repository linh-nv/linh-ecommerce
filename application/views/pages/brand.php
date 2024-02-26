
    <!-- ..........................category............................... -->
    <section class="category">
        <div class="container">
            <div class="category-top row">
                <ol class="breadcrumb_list">
                    <li class="breadcrumb_item">
                        <a href="<?php echo base_url('/') ?>" class="breadcrumb_link">Trang chủ</a>
                    </li>
                    <li class="breadcrumb_item">
                        <a href="<?php echo base_url('/thuong-hieu') ?>" class="breadcrumb_link">Brand</a>
                    </li>
                    <li class="breadcrumb_item">
                        <a href="" class="breadcrumb_link">
                            <?php if (!empty($brand_title)){
                            ?>
                                <p><?php echo $brand_title ?></p>
                            <?php
                            }else{
                            ?> 
                                <p>Danh sách brand hợp tác</p>
                            <?php
                            } 
                            ?>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
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
                    <?php if (!empty($brand_title)){
                    ?>
                        <p><?php echo $brand_title ?></p>
                    <?php
                    }else{
                    ?> 
                        <p>Danh sách brand hợp tác</p>
                    <?php
                    } 
                    ?>
                </div>
                
                <div class="category-right-content">
                    <div class="category-right-content-item">
                        <?php
                        if(empty($brand_title)){
                            foreach($brand as $key => $bra){
                        ?>
                                <div class="brand-content">
                                    <div class="brand-content-img">
                                        <a href="">
                                        <img src="<?php echo base_url('uploads/brand/'.$bra->image) ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="info-brand">                             
                                        <div class="title-brand"><?php echo $bra->title ?> </div>
                                        <div class="description">
                                            <p><?php echo $bra->description ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                        <?php
                            }
                        ?>
                        <?php
                        }else{
                            foreach($brand_product as $key => $pro){
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
                            ?>
                    </div>
                </div>
        </div>                          
    </section>
