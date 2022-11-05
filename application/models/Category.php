<?php
class Category extends CI_Model
{
    public function insert($category_name="")
    {
        if(strlen($category_name) == 0) return;
        $existRecord = $this->db->select('*')->from('category')->where('name', $category_name)->get()->result_array();
        if(count($existRecord) > 0)
            return;
        
        $this->db->insert('category', array('name' => $category_name));
    }

    public function update($category_id, $category_name="")
    {
        if(strlen($category_name) == 0) return;
        $existRecord = $this->db->select('*')->from('category')->where('name', $category_name)->get()->result_array();
        if(count($existRecord) > 0)
            return;
        
        $this->db->update('category', array('name' => $category_name), array('id' => $category_id));
    }

    public function delete($category_id)
    {
        
        $this->db->delete('category', array('id' => $category_id));
        $this->db->delete('product', array('category_id' => $category_id));
    }

    public function getCategoryDetailInformation($where = array())
    {
        $categories = $this->db->select('*')->from('category')->where($where)->get()->result_array();
        for($i = 0 ; $i < count($categories); $i++)
        {
            $products = $this->db->select('*')->from('product')->where('category_id', $categories[$i]['id'])->get()->result_array();
            $categories[$i]['products_count'] = count($products);
        }
        return $categories;
    }
}