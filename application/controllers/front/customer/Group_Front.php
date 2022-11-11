<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_Front extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata(IS_LOGGED_IN))
		{
			redirect('store');
		}
		$this->load->model('Groups');
		$this->load->model('Users');
		$this->load->model('Group_members');
		
	}
	public function create_group()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);

		$user_data = $this->session->userdata(USER_INFO);
		$this->load->view('front/group/front_group_create', array('view_header' => $front_store_header, 
												'top_header' => $front_store_top_header, 
												'top_menu' => $front_store_top_menu, 
												'view_footer' => $front_store_footer,
												'user_data' => $user_data));
	}

	
	public function do_create()
	{
		//array(2) { [0]=> array(2) { ["group_user_name"]=> string(6) "123123" ["group_user_email"]=> string(6) "123123" } [1]=> array(2) { ["group_user_name"]=> string(6) "456456" ["group_user_email"]=> string(6) "456456" } }
		$member_infos = $this->input->post('group-a');
		$group_leader_mobile = $this->input->post('group_leader_mobile');
		$group_name = $this->input->post('group_name');
		$suggest_user_data = $this->session->userdata(USER_INFO);
		$group_id = $this->Groups->insert($suggest_user_data['id'], 
								$this->input->post('group_name'),
								$this->input->post('group_leader_mobile'),
								$this->input->post('group_budget'), 
								$this->input->post('user_address'),
								$this->input->post('user_post_code'),
								$this->input->post('user_city'),
								$this->input->post('user_country'));
		$this->Group_members->insert($suggest_user_data['id'], $group_id, true);
		for($i = 0 ; $i < count($member_infos); $i++)
		{
			//todo prevent if admin will register as group member here.
			$existUser = $this->Users->get(array('email' => $member_infos[$i]['group_user_email']));
			$user_id = 0;
			if(count($existUser) > 0) {
				$user_id = $existUser[0]['id'];
			}
			else {
				$names = explode(" ", $member_infos[$i]['group_user_name']);
				if(count($names) == 1)
					$names[1] = '';
				$user_id = $this->Users->insert($names[0], $names[1], $member_infos[$i]['group_user_email'], '123456789');
			}

			$this->Group_members->insert($user_id, $group_id);
			$this->sendMailToAdmin(array('group_id' => $group_id, 
										'group_name' => $this->input->post('group_name'), 
										'user_id' => $user_id, 
										'user_name' => $member_infos[$i]['group_user_name']), 
			$member_infos[$i]['group_user_email']);
		}

		//do match logic here
		$whole_members = $this->Group_members->get(array('group_id' => $group_id, 'to_whom' => '0'));
		$pairs = $this->Group_members->get(array('group_id' => $group_id, 'to_whom' => '0'));
		
		$result = array();
		
		foreach ($whole_members as $value) {
			if(count($pairs) == 2)
				break;
			while(1){
				shuffle($pairs);
				if($value['user_id'] != $pairs[count($pairs) - 1]['user_id']){
					array_push($result, $pairs[count($pairs) - 1]);
					array_pop($pairs);
					break;
				}
			}
		}

		if($whole_members[count($whole_members) - 2]['user_id'] == $pairs[0]['user_id'] || $whole_members[count($whole_members) - 1]['user_id'] == $pairs[1]['user_id']){
			array_push($result, $pairs[1]);
			array_push($result, $pairs[0]);
		} else {
			array_push($result, $pairs[0]);
			array_push($result, $pairs[1]);
		}
		
		for($i = 0 ; $i < count($whole_members); $i++)
		{
			$this->Group_members->update(array('to_whom' => $result[$i]['user_id']), array('id' => $whole_members[$i]['id']));
		}

		redirect('user/group/view_group_detail/'.$group_id);
	}

	private function sendMailToAdmin($data, $to)
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.sendgrid.net';
        $config['smtp_user'] = 'apikey';
        $config['smtp_pass'] = $this->config->item('send_grid_api_key');
        $config['smtp_port'] = 587;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->clear(true);
        $this->email->set_newline("\r\n");
        $this->email->from("noreply@partyplans.shop");
        $this->email->subject("Accept to invitation Required");
        $message = $this->load->view('email/invitation_template', $data, TRUE);
        $this->email->message($message);
        $this->email->to($to);
		$result = $this->email->send(); 
		
    }

	public  function view_detail($group_id)
	{
		//todo block if user is not owner of this group

		$group_info = $this->Groups->get(array('id' => $group_id));
		
			
		if(count($group_info) > 0)
		{
			$my_data = $this->session->userdata(USER_INFO);
			
				$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
				$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
				$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
				$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
				$group_member_info = $this->Group_members->get(array('group_id' => $group_id), true);

				$my_info_in_group_member = $this->Group_members->get(array('group_id' => $group_id, 'user_id' => $my_data['id']));

				$whom_info = $this->Users->get(array('id' => $my_info_in_group_member[0]['to_whom']));
				$whom_name = "";
				if(count($whom_info) > 0)
				{
					$whom_name = $whom_info[0]['first_name'].' '.$whom_info[0]['last_name'];
				}

				$this->load->view('front/group/front_group_detail', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
														'top_menu' => $front_store_top_menu, 'view_footer' => $front_store_footer,
														'group_info' => $group_info[0],
														'group_member_info' => $group_member_info,
														'whom_name' => $whom_name,
														'is_owner' => $group_info[0]['leader_user_id'] == $my_data['id']));
			
		}
		else
		{
			redirect('store');
		}
	}

	public function user_group()
	{
		$front_store_header = $this->load->view('front/template/front_store_header', null, TRUE);
		$front_store_top_header = $this->load->view('front/template/front_store_top_header', null, TRUE);
		$front_store_top_menu = $this->load->view('front/template/front_store_top_menu', null, TRUE);
		$front_store_footer = $this->load->view('front/template/front_store_footer', null, TRUE);
		$me = $this->session->userdata(USER_INFO);

		$groups_id_infos = $this->Group_members->get(array('user_id' => $me['id']));
		$groups = array();
		for($i = 0 ; $i < count($groups_id_infos); $i++)
		{
			$group_info = $this->Groups->get(array('id' => $groups_id_infos[$i]['group_id']));
			$tmp_group = array();
			$tmp_group['id'] = $group_info[0]['id'];
			$tmp_group['group_name'] = $group_info[0]['name'];
			$tmp_group['budget'] = $group_info[0]['budget'];
			$members_for_this_group = $this->Group_members->get(array('group_id' => $groups_id_infos[$i]['group_id']));
			$tmp_group['member_count'] = count($members_for_this_group);
			$tmp_group['is_my_group'] = $me['id'] == $group_info[0]['leader_user_id'];
			$tmp_group['is_active'] = $group_info[0]['is_active'];
			$tmp_group['accepted'] = $groups_id_infos[$i]['accept_status'];
			$tmp_group['created_at'] = $group_info[0]['created_at'];
			array_push($groups, $tmp_group);
		}

		$this->load->view('front/group/front_group_list', array('view_header' => $front_store_header, 'top_header' => $front_store_top_header, 
													'top_menu' => $front_store_top_menu, 
													'view_footer' => $front_store_footer,
													'groups' => $groups));
	}

	public function do_accept($group_id)
	{
		$me = $this->session->userdata(USER_INFO);
		$this->Group_members->accept($group_id, $me['id']);
		redirect('user/group/view_my_group');
	}

	public function do_accept_by_mail($group_id, $user_id)
	{
		// redirect('user/login');
		$user_info = $this->Users->get(array('id' => $user_id));
		if(count($user_info) > 0) {
			$this->Group_members->accept($group_id, $user_id);
			// redirect('user/group/view_my_group');
			redirect('user/login');
		}
		else {
			redirect('user/login');
		}
	}
}
