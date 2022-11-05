<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_Front extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
	}

	public function index()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
		$this->load->view('front/front_view_cart', array('view_header' => $front_store_header, 
												'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 
												'view_footer' => $front_store_footer));
	}

	public function do_add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$cart_item_arr = $this->session->userdata(USER_SESSION_CART_KEY);
		if($cart_item_arr == null)
			$cart_item_arr = array();
		$product_info = $this->Product->get(array('id' => $product_id, 'is_deleted' => '0'));
		
		if(count($product_info) > 0)
		{
			$cart_index = -1;
			for($i = 0; $i < count($cart_item_arr); $i++) {
				if(intval($cart_item_arr[$i]['id']) == intval($product_info[0]['id'])) {
					$cart_index = $i;
					break;
				}
			}

			
			if($cart_index > -1) {
				$cart_item_arr[$cart_index]['count'] = intval($cart_item_arr[$cart_index]['count']) + 1;
				$this->session->set_userdata(USER_SESSION_CART_KEY, $cart_item_arr);
			}
			else {
				$product_info[0]['count'] = 1;
				array_push($cart_item_arr, $product_info[0]);
				$this->session->set_userdata(USER_SESSION_CART_KEY, $cart_item_arr);
			}
		}

		echo json_encode($cart_item_arr);
	}

	public function do_remove_from_cart()
	{
		$product_id = $this->input->post('product_id');
		$cart_item_arr = $this->session->userdata(USER_SESSION_CART_KEY);
		if($cart_item_arr == null)
			$cart_item_arr = array();
		for($i = 0 ; $i < count($cart_item_arr); $i++)
		{
			if($cart_item_arr[$i]['id'] == $product_id)
			{
				array_splice($cart_item_arr, $i, 1);
			}
		}
		$this->session->set_userdata(USER_SESSION_CART_KEY, $cart_item_arr);
		echo json_encode($cart_item_arr);
	}


	public function clear_cart()
	{
		$this->session->set_userdata(USER_SESSION_CART_KEY,[]);
	}

	public function do_update_from_view()
	{
		$id_arr = $this->input->post('product_id[]');
		$quantity_arr = $this->input->post('product-quantity[]');
		$new_cart_data = array();
		for($i = 0 ; $i < count($id_arr); $i++)
		{
			$product_info = $this->Product->get(array('id' => $id_arr[$i]));
			if(count($product_info) > 0)
			{
				$product_info[0]['count'] = $quantity_arr[$i];
				array_push($new_cart_data, $product_info[0]);
			}
		}
		
		$this->session->set_userdata(USER_SESSION_CART_KEY, $new_cart_data);
		redirect('user/view_cart');
	}


	public function do_remove_from_view($product_id)
	{
		$cart_item_arr = $this->session->userdata(USER_SESSION_CART_KEY);
		if($cart_item_arr == null)
			$cart_item_arr = array();
		for($i = 0 ; $i < count($cart_item_arr); $i++)
		{
			if($cart_item_arr[$i]['id'] == $product_id)
			{
				array_splice($cart_item_arr, $i, 1);
			}
		}
		$this->session->set_userdata(USER_SESSION_CART_KEY, $cart_item_arr);
		redirect('user/view_cart');
	}
}
