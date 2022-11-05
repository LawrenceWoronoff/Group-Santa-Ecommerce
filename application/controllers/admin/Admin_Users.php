<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Users extends CI_Controller {
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
		$this->load->model('Users');
	}

	public function index()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$users = $this->Users->get();
		$this->load->view('admin/user/all_users', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'users' => $users));
	}
}
