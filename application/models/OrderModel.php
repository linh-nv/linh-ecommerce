<?php 
    class OrderModel extends CI_Model{

        public function selectOrder(){
            $query = $this->db->select('orders.*,shipping.*') 
            ->from('orders')
            ->join('shipping','orders.ship_id = shipping.id')
            ->get();
            return $query->result();
        }
        public function selectOrderDetails($order_code){
            $query = $this->db->select('order_details.quantity as qty,order_details.order_code,order_details.product_id,products.*') 
            ->from('order_details')
            ->join('products','order_details.product_id = products.id')
            ->where('order_details.order_code',$order_code)
            ->get();
            return $query->result();
        }
        public function selectStatusByOrder_Code($order_code){
            $query = $this->db->get_where('orders',['order_code'=>$order_code]);
            return $query->row();
        }
        public function updateStatus($order_code,$data){
            return $this->db->update('orders',$data,['order_code'=>$order_code]);
        }
        public function deleteOrder($order_code){
            return $this->db->delete('orders',['order_code'=>$order_code]);
        }
    }
?>