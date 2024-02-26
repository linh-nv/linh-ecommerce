<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('fontend/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontend/css/delivery.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontend/css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontend/css/register.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontend/css/customer_infor.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('fontend/font/themify-icons/themify-icons.css') ?>">

    <title>SuperMarket-project</title>
</head>
<body>
    <header>       
        <div class="menu">
            <li><a href="<?php echo base_url('/') ?>">Home</a>
                
            </li>
            
            <li><a href="<?php echo base_url('danh-muc/') ?>">Category</a>
                <ul class="sub-menu">
                    <div class="list-submenu">
                        <div class="item-list-submenu" style="text-transform: none;">
                            <ul>
                                <?php
                                foreach($category as $key => $cate){
                                ?>
                                    <li><a href="<?php echo base_url('danh-muc/'.$cate->id)?>"><?php echo $cate->title ?></a></li>
                                <?php   
                                }
                                ?> 
                            </ul>
                        </div>
                    </div>
                </ul>
            </li>
            <li><a href="<?php echo base_url('/thuong-hieu') ?>">Brands</a>
                <ul class="sub-menu">
                    <div class="list-submenu">
                        <div class="item-list-submenu" style="text-transform: none;">
                            <ul>
                                <?php
                                foreach($brand as $key => $bra){
                                    ?>
                                    <li><a href="<?php echo base_url('thuong-hieu/'.$bra->id)?>"><?php echo $bra->title ?></a></li>
                                <?php   
                                }
                                ?> 
                            </ul>
                        </div>
                    </div>
                </ul>
            </li>
            <li><a href="<?php echo base_url('aboutUs') ?>" style="color: brown;">Về chúng tôi</a></li>
        </div>
        <div class="logo">
            <a href="<?php echo base_url('/') ?>">winmart</a>
        </div>
        <div class="others">
            <li>
                <form action="<?php echo base_url('tim-kiem') ?>" method="GET" autocomplete="off">
                    <input placeholder="Tìm kiếm sản phẩm" type="text" name="keyword"> 
                    <button type="submit"><i class="ti-search"></i></button>
            </form>
            </li>
            <li>
                <?php 
                if(!$this->session->userdata('LoggedInCustomer')){
                ?>
                    <a href="<?php echo base_url('dang-nhap') ?>" class="ti-user"></a>
                <?php
                }else{
                ?>
                    <a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('thong-tin-nguoi-dung/'.$loggedInCustomer['id']) ?>" class="ti-id-badge"></a>
                <?php
                }
                ?>

                <?php 
                if($this->session->userdata('LoggedInCustomer')){
                ?>
                    <a href="<?php $loggedInCustomer = $this->session->userdata('LoggedInCustomer'); echo base_url('gio-hang/'.$loggedInCustomer['id']) ?>" class="ti-shopping-cart"></a>
                <?php
                }
                ?>
            </li>
        </div>
    </header>