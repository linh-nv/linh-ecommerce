

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
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($order as $key => $ord){
                    ?>
                        <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $ord->order_code ?></td>
                        <td><?php echo $ord->name ?></td>
                        <td><?php echo $ord->phone ?></td>
                        <td><?php echo $ord->adress ?></td>
                        
                        <td>
                            <?php 
                            if($ord->status == 1){
                                echo '<span class = "text text-primary">Đang chờ xác nhận đơn hàng</span>';
                            }elseif($ord->status == 0){
                                echo '<span class = "text text-primary">Đã hủy</span>';
                            }elseif($ord->status == 2){
                                echo '<span class = "text text-primary">Đang đợi lấy hàng</span>';
                            }elseif($ord->status == 3){
                                echo '<span class = "text text-primary">Đang giao</span>';
                            }elseif($ord->status == 4){
                                echo '<span class = "text text-primary">Hoàn thành đơn</span>';
                            }elseif($ord->status == 5){
                                echo '<span class = "text text-primary">Đơn hàng đã hoàn thành</span>';
                            }
                            ?>

                            <?php
                            if(($ord->status == 1)||($ord->status == 4)){
                            ?>
                                <a href="<?php echo base_url('order/update-status/'.$ord->order_code) ?>" class="btn btn-primary">Xác nhận</a>
                                <a href="<?php echo base_url('order/update-status-cancel/'.$ord->order_code) ?>" class="btn btn-dark">Hủy đơn</a>
                            <?php
                            }elseif(($ord->status == 2)||($ord->status == 3)){
                            ?>
                                <a href="<?php echo base_url('order/update-status/'.$ord->order_code) ?>" class="btn btn-primary">Hoàn thành</a>
                                <a href="<?php echo base_url('order/update-status-cancel/'.$ord->order_code) ?>" class="btn btn-dark">Hủy đơn</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('order/view/'.$ord->order_code) ?>" class="btn btn-warning">View</a>
                            <a onclick="return confirm('Are you sure ?')" href="<?php echo base_url('order/delete/'.$ord->order_code) ?>" class="btn btn-danger">Delete</a>
                        </td>
                        
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
