<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_List extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->model('Category');
	}

	public function index()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$product_search_arr['is_deleted'] = '0';
		$price_min = $this->session->flashdata(SESSION_FLASH_SEARCH_PRODUCT_MIN_PRICE);
		if($price_min)
		{
			$product_search_arr['price>='] = $price_min;
		}
		$price_max = $this->session->flashdata(SESSION_FLASH_SEARCH_PRODUCT_MAX_PRICE);
		if($price_max)
		{
			$product_search_arr['price<='] = $price_max;
		}

		$products = $this->Product->get($product_search_arr);
		$category = $this->Category->getCategoryDetailInformation();
		$this->load->view('front/front_store_products', array('view_header' => $front_store_header, 
													'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 
													'view_footer' => $front_store_footer,
													'products' => $products,
													'category' => $category,
													'search_price_min' => $price_min,
													'search_price_max' => $price_max));
	}

	public function do_search_product()
	{
		$price_min = $this->input->post('price_min');
		$price_max = $this->input->post('price_max');		
		$this->session->set_flashdata(SESSION_FLASH_SEARCH_PRODUCT_MIN_PRICE, $price_min);
		$this->session->set_flashdata(SESSION_FLASH_SEARCH_PRODUCT_MAX_PRICE, $price_max);

		redirect('store/products');
	}
}
