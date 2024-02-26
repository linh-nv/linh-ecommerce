<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('IndexModel');
        $this->load->library('cart');
        $this->data['allproduct'] = $this->IndexModel->getAllProduct();
        $this->data['category'] = $this->IndexModel->getCategoryHome();
        $this->data['brand'] = $this->IndexModel->getBrandHome();
    }
    public function index(){
        
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/template/slider');
        $this->load->view('pages/home',$this->data);
        $this->load->view('pages/template/footer');
    }
    public function category($id){
        $this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
        $this->data['category_title'] = $this->IndexModel->getCategoryTitle($id);
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/category',$this->data);
        $this->load->view('pages/template/footer');
    }
    public function categoryAll(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/category');
        $this->load->view('pages/template/footer');
    }
    public function brand($id){
        $this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
        $this->data['brand_title'] = $this->IndexModel->getBrandTitle($id);
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/brand');
        $this->load->view('pages/template/footer');
    }
    public function brandAll(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/brand');
        $this->load->view('pages/template/footer');
    }
    public function product($id){
        $this->data['product_details'] = $this->IndexModel->getProductDetails($id);
        $this->data['product_title'] = $this->IndexModel->getProductTitle($id); 

        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/product_details',$this->data);
        $this->load->view('pages/template/footer');
    }
    public function cart($customer_id){
        if ($this->session->userdata('LoggedInCustomer')) {
            $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
            $customerId = $loggedInCustomer['id'];
            $this->data['cart_details'] = $this->IndexModel->getCartDetails($customerId);
        }
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/cart');
        $this->load->view('pages/template/footer');
    }
    
    
    // public function add_to_cart(){
    //     if($this->session->userdata('LoggedInCustomer')&& $this->cart->contents()){
    //         $product_id = $this->input->post('product_id');
    //         $quantity = $this->input->post('quantity');
    //         $this->data['product_details'] = $this->IndexModel->getProductDetails($product_id);

    //         foreach($this->data['product_details'] as $key => $pro){
    //             $cart = array(
    //                 'id'        => $pro->id,
    //                 'qty'       => $quantity,
    //                 'price'     => $pro->price,
    //                 'name'      => $pro->title,
    //                 'options'   => array('image' => $pro->image)
    //             );
    //             $this->cart->insert($cart);
    //             redirect(base_url().'gio-hang','refresh');
    //         }
    //     }else{
    //         redirect(base_url().'dang-nhap');
    //     }
    // }
    public function checkout(){
        if($this->session->userdata('LoggedInCustomer')){
            $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
            $customerId = $loggedInCustomer['id'];
            $this->data['customer_details'] = $this->IndexModel->getCustomerDetails($customerId);
            $this->data['cart_details'] = $this->IndexModel->getCartDetails($customerId);

            $this->load->view('pages/template/header',$this->data);
            $this->load->view('pages/checkout',$this->data);
            $this->load->view('pages/template/footer');
        }
    }

    public function delete_all_cart($customer_id)
    {
        $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
        $this->load->model('IndexModel');
        $this->IndexModel->deleteAllCart($customer_id);
        redirect(base_url().'gio-hang/'.$loggedInCustomer['id'],'refresh');
    }

    public function delete_item($product_id){
        $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
        $this->load->model('IndexModel');
        $this->IndexModel->deleteItemCart($product_id);
        redirect(base_url().'gio-hang/'.$loggedInCustomer['id'],'refresh');
    }
    public function thank()
    {
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/thank');
        $this->load->view('pages/template/footer');
    }
    public function login(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/login');
        $this->load->view('pages/template/footer');
    }
    public function register(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/register');
        $this->load->view('pages/template/footer');
    }
    public function login_customer(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'You must provide a %s']);
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLoginCustomer($email,$password);
			if(count($result)>0){
				$session_array = [
					'id' => $result[0] ->id,
					'username' => $result[0] ->name,
					'email' => $result[0] ->email,
				];
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				$this->session->set_flashdata('success','Login successfully');
				redirect(base_url(''));

			}else{
				$this->session->set_flashdata('error','Login false');
				redirect(base_url('dang-nhap'));
			}
		}
		else{
			$this->login();
		}
	}
    public function customer_infor($id){
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if ($this->session->userdata('LoggedInCustomer')) {
            $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
            $customerId = $loggedInCustomer['id'];

            // Kiểm tra xem `$customerId` khớp với `$id` được truyền qua URL
            if ($customerId == $id) {
                // Lấy thông tin chi tiết của khách hàng
                $this->data['customer_details'] = $this->IndexModel->getCustomerDetails($id);

                $this->load->view('pages/template/header', $this->data);
                $this->load->view('pages/customer_infor');
                $this->load->view('pages/template/footer');
            } else {
                redirect(base_url('dang-xuat'));
            }
        } else {
            // Redirect hoặc xử lý khi người dùng chưa đăng nhập
            redirect(base_url('dang-nhap'));

        }
	}
    public function dang_ky(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'You must provide a %s']);
        $this->form_validation->set_rules('phone', 'phone', 'trim|required',['required'=>'You must provide a %s']);
		$this->form_validation->set_rules('name', 'name', 'trim|required',['required'=>'You must provide a %s']);
        $this->form_validation->set_rules('adress', 'adress', 'trim|required',['required'=>'You must provide a %s']);
        $this->form_validation->set_rules('confirm-password', 'confirm-password', 'trim|required',['required'=>'You must provide a %s']);
        
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
            $phone = $this->input->post('phone');
            $name = $this->input->post('name');
            $adress = $this->input->post('adress');
            $data = array(
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'name' => $name,
                'adress' => $adress
            );
			$this->load->model('LoginModel');
			$result = $this->LoginModel->newCustomer($data);
			if($result){
				$session_array = [
					'username' => $name,
					'email' => $email,
				];
				$this->session->set_flashdata('success','Login successfully');
				redirect(base_url(''));
			}else{
				$this->session->set_flashdata('error','Login false');
				redirect(base_url('dang-nhap'));
			}
		}
		else{
			$this->register();
		}
	}
    public function dang_xuat(){
        $this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success','Logout successfully');
        redirect(base_url('dang-nhap'));
    }
    public function confirm_checkout(){

        $this->form_validation->set_rules('adress', 'adress', 'trim|required',['required'=>'You must provide a %s']);

        if($this->form_validation->run() == TRUE){
            $email = $this->input->post('email');
			$shipping_method = $this->input->post('shipping_method');
            $phone = $this->input->post('phone');
            $name = $this->input->post('name');
            $adress = $this->input->post('adress');
            $data = array(
                'email' => $email,
                'method' => $shipping_method,
                'phone' => $phone,
                'name' => $name,
                'adress' => $adress
            );
            $this->load->model('LoginModel');

			$result = $this->LoginModel->newShipping($data);
			if($result){
				$order_code = rand(00,9999);
                $data_order = [
                    'order_code' => $order_code,
                    'ship_id' => $result,
                    'status' => 1
                ];
                // echo $order_code ."\n";
                // echo $result."\n";

			    $this->LoginModel->insert_order($data_order);

                $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
                $cart = $this->IndexModel->getCartDetails($loggedInCustomer['id']);
                foreach($cart as $items){
                    $data_order_details = [
                        'order_code' => $order_code,
                        'product_id' => $items->product_id,
                        'quantity' => $items->product_quantity
                    ];
                    // echo $order_code."\n";
                    // echo $items->product_id."\n";
                    // echo $items->product_quantity."\n";

			        $this->LoginModel->insert_order_details($data_order_details);
                    
                    $this->IndexModel->updateQuantityProduct($items->product_id, $items->product_quantity);
                }
                $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
                $this->load->model('IndexModel');
                //xoá tất cả mặt hàng trong giỏ hàng
                
                $this->IndexModel->deleteAllCart($loggedInCustomer['id']);
                redirect(base_url('thank'));

			}else{
				$this->session->set_flashdata('error','False');
				redirect(base_url('dang-nhap'));
			}
        }else{
            $this->checkout();
        }
    }
    public function add_to_cart(){
        if ($this->session->userdata('LoggedInCustomer')) {
            $loggedInCustomer = $this->session->userdata('LoggedInCustomer');
            $customerId = $loggedInCustomer['id'];
            $product_id = $this->input->post('product_id');
            $quantity = $this->input->post('quantity');
            $title = $this->input->post('title');
            $image = $this->input->post('image');
            $price = $this->input->post('price');
    
                $data = [
                    'customer_id' => $customerId,
                    'product_id' => $product_id,
                    'product_title' => $title,
                    'product_image' => $image,
                    'product_quantity' => $quantity,
                    'product_price' => $price
                ];
                $this->load->model('IndexModel');
                $this->IndexModel->insertCart($customerId, $data);
                $this->session->set_flashdata('success', 'Update success address');
                redirect(base_url('gio-hang/' . $customerId));
        } else {
            // Xử lý khi người dùng chưa đăng nhập
            redirect(base_url('dang-nhap'));
        }
    }
    public function update_adress($id){
        $this->load->model('IndexModel');
        $customer_details = $this->IndexModel->getCustomerDetails($id);
        $this->form_validation->set_rules('adress', 'adress', 'trim|required',['required'=>'You must provide a %s']);
        if($this->input->post('adress') != ''){
            if($this->input->post('adress') != $customer_details[0]->adress){

                $data = [
                    'adress' => $this->input->post('adress')
                ];
                $this->IndexModel->updateCustomer($id,$data);
                $this->session->set_flashdata('success', 'Update success adress');
                redirect(base_url('thong-tin-nguoi-dung/'.$id));
            }else{
                $this->session->set_flashdata('error', 'Update error you must provide new address');
                redirect(base_url('thong-tin-nguoi-dung/'.$id));
            }
        }else{
            $this->session->set_flashdata('error', 'Update error you must provide address');
            redirect(base_url('thong-tin-nguoi-dung/'.$id));
        }
    }
    public function update_password($id){

        $this->load->model('IndexModel');
        $customer_details = $this->IndexModel->getCustomerDetails($id);
        if($this->input->post('new_password') != '' || $this->input->post('re_password') != ''){

            if(md5($this->input->post('old_password')) === $customer_details[0]->password){
                if($this->input->post('new_password') === $this->input->post('re_password')){
                $data = [
                    'password' => md5($this->input->post('new_password'))
                ];
                
                $this->IndexModel->updateCustomer($id,$data);
                $this->session->set_flashdata('success', 'Update success password');
                redirect(base_url('thong-tin-nguoi-dung/'.$id));
            }else{
                $this->session->set_flashdata('error', 'Update error re-enter a different password with the new password');
                redirect(base_url('thong-tin-nguoi-dung/'.$id));
            }
            }else{
                $this->session->set_flashdata('error', 'Update error enter the wrong old password');
                redirect(base_url('thong-tin-nguoi-dung/'.$id));
            }
        }else{
            $this->session->set_flashdata('error', 'Update error you must provide new password, re-password');
            redirect(base_url('thong-tin-nguoi-dung/'.$id));
        }
    }
    public function tim_kiem(){
        if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
            $keyword = $_GET['keyword'];
        }
        $this->data['product'] = $this->IndexModel->getProductByKeyword($keyword);
        $this->data['category_title'] = $keyword;
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/search',$this->data);
        $this->load->view('pages/template/footer');
    }
    public function forgot_password(){
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/forgot_password',$this->data);
        $this->load->view('pages/template/footer');
    }
    public function forgot_password_post(){

        $this->load->model('IndexModel');
        $customer_details = $this->IndexModel->getCustomerDetailsByEmail($this->input->post('email'));
        if(!empty($customer_details)){
            if($this->input->post('new_password') != '' || $this->input->post('re_password') != ''){
                if($this->input->post('new_password') === $this->input->post('re_password')){
                $data = [
                    'password' => md5($this->input->post('new_password'))
                ];
                
                $this->IndexModel->updateCustomer($customer_details[0]->id,$data);
                $this->session->set_flashdata('success', 'Update success password');
                redirect(base_url('forgot-password'));
                }else{
                    $this->session->set_flashdata('error', 'Update error re-enter a different password with the new password');
                    redirect(base_url('forgot-password'));
                }
            }else{
                $this->session->set_flashdata('error', 'Update error you must provide new password, re-password');
                redirect(base_url('forgot-password'));
            }
        }else{
            $this->session->set_flashdata('error', 'Wrong email');
            redirect(base_url('forgot-password'));
        }
    }
    public function about_Us(){
        // $phone = $this->IndexModel->getCustomerDetailsByPhone();
        $this->load->view('pages/template/header',$this->data);
        $this->load->view('pages/about_us');
        $this->load->view('pages/template/footer');
    }
}