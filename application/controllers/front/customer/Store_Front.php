<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_Front extends CI_Controller {
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
		$trendy_products = $this->Product->get(array('is_deleted' => '0', 'is_trendy' => '1'));
		
		$this->load->view('front/front_store', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 
													'view_footer' => $front_store_footer,
													'products' => $trendy_products));
	}


}
