<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders');
		$this->load->model('Users');
		$this->load->model('Product');
		$this->load->model('Category');
		$this->load->model('Groups');
		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/login');
		}

		if(!$this->session->userdata(IS_ADMIN))
		{
			redirect('store');
		}
	}
	
	public function index()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);

		$orders = $this->Orders->get();
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

			$user_info = $this->Users->get(array('id' => $orders[$i]['user_id']));
			$orders[$i]['user_email'] = '';
			
			if(count($user_info) > 0) {
				$orders[$i]['user_email'] = $user_info[0]['email'];
			}
			$orders[$i]['group_code'] = '';
			if($orders[$i]['is_group_order'] == 1)
			{
				$group_info = $this->Groups->get(array('id' => $orders[$i]['group_id']));
				if(count($group_info) > 0)
					$orders[$i]['group_code'] = $group_info[0]['group_code'];
			}
		}

		$this->load->view('admin/shop/orders', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'order_list' => $orders));
	}

	public function detail($order_id)
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);

		$orders = $this->Orders->get(array('uniq_id' => $order_id));
		if(count($orders) > 0)
		{
			$user_info = $this->Users->get(array('id' => $orders[0]['user_id']));
			$orders[0]['user_name'] = 'Unknown User';
			if(count($user_info) > 0) {
				$orders[0]['user_name'] = $user_info[0]['first_name'].' '.$user_info[0]['last_name'];
			}

			$order_history = $this->Orders->get_details(array('order_id' => $orders[0]['id']));
			for($i = 0 ; $i < count($order_history); $i++)
			{
				$product_info = $this->Product->get(array('id' => $order_history[$i]['product_id']));
				$order_history[$i]['product_name'] = 'Deleted Product';
				$order_history[$i]['product_img'] = '';
				$order_history[$i]['total_price'] = '0.00';
				$order_history[$i]['category_name'] = 'Unknown';
				
				if(count($product_info) > 0)
				{
					$order_history[$i]['product_name'] = $product_info[0]['name'];
					$order_history[$i]['product_img'] = $product_info[0]['img'];
					$order_history[$i]['total_price'] = $order_history[$i]['product_count'] * $order_history[$i]['product_price'];
					$order_history[$i]['category_name'] = $product_info[0]['category_name'];
				}

			}

			$this->load->view('admin/shop/order_detail', 
							array('css_php' => $css_php, 
									'js_php' => $js_php,
									'header_php' => $header_php,
									'sidebar_php' => $siderbar_php,
									'order_list' => $order_history,
									'order_main' => $orders[0]));
		}
		else
		{
			redirect('admin/shop/orders');
		}
	}
}
