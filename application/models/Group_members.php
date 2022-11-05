<?php
class Group_members extends CI_Model
{
    public function insert($user_id, $group_id, $is_leader = false)
    {
        if($is_leader)
        {
            $this->db->insert('group_members', array('group_id' => $group_id, 
                                'user_id' => $user_id,
                                'is_leader' => '1',
                                'accept_status' => '1'));
        }
        else
        {
            $this->db->insert('group_members', array('group_id' => $group_id, 
            'user_id' => $user_id));
        }
        
        $insert_group_id = $this->db->insert_id();
    }

    public function get($where = array(), $need_order_status = false)
    {
        $members = $this->db->select('*')->from('group_members')->where($where)->get()->result_array();
        
        for($i = 0; $i < count($members); $i++)
        {
            $user_info = $this->db->select('*')->from('users')->where('id', $members[$i]['user_id'])->get()->result_array();
            if(count($user_info) > 0)
            {
                $members[$i]['first_name'] = $user_info[0]['first_name'];
                $members[$i]['last_name'] = $user_info[0]['last_name'];
                $members[$i]['email'] = $user_info[0]['email'];
            }
            //todo get the order status here
            if(!$need_order_status)
            {
                $members[$i]['order_status'] = 0;
                $members[$i]['checkout_status'] = 0;
            }
            else
            {
                $order_detail = $this->db->select('*')->from('orders')->where(array('user_id' => $members[$i]['user_id'], 
                                                                    'is_group_order' => '1', 
                                                                    'group_id' => $members[$i]['group_id'],
                                                                    'group_member_id' => $members[$i]['id']
                                                                    ))
                                                    ->get()
                                                    ->result_array();
                if(count($order_detail) > 0)
                {
                    $members[$i]['order_status'] = $order_detail[0]['payout_status'];
                    $members[$i]['checkout_status'] = $order_detail[0]['checkout_status'];
                }
                else 
                {
                    $members[$i]['order_status'] = 0;
                    $members[$i]['checkout_status'] = 0;
                }
            }
        }
        return $members;
    }

    public function getOnlyGroupMemberInfo($where = array())
    {
        return $this->db->select('*')->from('group_members')->where($where)->get()->result_array();
    }

    public function accept($group_id, $user_id)
    {
        $this->db->update('group_members', array('accept_status' => '1'), array('group_id' => $group_id, 'user_id' => $user_id));
    }

    public function update($set, $where)
    {
        $this->db->update('group_members', $set, $where);
    }
}