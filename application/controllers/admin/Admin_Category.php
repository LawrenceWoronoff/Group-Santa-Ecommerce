<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category');
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
		$categoris = $this->Category->getCategoryDetailInformation();
		
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$this->load->view('admin/shop/category', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'category' => $categoris));
	}

	public function do_create() {
		$this->Category->insert($this->input->post('category_name'));
		redirect('admin/shop/category');
	}

	public function do_update() {
		$this->Category->update($this->input->post('category_id'), $this->input->post('category_name'));
		redirect('admin/shop/category');
	}

	public function do_delete() {
		$this->Category->delete($this->input->post('category_id_delete'));
		redirect('admin/shop/category');
	}

}
