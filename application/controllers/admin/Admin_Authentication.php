<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Authentication extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
	}

	public function log_in()
	{
		if($this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/dashboard');
		}
		else {
			$footer = $this->load->view('admin/template/footer.php', NULL, TRUE);
			$this->load->view('admin/login', array('footer' => $footer));
		}
	}

	public function generate_admin()
	{
		$pass = password_hash('admin', PASSWORD_DEFAULT);
		$this->db->insert('admin', array('email' => 'admin@admin.com', 'password' => $pass));
	}

	public function do_log_in()
	{
		if($this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/dashboard');
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$admin = $this->db->select('*')->from('admin')->where(array('email' => $email))->get()->result_array();
			if(count($admin) == 0)
			{
				$this->session->set_flashdata('login_failed', 'true');
				$this->session->set_flashdata('fail_msg', 'Email is not existed');
			}
			else
			{
				if(password_verify($password, $admin[0]['password']))
				{
					$this->session->set_userdata(IS_LOGGED_IN, true);
					$this->session->set_userdata(USER_INFO, $admin[0]);
					$this->session->set_userdata(IS_ADMIN, true);
				}
				else
				{
					$this->session->set_flashdata('login_failed', 'true');
					$this->session->set_flashdata('fail_msg', 'Password is wrong');
				}
			}

			redirect('admin/login');
		}
	}

	public function register()
	{
		$this->load->view('admin/register');
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

	public function do_logout()
	{
		$this->session->set_userdata(IS_LOGGED_IN,false);
		$this->session->set_userdata(USER_INFO, null);
		
		redirect('admin/login');
	}
}
