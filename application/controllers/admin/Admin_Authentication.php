<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Authentication extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
	}

	public function reset_password()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => []), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => []), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);

		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/login');
		}
		if(!$this->session->userdata(IS_ADMIN)){
			return;
		}

		$this->load->view('admin/reset_password', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php
													));
	}

	public function do_reset_password()
	{
		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('admin/login');
		}
		if(!$this->session->userdata(IS_ADMIN)){
			return;
		}

		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$confirm_new_password = $this->input->post('confirm_new_password');

		$admin = $this->db->select('*')->from('admin')->where(array('email' => 'admin@admin.com'))->get()->result_array();
		if(!password_verify($old_password, $admin[0]['password'])){
			$this->session->set_flashdata('reset_password_failed', true);
			$this->session->set_flashdata('fail_msg', 'Old password is incorrect.');
			redirect('admin/reset_password');
		}

		if($new_password != $confirm_new_password) {
			$this->session->set_flashdata('reset_password_failed', true);
			$this->session->set_flashdata('fail_msg', 'New confirm password is not matched.');
			redirect('admin/reset_password');
		}

		$pass = password_hash($new_password, PASSWORD_DEFAULT);
		$this->db->where('email', 'admin@admin.com');
		$this->db->update('admin', array('password' => $pass));

		$this->session->set_flashdata('reset_password_failed', false);
		$this->session->set_flashdata('reset_password_success', true);
		$this->session->set_flashdata('success_msg', 'The admin password is successfully reset.');
		redirect('admin/reset_password');

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
