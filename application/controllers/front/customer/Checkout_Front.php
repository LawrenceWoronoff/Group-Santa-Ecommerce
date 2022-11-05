<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_Front extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('store');
		}
		$this->load->model('Groups');
		$this->load->model('Users');
		$this->load->model('Group_members');
		$this->load->model('Orders');
		$this->load->model('Product');
	}

	public function index()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$cart_data = $this->session->userdata(USER_SESSION_CART_KEY);
		if(!$cart_data)
		{
			$this->session->set_userdata(USER_SESSION_CART_KEY, []);
			$cart_data = [];
		}
		$total_price = 0;
		for($i = 0 ; $i< count($cart_data); $i++)
		{
			$total_price += $cart_data[$i]['price'] * $cart_data[$i]['count'];
		}
		$this->load->view('front/front_checkout', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 
												'view_footer' => $front_store_footer,
												'cart_data' => $cart_data,
												'total_price' => $total_price));
	}

	public function group_check_out()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
		
		$cart_data = $this->session->userdata(USER_SESSION_CART_KEY);
		if(!$cart_data)
		{
			$this->session->set_userdata(USER_SESSION_CART_KEY, []);
			$cart_data = [];
		}
		$total_price = 0;
		for($i = 0 ; $i< count($cart_data); $i++)
		{
			$total_price += $cart_data[$i]['price'] * $cart_data[$i]['count'];
		}

		$this->load->view('front/group/front_group_checkout_user', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 
												'view_footer' => $front_store_footer,
												'cart_data' => $cart_data,
												'total_price' => $total_price));
	}

	public function do_group_check_out()
	{
		$me = $this->session->userdata(USER_INFO);
		if($me == null) {
			redirect('user/login');
		}

		$user_group_code = $this->input->post("user_group_code");
		$card_number = $this->input->post('card_number');
		$card_cvc = $this->input->post('card_cvc');
		$exp_year = $this->input->post('exp_year');
		$exp_month = $this->input->post('exp_month');

		
		$group = $this->Groups->get(array('group_code' => $user_group_code));
		if(count($group) == 0 )
		{
			$this->session->set_flashdata(CHECKOUT_FAIL, 'true');
			$this->session->set_flashdata(CHECKOUT_FAIL_MSG, 'There\'s no group related to the code you entered.');
			redirect('user/group_check_out');
		}

		$group = $group[0];
		if($group['is_active'] == '0')
		{
			$this->session->set_flashdata(CHECKOUT_FAIL, 'true');
			$this->session->set_flashdata(CHECKOUT_FAIL_MSG, 'There\'s no group related to the code you entered.');
			redirect('user/group_check_out');
		}
		
		$group_memeber_info = $this->Group_members->get(array('group_id' => $group['id'], 'user_id' => $me['id']));
		print_r($group_memeber_info);
		$cart_data = $this->session->userdata(USER_SESSION_CART_KEY);
		$total_price = 0.0;
		for($i = 0 ; $i < count($cart_data); $i++)
		{
			$total_price += doubleval($cart_data[$i]['price']) * $cart_data[$i]['count'];
		}

		// 3. make order with checkout status = 0
		//todo => apply the coupon price here => how much?
		$order_id = $this->Orders->insertGroupOrder($me['id'], $total_price, $group, $group_memeber_info[0]['id'], $me['first_name'], $me['last_name']);

		// 4. make order detail information with cart data
		for($i = 0 ; $i < count($cart_data); $i++)
		{
			//todo => apply the coupon price here => how much?
			$this->Orders->insertOrderDetail($order_id, $cart_data[$i]['id'], $cart_data[$i]['price'], $cart_data[$i]['count']);
		}

		$this->session->set_userdata(USER_SESSION_CART_KEY, []);
		$this->session->set_userdata(CURRENT_CHECKOUT_ORDER_ID, $order_id);
		redirect('user/check_out_complete');
	}

	public function do_personal_check_out()
	{
		$full_name = $this->input->post('full_name');
		$full_address = $this->input->post('full_address');
		$zipcode = $this->input->post('zipcode');
		$city = $this->input->post('city');
		$country = $this->input->post('country');

		$card_number = $this->input->post('card_number');
		$exp_month  =$this->input->post('exp_month');
		$exp_year = $this->input->post('exp_year');
		$card_cvc = $this->input->post('card_cvc');
		$me = $this->session->userdata(USER_INFO);

		$this->Users->update(array('id' => $me['id']), array('addr' => $full_address, 
															'zip' => $zipcode, 
															'city' => $city, 
															'country' => $country));
		$user_info = $this->Users->get(array('id' => $me['id']));
		$this->session->set_userdata(USER_INFO, $user_info[0]);

		$cart_data = $this->session->userdata(USER_SESSION_CART_KEY);
		$total_price = 0.0;
		for($i = 0 ; $i < count($cart_data); $i++)
		{
			$total_price += doubleval($cart_data[$i]['price']) * $cart_data[$i]['count'];
		}

		//todo checkout by user card here
		$insert_order_id = $this->Orders->insertPersonalOrder($me['id'], $total_price, $full_name, $full_address, $zipcode, $city, $country);

		for($i = 0 ; $i < count($cart_data); $i++)
		{
			$this->Orders->insertOrderDetail($insert_order_id, $cart_data[$i]['id'], $cart_data[$i]['price'], $cart_data[$i]['count']);
		}
		$this->session->set_userdata(CURRENT_CHECKOUT_ORDER_ID, $insert_order_id);
		redirect('user/check_out_complete');
		// $this->session->set_flashdata(CHECKOUT_FAIL, true);
		// $this->session->set_flashdata(CHECKOUT_FAIL_MSG, "Check out failed. Try again");
		// redirect('user/check_out');
	}

	public function do_group_checkout_by_leader($group_id)
	{
		$this->Orders->update(array('is_group_order' => '1', 'group_id' => $group_id), array('checkout_status' => '1'));
		redirect('user/group/view_group_detail/'.$group_id);
	}

	public function check_complete()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		if(!$this->session->userdata(CURRENT_CHECKOUT_ORDER_ID))
		{
			redirect('user/check_out');
		}
		else {
			$order_detail = $this->Orders->get(array('id' => $this->session->userdata(CURRENT_CHECKOUT_ORDER_ID)));
			if(count($order_detail) > 0)
			{
				$this->Orders->update(array('id' => $this->session->userdata(CURRENT_CHECKOUT_ORDER_ID)), array('payout_status' => '1'));
				$this->session->set_userdata(CURRENT_CHECKOUT_ORDER_ID, null);
				$this->session->set_userdata(USER_SESSION_CART_KEY, array());
				$this->load->view('front/front_checkout_complete', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 'view_footer' => $front_store_footer));
			}
			else {
				redirect('user/check_out');
			}
		}
	}

	public function order_history()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
		$me = $this->session->userdata(USER_INFO);
		$orders = $this->Orders->get(array('user_id' => $me['id']));
		for($i = 0 ; $i < count($orders); $i++)
		{
			$details = $this->Orders->get_details(array('order_id' => $orders[$i]['id']));
			$total = 0;
			for($j = 0 ; $j < count($details); $j++)
			{
				$total += $details[$j]['product_price'] * $details[$j]['product_count'];
			}

			$orders[$i]['items_count'] = count($details);
			$orders[$i]['total_price'] = $total;
		}

		$this->load->view('front/my_profile/front_order_history', array('view_header' => $front_store_header, 
												'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 
												'view_footer' => $front_store_footer,
												'orders' => $orders));
	}

	public function order_detail($order_id)
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$order_detail = $this->Orders->get_details(array('order_id' => $order_id));
		for($i = 0; $i < count($order_detail); $i++)
		{
			$product_info = $this->Product->get(array('id' => $order_detail[$i]['product_id']));
			$order_detail[$i]['product_name'] = $product_info[0]['name'];
			$order_detail[$i]['product_image'] = $product_info[0]['img'];
		}

		$this->load->view('front/my_profile/front_order_detail', 
							array('view_header' => $front_store_header, 
									'top_header' => $front_store_top_header, 
									'top_menu' => $front_store_top_menu, 
									'view_footer' => $front_store_footer,
									'orders' => $order_detail));
	}

	
}