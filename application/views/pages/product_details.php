
    <!-- ..........................product................................ -->

    <section class="product">
        <div class="container">
            <div class="category-top row">
                    <ol class="breadcrumb_list">
                        <li class="breadcrumb_item">
                            <a href="<?php echo base_url('/') ?>" class="breadcrumb_link">Trang chủ</a>
                        </li>
                        <li class="breadcrumb_item">
                            <a href="" class="breadcrumb_link">
                                <?php echo $product_title ?>
                            </a>
                        </li>
                        
                    </ol>
            </div>
        </div>
        <div class="product-content row">
            <!-- big image -->
            <div class="product-content-left row">
                <?php 
                foreach($product_details as $key => $pro){
                ?>
                        <img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="">
                <?php
                }
                ?>
            </div>
            <!-- content -->
            <div class="product-content-right">
                    <?php 
                    foreach($product_details as $key => $pro){
                    $id_category = $pro->category_id;
                    $title_product = $pro->title;
                    ?>  
                    <form action="<?php echo base_url('add-to-cart') ?>" method="POST">
                    
                        <div class="product-content-right-product-name">
                            <h1><?php echo $pro->title ?></h1>                   
                            <p><?php echo $pro->tenthuonghieu ?></p>
                        </div>
                        <div class="product-content-right-product-price">
                            <p><?php echo number_format($pro->price,0,',','.') ?> đ</p>
                        </div>
                        <div class="product-content-right-product-name">                
                            <p>Kho: <?php echo $pro->quantity ?></p>
                        </div>
                        

                        <div class="product-content-right-product-quantity">
                            <p style="font-weight: bold;">Số lượng</p>
                            <input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
                            <input type="hidden" value="<?php echo $pro->title ?>" name="title">
                            <input type="hidden" value="<?php echo $pro->image ?>" name="image">
                            <input type="hidden" value="<?php echo $pro->price ?>" name="price">
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo $pro->quantity?>">
                            
                        </div>
                    
                        <div class="product-content-right-product-button">
                            <?php
                            if(!$this->session->userdata('LoggedInCustomer')){
                            ?>
                                <a href="<?php echo base_url('dang-nhap')?>">
                                    Hãy đăng nhập để mua hàng
                                </a>
                            <?php
                            }else{
                            ?>
                                <button type="submit">
                                    THÊM VÀO GIỎ
                                </button>
                                <!-- <a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('gio-hang/'.$loggedInCustomer['id']) ?>" class="ti-shopping-cart"></a> -->
                            <?php
                            }
                            ?>                          
                            
                        </div>
                        <div class="product-content-right-bottom">
                            
                            <div class="product-content-right-bottom-content-tab">
                                <div class="product-content-right-bottom-content-tab-header row">
                                    <div class="product-content-right-bottom-content-tab-header-title-item chitiet">
                                        
                                        <div class="product-content-right-bottom-top">
                                            <p>Chi tiết</p>
                                            <i class="ti-angle-down"></i>
                                        </div>
                                    </div>

                                </div>
                                <div class="product-content-right-bottom-content-tab-body">
                                    <div class="product-content-right-bottom-content-tab-body_chitiet">
                                        <p><?php echo $pro->description ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
            </div>
    </section>
    <section class="product-related">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
        <div class="product-related-item">
        <?php
        $dem = 0;
        foreach($allproduct as $key => $pro){
            if(($pro->category_id == $id_category) && ($title_product != $pro->title)){
                $dem++;
                if($dem <=4){
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
    </section>

<script>
    
    // product-content-right-bottom-content-tab-header

    // const chitiet = document.querySelector(".chitiet")

    // if(chitiet){
    //     chitiet.addEventListener("click", function(){
    //         document.querySelector(".product-content-right-bottom-content-tab-body_chitiet").style.display="block"
    //     })
    // }
    // product-content-right-bottom-content-tab-showmore
    const butTon = document.querySelector(".product-content-right-bottom-top")
    if(butTon){
        butTon.addEventListener("click",function(){
            document.querySelector(".product-content-right-bottom-content-tab-body").classList.toggle("activeB")
        })
    }
</script>
