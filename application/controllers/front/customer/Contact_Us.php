<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Us extends CI_Controller {
	public function index()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$this->load->view('front/contact_us', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 'view_footer' => $front_store_footer));
	}
}