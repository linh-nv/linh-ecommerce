<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo  $this->session->userdata('LoggedIn')['username'];?></a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?PHP echo base_url('logout') ?>">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url('dashboard') ?>">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?PHP echo base_url('brand/list') ?>">
              <span data-feather="dollar-sign"></span>
              Brand
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?PHP echo base_url('category/list') ?>">
              <span data-feather="shopping-cart"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span data-feather="coffee"><?PHP echo base_url('product/list') ?></span>
              Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?PHP echo base_url('order/list') ?>">
              <span data-feather="bar-chart-2"></span>
              Order
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
