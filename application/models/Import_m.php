<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_m extends CI_Model {
	protected $product_table='product';
	protected $category_table='category';
    public function activeProduct($getBy){
        $sql="SELECT product.prd_id as prd_id,product.prd_status as prd_status,product.prd_name as prd_name,product.prd_image as prd_image,category.cat_name as prd_cat from product LEFT JOIN category ON (category.cat_id=product.prd_cat)";    
        $query = $this->db->query($sql);
        
        // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
        return $query->result_array();
    }
    public function insert($data) {
        $res = $this->db->insert_batch('import',$data);
        if($res){
        return TRUE;
        }else{
        return FALSE;
        }
        }
   
    
    
    

}
