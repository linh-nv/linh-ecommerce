<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('IndexModel');

        $this->data['allproduct'] = $this->IndexModel->getAllProduct();
        $this->data['category'] = $this->IndexModel->getCategoryHome();
        $this->data['brand'] = $this->IndexModel->getBrandHome();
    }
    public function index(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/template/slider');
        $this->load->view('pages/delivery');
        $this->load->view('pages/template/footer');
    }
}