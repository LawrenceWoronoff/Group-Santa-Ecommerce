<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users');
		$this->load->library('form_validation');
	}

	public function log_in()
	{
		$this->load->view('front/front_login');
	}

	public function do_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('login_fail', true);
			$this->session->set_flashdata('fail_msg', "Entered incorrect data.");
			redirect('user/login');
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$user = $this->Users->get(array('email' => $email));
		
		if(!$user){
			$this->session->set_flashdata('login_fail', true);
			$this->session->set_flashdata('fail_msg', "The email doesn't exist.");
			redirect('user/login');
		}
		if(!password_verify($password, $user[0]['password'])){
			$this->session->set_flashdata('login_fail', true);
			$this->session->set_flashdata('fail_msg', "The password is incorrect.");
			redirect('user/login');
		}
		$this->session->set_userdata(IS_LOGGED_IN, true);
		$this->session->set_userdata(USER_INFO, $user[0]);
		$this->session->set_userdata(IS_ADMIN, false);
		redirect('store');
	}

	public function register()
	{
		$this->load->view('front/front_signup');
	}

	public function do_register()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		//form_validation();
		if(strlen($password) < 8)
		{
			$this->session->set_flashdata('register_fail', 'true');
			$this->session->set_flashdata('fail_msg', 'Password should be 8 characters at least');
			redirect('user/register');	
			return;
		}

		if($password == $confirm_password)
		{
			//check email format
			$existUser = $this->Users->get(array('email' => $email));
			if(count($existUser) > 0)
			{
				$this->session->set_flashdata('register_fail', 'true');
				$this->session->set_flashdata('fail_msg', 'Email is already used');
				redirect('user/register');	
			}
			else {
				$this->Users->insert($first_name, $last_name, $email, $password);
				$user = $this->Users->get(array('email' => $email));
				if(count($user) == 0)
				{
					$this->session->set_flashdata('register_fail', 'true');
					$this->session->set_flashdata('fail_msg', 'Register failed');
					redirect('user/register');	
				}
				else {
					$this->session->set_userdata(IS_LOGGED_IN, true);
					$this->session->set_userdata(USER_INFO, $user[0]);
					$this->session->set_userdata(IS_ADMIN, false);
					redirect('store');
				}
			}
		}
		else {
			$this->session->set_flashdata('register_fail', 'true');
			$this->session->set_flashdata('fail_msg', 'Password is not matched');
			redirect('user/register');
		}
	}

	public function do_logout()
	{
		$this->session->set_userdata(IS_LOGGED_IN, false);
		$this->session->set_userdata(USER_INFO, null);
		$this->session->set_userdata(IS_ADMIN, false);
		redirect('store');
	}

	public function view_my_profile()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
		$user_data = $this->session->userdata(USER_INFO);
		$this->load->view('front/my_profile/front_profile', array('view_header' => $front_store_header, 
																	'top_header' => $front_store_top_header, 
																	'top_menu' => $front_store_top_menu, 
																	'view_footer' => $front_store_footer,
																	'user_data' => $user_data));
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


	public function do_change_password_profile(){

		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');
		$user_data = $this->session->userdata(USER_INFO);

		$session_id = $user_data['id'];
		
		if(strlen($new_password) < 8)
		{
			$this->session->set_flashdata('register_fail', 'true');
			$this->session->set_flashdata('fail_msg', 'Password should be 8 characters at least');
			redirect('user/change_pass');	
			return;
		}
		if($new_password == $confirm_password)
		{
			$this->Users->change_password($session_id, $new_password);	
			$this->session->set_flashdata('change_success', true);
			redirect('user/change_pass');
		}
		$this->session->set_flashdata('register_fail', 'true');
		$this->session->set_flashdata('fail_msg', 'Password is not matched');
		redirect('user/change_pass');
	}
}
