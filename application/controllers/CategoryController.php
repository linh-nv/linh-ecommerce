<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

    public function checkLogin(){
        if(!$this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }

    }
	public function index()
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

        $this->load->view('category/list',$data);
        $this->load->view('admin_template/footer');

	}
	public function create()
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('category/create');
        $this->load->view('admin_template/footer');

	}
	public function store(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required',['required'=>'You must provide a %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required',['required'=>'You must provide a %s']);
		if($this->form_validation->run() == TRUE){
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                ];
                $this->load->model('CategoryModel');
                $this->CategoryModel->insertCategory($data);
                $this->session->set_flashdata('success', 'Add success category');
                redirect(base_url('category/list')); 
        }else{
            $this->create();
        }
    }
    public function edit($id)
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategoryById($id);

        $this->load->view('category/edit',$data);
        $this->load->view('admin_template/footer');

	}
    public function update($id){
        $this->form_validation->set_rules('title', 'Title', 'trim|required',['required'=>'You must provide a %s']);

		$this->form_validation->set_rules('description', 'Description', 'trim|required',['required'=>'You must provide a %s']);
		if($this->form_validation->run() == TRUE){
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),

                    'status' => $this->input->post('status')
                ];
            $this->load->model('CategoryModel');
            $this->CategoryModel->updateCategory($id,$data);
            $this->session->set_flashdata('success', 'Update success category');
            redirect(base_url('category/list'));
                       
        }else{
            $this->edit($id);
        }
    }
    public function delete($id){
        $this->load->model('CategoryModel');
        $this->CategoryModel->deleteCategory($id);
        $this->session->set_flashdata('success', 'Delete success category');
        redirect(base_url('category/list'));
    }
}