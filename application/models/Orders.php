<?php
class Orders extends CI_Model
{
    public function insertGroupOrder($user_id, $price,$group_info, $group_memeber_id, $my_first_name, $my_last_name)
    {
        $this->load->helper('string');
        $order_uniq_id = random_string('alnum', 6);
        $this->db->insert('orders', array(
            'uniq_id' => $order_uniq_id,
            'user_id' => $user_id,
            'checkout_status' => '0',
            'payout_status' => '0',
            'is_group_order' => '1',
            'group_member_id' => $group_memeber_id,
            'group_id' => $group_info['id'],
            'deliver_name' => $my_first_name.' '.$my_last_name,
            'deliver_address' => $group_info['bill_addr'],
            'deliver_zip' => $group_info['bill_zip'],
            'deliver_city' => $group_info['bill_city'],
            'deliver_country' => $group_info['bill_country']
        ));

        return $this->db->insert_id();
    }

    public function insertPersonalOrder($user_id, $price, $name, $addr, $zip, $city, $country)
    {
        $this->load->helper('string');
        $order_uniq_id = random_string('alnum', 6);
        $this->db->insert('orders', array(
            'uniq_id' => $order_uniq_id,
            'user_id' => $user_id,
            'checkout_status' => '1',
            'payout_status' => '1',
            'is_group_order' => '0',
            'group_member_id' => '0',
            'group_id' => '0',
            'deliver_name' => $name,
            'deliver_address' => $addr,
            'deliver_zip' => $zip,
            'deliver_city' => $city,
            'deliver_country' => $country
        ));
        return $this->db->insert_id();
    }

    public function insertOrderDetail($order_id, $product_id, $product_price, $product_count)
    {
        $this->db->insert('order_details', array('order_id' => $order_id, 
                            'product_id' => $product_id, 
                            'product_price' => $product_price,
                            'product_count' => $product_count));
    }

    public function update($where, $set)
    {
        $this->db->update('orders', $set, $where);
    }

    public function get($where = array())
    {
        return $this->db->select('*')->from('orders')->where($where)->get()->result_array();
    }

    public function get_recent()
    {
        return $this->db->select('*')->from('orders')->order_by('id', 'DESC')->limit(10)->get()->result_array();
    }
    
    public function get_details($where = array())
    {
        return $this->db->select('*')->from('order_details')->where($where)->get()->result_array();
    }
}