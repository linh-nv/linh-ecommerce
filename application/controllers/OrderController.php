<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

    public function checkLogin(){
        if(!$this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }

    }
	public function list()
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order'] = $this->OrderModel->selectOrder();

        $this->load->view('order/list',$data);
        $this->load->view('admin_template/footer');

	}
    public function view($order_code)
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);
        $data['order'] = $this->OrderModel->selectOrder();

        $this->load->view('order/view',$data);
        $this->load->view('admin_template/footer');

	}
    public function updateStatus($order_code){
        $this->load->model('OrderModel');
        $order = $this->OrderModel->selectStatusByOrder_Code($order_code);
        $status = $order->status;
        $newStatus = $status + 1; // Tăng giá trị hiện tại lên 1
    
        $data = [
            'status' => $newStatus
        ];
    
        $this->OrderModel->updateStatus($order_code, $data); // Cập nhật giá trị mới vào cơ sở dữ liệu
        redirect(base_url('order/list'));
    }
    public function updateStatus_Cancel($order_code){
        $this->load->model('OrderModel');
        $order = $this->OrderModel->selectStatusByOrder_Code($order_code);
        $status = $order->status;
        $newStatus = 0;
    
        $data = [
            'status' => $newStatus
        ];
    
        $this->OrderModel->updateStatus($order_code, $data); // Cập nhật giá trị mới vào cơ sở dữ liệu
        redirect(base_url('order/list'));
    }
    public function delete($order_code){
        $this->load->model('OrderModel');
        $this->OrderModel->deleteOrder($order_code);
        $this->session->set_flashdata('success', 'Delete success order');
        redirect(base_url('order/list'));
    }

}