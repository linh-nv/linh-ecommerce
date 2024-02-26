<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function checkLogin(){
        if(!$this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }

    }
	public function index()
	{
        $this->checkLogin();
        $this->load->view('test/headertest');
        $this->load->view('test/navtest');
        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

        $this->load->view('category/list',$data);
        $this->load->view('test/footertest');

	}
}