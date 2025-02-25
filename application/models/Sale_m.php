<?php
class Sale_m extends CI_Model {

	function invoice_no() { 
        $query = $this->db->query("SELECT MAX(MID(invoice,9,4)) AS invoice_no 
		FROM t_sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')");
        if($query->num_rows() > 0) {
            $r = $query->row();
			$n = ((int)$r->invoice_no) + 1;
			$no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "YP".date('ymd').$no;
        return $invoice;
    }

	public function get_cart($cart_id = null, $item_id = null)
	{
		$this->db->select('*, p_item.name as item_name, t_sale_cart.price as cart_price');
		$this->db->from('t_sale_cart');
		$this->db->join('p_item', 't_sale_cart.item_id = p_item.item_id');
		$this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
		if($cart_id != null) {
			$this->db->where('card_id', $cart_id);
		}
		if($item_id != null) {
			$this->db->where('t_sale_cart.item_id', $item_id);
		}
		$this->db->where('user_id', $this->session->userdata('userid'));
		$query = $this->db->get();
		return $query;
	}

	public function add_cart($data)
	{
		$query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM t_sale_cart");
        if($query->num_rows() > 0) {
            $r = $query->row();
			$cart_no = ((int)$r->cart_no) + 1;
        } else {
            $cart_no = "1";
		}
		
		$params = array(
			'cart_id' => $cart_no,
			'item_id' => $data['item_id'],
			'price' => $data['price'],
			'discount_item' => 0,
			'qty' => $data['qty'],
			'total' => $data['price'] * $data['qty'],
			'user_id' => $this->session->userdata('userid')
		);
        $this->db->insert('t_sale_cart', $params);
	}

	public function update_cart_qty($data)
	{
		$sql = "UPDATE t_sale_cart 
			SET price = '$data[price]', 
			qty = qty + '$data[qty]', 
			total = '$data[price]' * qty 
			WHERE item_id = '$data[item_id]'";
		$this->db->query($sql);
	}

	public function edit_cart($data)
	{
        $params = array(
			'price' => $data['price'],
			'qty' => $data['qty'],
			'discount_item' => $data['discount'],
			'total' => $data['total'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('cart_id', $data['cart_id']);
        $this->db->update('t_sale_cart', $params);
	}

	public function del_cart($cart_id = null, $user_id = null)
	{
		if($cart_id != null) {
			$this->db->where('cart_id', $cart_id);
		}
		if($user_id != null) {
			$this->db->where('user_id', $user_id);
		}
		$this->db->delete('t_sale_cart');
	}

	public function add_sale($data) {
		$params = array(
			'invoice' => $this->invoice_no(),
			'customer_id' => $data['customer_id'] == "" ? null : $data['customer_id'],
			'total_price' => $data['subtotal'],
			'discount' => $data['discount'],
			'final_price' => $data['grandtotal'],
			'cash' => $data['cash'],
			'change' => $data['change'],
			'note' => $data['note'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
		$this->db->insert('t_sale', $params);
		return $this->db->insert_id();
	}
	public function add_sale_detail($params)
	{
        $this->db->insert_batch('t_sale_detail', $params);
	}


	public function get_sale($id = null)
	{
		$this->db->select('*, customer.name as customer_name, user.username as user_name, t_sale.created as sale_created');
		$this->db->from('t_sale');
		$this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 't_sale.user_id = user.user_id');
		if($id != null) {
			$this->db->where('sale_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get_sale_detail($sale_id = null)
	{
		$this->db->from('t_sale_detail');
		$this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id');		
		if($sale_id != null) {
			$this->db->where('t_sale_detail.sale_id', $sale_id);
		}
		$query = $this->db->get();
		return $query;
	}

	function get_sale_pagination($limit = null, $start = null,$periode_awal = null, $periode_akhir = null, $customer = null, $invoice = null) {
		$post = $this->session->userdata('search');
		$this->db->select('*, customer.name as customer_name, user.username as user_name, t_sale.created as sale_created');
		$this->db->from('t_sale');
		$this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 't_sale.user_id = user.user_id');

		if(!empty($post['date1']) && !empty($post['date2'])) {
			$this->db->where("t_sale.date BETWEEN '".db_date($post['date1'])."' AND '".db_date($post['date2'])."'");
		} 

/* */
		if(!empty($post['customer'])) {
			if($post['customer'] == 'null') {
				$this->db->where("t_sale.customer_id IS NULL");
			} else {
				$this->db->where("t_sale.customer_id", $post['customer']);
			}
		}	
/*
		if(!empty($customer)) {
			if($customer == 'null') {
				$this->db->where("t_sale.customer_id IS NULL");
			} else {
				$this->db->where("t_sale.customer_id", $customer);
			}
		}	*/

		if(!empty($post['invoice'])) {
			$this->db->like("invoice", $post['invoice']);
		} 
/*
		if(!empty($invoice)) {
			$this->db->like("invoice", $invoice);
		}*/

		//JIKA FILTERNYA KOSONG TETAPI DATANYA JADI TIDAK KELUAR SEMUA
		if(empty($periode_awal) && empty($periode_akhir) && empty($invoice) && empty($customer)) {
			$this->db->limit(0, 0);
			$query = $this->db->get();
			return $query;
		}else{
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			return $query;
		} 

	/*	$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;*/

	}

	public function get_report_sale($periode_awal = null, $periode_akhir = null, $customer = null, $invoice = null)
	{
		$this->db->select('*, customer.name as customer_name, user.username as user_name, t_sale.created as sale_created');
		$this->db->from('t_sale');
		$this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
		$this->db->join('user', 't_sale.user_id = user.user_id');
		$this->db->where('date >=', $periode_awal);
		$this->db->where('date <=', $periode_akhir);
		$this->db->where('customer_id LIKE', $customer);
		$this->db->where('invoice LIKE', $invoice);

		$query = $this->db->get();
		return $query;
	} 

	public function del_sale($id)
	{
		$this->db->where('sale_id', $id);
        $this->db->delete('t_sale');
	}

}