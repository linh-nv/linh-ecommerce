
    <div class="card">
        <div class="card-header">
            Edit brand
            <br>
            <a href="<?php echo base_url('brand/create') ?>" class="btn btn-success col-2">Add brand</a>
            <a href="<?php echo base_url('brand/list') ?>" class="btn btn-success col-2">List brand</a>
        </div>
        <div class="card-body">
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
            <form action="<?php echo base_url('brand/update/'.$brand->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="<?php echo $brand->title ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class ="text text-danger">'.form_error('title').'</span>' ; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $brand->description ?>" id="exampleInputPassword1">
                    <?php echo '<span class ="text text-danger">'.form_error('description').'</span>' ; ?>

                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1">
                    <img src="<?php echo base_url('uploads/brand/'.$brand->image) ?>" width="150" height="150" alt="">
                    <small><?php if(isset($error)){echo $error;} ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php 
                        if($brand->status == 1){
                        ?>
                            <option seleced value="1">Active</option>
                            <option value="0">Inactive</option>
                        <?php 
                        }else{
                        ?>
                            <option value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
