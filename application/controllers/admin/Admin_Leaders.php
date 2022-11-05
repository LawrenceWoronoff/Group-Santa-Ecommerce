<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Leaders extends CI_Controller {
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
		$this->load->model('Groups');
		$this->load->model('Users');
		$this->load->model('Group_members');

	}
	
	public function index()
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);
		$groups = $this->Groups->get();
		for($i = 0 ; $i < count($groups); $i++)
		{
			$leader_info = $this->Users->get(array('id' => $groups[$i]['leader_user_id']));
			$groups[$i]['leader_user_name'] = 'Unknown';
			$groups[$i]['leader_user_email'] = 'Unknown';
			
			if(count($leader_info) > 0)
			{
				$groups[$i]['leader_user_name'] = $leader_info[0]['first_name'].' '.$leader_info[0]['last_name'];
				$groups[$i]['leader_user_email'] = $leader_info[0]['email'];
			}

			$groups[$i]['member_count'] = count($this->Group_members->getOnlyGroupMemberInfo(array('group_id' => $groups[$i]['id'])));
		}
		
		$this->load->view('admin/user/all_leaders', array('css_php' => $css_php, 
													'js_php' => $js_php,
													'header_php' => $header_php,
													'sidebar_php' => $siderbar_php,
													'leaders' => $groups));
	}

	public function detail_group($group_id)
	{
		$js_php = $this->load->view('admin/template/js', array('additional_js' => [ "assets/admin/node_modules/datatables.net/js/jquery.dataTables.js",
																					"assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js",
																					"assets/admin/js/custom/data-table.js"]), TRUE);
		$css_php = $this->load->view('admin/template/css', array('additional_css' => ["assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"]), TRUE);
		$header_php = $this->load->view('admin/template/header', null, TRUE);
		$siderbar_php = $this->load->view('admin/template/sidebar', null, TRUE);

		$group_info = $this->Groups->get(array('id' => $group_id));
		
			
		if(count($group_info) > 0)
		{
			$group_members_info = $this->Group_members->get(array('group_id' => $group_id), true);
			for($i = 0 ; $i < count($group_members_info); $i++)
			{
				$whom_info = $this->Users->get(array('id' => $group_members_info[$i]['to_whom']));
				$group_members_info[$i]['whom_name'] = $whom_info[0]['first_name'].' '.$whom_info[0]['last_name'];
			}

			$this->load->view('admin/user/group_detail', array('css_php' => $css_php, 
												'js_php' => $js_php,
												'header_php' => $header_php,
												'sidebar_php' => $siderbar_php,
												'group_info' => $group_info[0],
												'group_member_info' => $group_members_info));
		}
		else
		{
			redirect('admin/user/leaders');
		}
	}
}
