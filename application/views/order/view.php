

<div class="card">
        <div class="card-header">
            List order
            <br>

        </div>
        <?php
        if($this->session->flashdata('success')){
        ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php   
            }else if($this->session->flashdata('error')){
        ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php            
            }
        ?>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Order Code</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($order_details as $key => $ord){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $ord->order_code ?></td>
                        <td><img src="<?php echo base_url('uploads/product/'.$ord->image) ?>" width="150" height="150"></td>
                        <td><?php echo $ord->title ?></td>
                        <td><?php echo number_format($ord->price,0,',','.') ?>đ</td>
                        <td><?php echo $ord->qty ?></td>
                        
                        <td>
                            <?php 
                                echo number_format($ord->qty * $ord->price,0,',','.'); 
                            ?>
                            đ
                        </td>
                        
                    </tr>
                        
                    <?php 
                    }
                    ?>                  
                </tbody>
            </table>
        </div>
    </div>
