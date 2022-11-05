<?php
class Groups extends CI_Model
{
    public function insert($leader_user_id,$group_name, $mobile, $budget, $bill_addr, $bill_zip, $bill_city, $bill_country)
    {
        
        $this->load->helper('string');
        $coupon_code = random_string('numeric', 6);
        $this->db->insert('groups', array('leader_user_id' => $leader_user_id, 
                                            'name' => $group_name,
                                            'mobile' => $mobile,
                                            'budget' => $budget, 
                                            'bill_addr' => $bill_addr, 
                                            'bill_zip' => $bill_zip,
                                            'bill_city' => $bill_city,
                                            'group_code' => $coupon_code,
                                            'bill_country' => $bill_country));
        $insert_group_id = $this->db->insert_id();

        $user_info = $this->db->select('*')->from('users')->where('id', $leader_user_id)->get()->result_array();
        if(strlen($user_info[0]['zip']) == 0)
            $this->db->update('users', array('zip' => $bill_zip), array('id' => $leader_user_id));
        if(strlen($user_info[0]['addr']) == 0)
            $this->db->update('users', array('addr' => $bill_addr), array('id' => $leader_user_id));
        if(strlen($user_info[0]['city']) == 0)
            $this->db->update('users', array('city' => $bill_city), array('id' => $leader_user_id));
        if(strlen($user_info[0]['country']) == 0)
            $this->db->update('users', array('country' => $bill_country), array('id' => $leader_user_id));
        if(strlen($user_info[0]['mobile']) == 0)
            $this->db->update('users', array('mobile' => $mobile), array('id' => $leader_user_id));
        
        $user_info = $this->db->select('*')->from('users')->where('id', $leader_user_id)->get()->result_array();
        $this->session->set_userdata(USER_INFO, $user_info[0]);
        return $insert_group_id;
    }

    public function get($where = array())
    {
        $group_info = $this->db->select('*')->from('groups')->where($where)->get()->result_array();
        return $group_info;
    }
}