<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/login');
		}

		if(!$this->session->userdata(IS_ADMIN))
		{
			redirect('store');
		}
		$this->load->model('Product');
		$this->load->model('Category');
		$this->load->model('Groups');
		$this->load->model('Orders');
		$this->load->model('Users');
	}
	
	public function index()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => []), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => []), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$products = $this->Product->get();
		$category = $this->Category->getCategoryDetailInformation();
		$groups = $this->Groups->get();
		$users = $this->Users->get();
		$orders = $this->Orders->get_recent();
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
			$orders[$i]['user_name'] = 'Unknown User';
			if(count($user_info) > 0) {
				$orders[$i]['user_name'] = $user_info[0]['first_name'].' '.$user_info[0]['last_name'];
			}
		}

		$this->load->view('admin/dashboard', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'product_count' => count($products),
													'category_count' => count($category),
													'group_count' => count($groups),
													'user_count' => count($users),
													'order_list' => $orders
													));
	}

	public function view_my_profile()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$this->load->view('front/my_profile/front_profile', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 'view_footer' => $front_store_footer));
	}

	public function change_password_profile()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$this->load->view('front/my_profile/front_change_pass', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 'view_footer' => $front_store_footer));
	}
}
