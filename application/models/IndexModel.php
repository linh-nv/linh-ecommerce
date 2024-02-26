<?php 
    class IndexModel extends CI_Model{
        public function getCategoryHome(){
            $query = $this->db->get_where('categories',['status'=>1]);
            return $query->result();
        }
        public function getBrandHome(){
            $query = $this->db->get_where('brands',['status'=>1]);
            return $query->result();
        }
        public function getAllProduct(){
            $query = $this->db->get_where('products',['status'=>1]);
            return $query->result();
        }
        public function getCategoryProduct($id){
            $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu') 
            ->from('categories')
            ->join('products','products.category_id = categories.id')
            ->join('brands','brands.id = products.brand_id')
            ->where('products.category_id',$id)
            ->get();
            return $query->result();
        }
        public function getBrandProduct($id){
            $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu') 
            ->from('categories')
            ->join('products','products.category_id = categories.id')
            ->join('brands','brands.id = products.brand_id')
            ->where('products.brand_id',$id)
            ->get();
            return $query->result();
        }
        public function getCategoryTitle($id){
            $this->db->select('categories.*');
            $this->db->from('categories');
            $this->db->limit(1);
            $this->db->where('	categories.id',$id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->title;
        }
        public function getBrandTitle($id){
            $this->db->select('brands.*');
            $this->db->from('brands');
            $this->db->limit(1);
            $this->db->where('brands.id',$id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->title;
        }
        public function getProductTitle($id){
            $this->db->select('products.*');
            $this->db->from('products');
            $this->db->limit(1);
            $this->db->where('	products.id',$id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->title;
        }
        public function getProductDetails($id){
            $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu') 
            ->from('categories')
            ->join('products','products.category_id = categories.id')
            ->join('brands','brands.id = products.brand_id')
            ->where('products.id',$id)
            ->get();
            return $query->result();
        }
        public function getCustomerDetails($id){
            $query = $this->db->get_where('customers',['id'=>$id]);
            return $query->result();
        }
        
        public function getCustomerDetailsByEmail($email){
            $query = $this->db->get_where('customers',['email'=>$email]);
            return $query->result();
        }
        public function updateCustomer($id,$data){
            return $this->db->update('customers',$data,['id'=>$id]);
        }
        public function getCartDetails($customer_id){
            $query = $this->db->get_where('carts',['customer_id'=>$customer_id]);
            return $query->result();
        }
        public function insertCart($customerId, $data)
        {
            // Thêm thông tin sản phẩm vào giỏ hàng
            $cartData = array(
                'customer_id' => $customerId,
                'product_id' => $data['product_id'],
                'product_title' => $data['product_title'],
                'product_image' => $data['product_image'],
                'product_quantity' => $data['product_quantity'],
                'product_price' => $data['product_price']
            );
            return $this->db->insert('carts', $cartData); 
        }
        public function deleteAllCart($customer_id)
        {
            $this->db->where('customer_id', $customer_id);
            $this->db->delete('carts');
        }
        public function deleteItemCart($product_id)
        {
            $this->db->where('product_id', $product_id);
            $this->db->delete('carts');
        }
        public function updateQuantityProduct($product_id, $quantity)
        {
            // Lấy số lượng gốc của mặt hàng
            $this->db->select('quantity');
            $this->db->from('products');
            $this->db->where('id', $product_id);
            $query = $this->db->get();
            $result = $query->row();

            if ($result) {
                $original_quantity = $result->quantity;

                // Tính toán số lượng mới
                $new_quantity = $original_quantity - $quantity;

                // Cập nhật số lượng mới vào CSDL
                $data = ['quantity' => $new_quantity];
                $this->db->where('id', $product_id);
                return $this->db->update('products', $data,['id'=>$product_id]);
            }
        }
        public function getProductByKeyword($keyword) {
            $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu') 
            ->from('categories')
            ->join('products','products.category_id = categories.id')
            ->join('brands','brands.id = products.brand_id')
            ->like('products.title',$keyword)
            ->get();
            return $query->result();
        }
    }
?>