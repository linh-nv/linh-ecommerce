<div class="container">
    <h1>Login admin page</h1>
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
    <form action="<?php echo base_url('login-user')?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php echo form_error('password'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>