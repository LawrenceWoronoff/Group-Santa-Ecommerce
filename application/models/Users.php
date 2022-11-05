<?php
class Users extends CI_Model
{
    public function insert($first_name, $last_name, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->insert('users', array('first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => $password));
        return $this->db->insert_id();
    }

    public function update($where, $set)
    {
        $this->db->update('users', $where, $set);
    }

    public function get($where = array())
    {
        return $this->db->select('*')->from('users')->where($where)->get()->result_array();
    }

    public function change_password($session_id, $new_password){
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->update('users', array('password' => $new_password), array('id' => $session_id));
    }
}
