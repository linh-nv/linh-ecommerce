

    <div class="card">
        <div class="card-header">
            List Brand
            <br>
            <a href="<?php echo base_url('brand/create') ?>" class="btn btn-success col-2">Add brand</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($brand as $key => $bra){
                    ?>
                        <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $bra->title ?></td>
                        <td><?php echo $bra->description ?></td>
                        <td>
                            <img src="<?php echo base_url('uploads/brand/'.$bra->image) ?>" width="150" height="150" alt="">
                        </td>
                        <td>
                            <?php 
                            if($bra->status == 1){
                                echo 'Active';
                            }else{
                                echo 'InActive';                               
                            }
                            ?>
                        </td>
                        
                        <td>
                            <a onclick="return confirm('Are you sure ?')" href="<?php echo base_url('brand/delete/'.$bra->id) ?>" class="btn btn-danger">Delete</a>
                            <a href="<?php echo base_url('brand/edit/'.$bra->id) ?>" class="btn btn-warning">Edit</a>
                        </td>
                        
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
