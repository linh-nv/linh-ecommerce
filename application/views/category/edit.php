
<div class="card">
        <div class="card-header">
            Edit category
            <br>
            <a href="<?php echo base_url('category/create') ?>" class="btn btn-success col-2">Add category</a>
            <a href="<?php echo base_url('category/list') ?>" class="btn btn-success col-2">List category</a>
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
            <form action="<?php echo base_url('category/update/'.$category->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="<?php echo $category->title ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class ="text text-danger">'.form_error('title').'</span>' ; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $category->description ?>" id="exampleInputPassword1">
                    <?php echo '<span class ="text text-danger">'.form_error('description').'</span>' ; ?>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php 
                        if($category->status == 1){
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
