<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_Sender extends CI_Controller {
	public function invitation()
	{
        $this->load->view('email/invitation_template', array('group_id' => 1, 
                            'party_date' => '30', 
                            'party_month' => 'OCT',
                            'user_id' => 1, 
                            'user_name' => 'test email user', 
                            'group_name' => 'Test Group'));
	}

	public function test_email()
	{
		$this->sendMailToAdmin(array('group_id' => 1, 'user_id' => 1, 'user_name' => 'test email user', 'group_name' => 'Test Group'), 'zeusbackforyou@gmail.com');
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
        echo('email send result');
        var_dump($result);       
        print_r(' ');
		if($result == false)
		{
            echo 'result is false';
            var_dump($this->email->print_debugger());
        }	
        echo 'haha';
    }
}