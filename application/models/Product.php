<?php
class Product extends CI_Model
{
    public function insert($category, $name, $price, $desc, $img_path, $pub_option, $trendy_option)
    {
        $existRecord = $this->db->select('*')->from('product')->where(array('name' => $name, 'category_id' => $category, 'is_deleted' => '0'))->get()->result_array();
        if(count($existRecord) > 0)
            return false;
        
        $this->db->insert('product', array('name' => $name, 
                                            'category_id' => $category, 
                                            'price' => $price,
                                            'description' => $desc,
                                            'img' => 'assets/products/'.$img_path,
                                            'is_publish' => $pub_option,
                                            'is_trendy' => $trendy_option));
        return true;
    }

    public function get($where = array())
    {
        
        $products =  $this->db->select('*')->from('product')->where($where)->get()->result_array();
        for($i = 0 ; $i < count($products); $i++)
        {
            $category_info = $this->db->select('*')->from('category')->where('id' , $products[$i]['category_id'])->get()->result_array();
            if(count($category_info) > 0)
                $products[$i]['category_name'] = $category_info[0]['name'];
            else
            $products[$i]['category_name'] = 'Unknown';
        }

        return $products;
    }

    public function update($product_id,$category, $name, $price, $description, $file_path, $publish_option, $is_trendy)
    {
        $updateArr = array('name' => $name, 
                            'category_id' => $category, 
                            'price' => $price,
                            'description' => $description,
                            'is_publish' => $publish_option,
                            'is_trendy' => $is_trendy);
        if(strlen($file_path) > 0)
            $updateArr['img'] = 'assets/products/'.$file_path;
        
        $this->db->update('product', $updateArr, array('id' => $product_id));
    }

    public function delete($product_id)
    {
        $this->db->update('product', array('is_deleted' => '1'), array('id' => $product_id));
    }
}