<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {
	protected $product_table='product';
	protected $category2='category';
	protected $assdt_sidebar_table_='assdt_sidebar';
    public function activeProduct($getBy){
        $sql="SELECT product.prd_id as prd_id,product.prd_status as prd_status,product.prd_name as prd_name,product.prd_image as prd_image,category.cat_name as prd_cat from product LEFT JOIN category ON (category.cat_id=product.prd_cat)";    
        $query = $this->db->query($sql);
        
        // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
        return $query->result_array();
    }
    public function category($getBy){
        $sql="SELECT * FROM category where cat_status=1";    
        $query = $this->db->query($sql);
        // return $query->result_array();
        // $query = $this->db->get_where($this->category2, array('cat_status' => 1));
        return $query->result_array();
    }
    //add new product
    public function productNew($getBy){
            $this->db->insert('product', $getBy); 
            $last_id = $this->db->insert_id();
        return [
            'status'=>'success',
            'message'=>'Information Saved Successfully...!',
            'last_id'=>$last_id
        ];
    }
    // satart multipel category
    public function product_category($data){
        $last_id=$data['last_id'];
        $number_of=count($data);--$number_of;
         for($c=0;$c<$number_of;$c++){
            $prd_cat=$data[$c]['prd_cat'];
            $sql="INSERT INTO `product_category`( `prd_id`, `cat_id`) VALUES ($last_id,$prd_cat)";    
            $query = $this->db->query($sql);
                  
    }
        
    }
    // end multipal categoru
    // end product 
    //update prodect image
    public function updateImage($data){
        
        if(isset($data)){
                $this->db->set('prd_image',$data['filename']);
                $this->db->where(['prd_id'=>$data['last_id']]);
                $this->db->update('product');
        }
        }
        // catacry
        public function categoriesNew($getBy){
            $this->db->insert('category', $getBy); 
            $last_id = $this->db->insert_id();
        return [
            'status'=>'success',
            'message'=>'Information Saved Successfully...!',
            'last_id'=>$last_id            
        ];
    }
    public function updateImageCat($data){
    //  print_r($data);
        if(isset($data)){
                $this->db->set('cat_image',$data['filename']);
                $this->db->where(['cat_id'=>$data['last_id']]);
                $this->db->update('category');
                return [
                    'status'=>'success',
                    'message'=>'Image Information Saved Successfully...!',
                           
                ];
        }
        else{
            return[
                'status'=>'error',
                'message'=>'Image Information Not Found ...!',
            ];
        }
        }
        // // --------------------------------update category  information
        public function getupdateCall($data){
            $dd=$data['cat_id'];
            $sql="SELECT * FROM category where cat_id=$dd ";    
            $query = $this->db->query($sql);
       
        return $query->result_array();
        }
        public function catDataUpdate($data){
            if(isset($data)){
                $this->db->set('cat_name',$data['cat_name']);
                $this->db->set('cat_status',$data['cat_status']);
                $this->db->where(['cat_id'=>$data['cat_id']]);
                $this->db->update('category');
                return [
                    'status'=>'success',
                    'message'=>'Image Information Saved Successfully...!',
                           
                ];
        }
        else{
            return[
                'status'=>'error',
                'message'=>'Image Information Not Found ...!',
            ];
        }
        }
         // --------------------------------update  product information
        public function getupdateCallPrd($data){
            $dd=$data['prd_id'];
            $sql="SELECT * FROM product where prd_id=$dd ";    
            $query = $this->db->query($sql);
       
        return $query->result_array();
        }
        public function prdDataUpdate($data){
            if(isset($data)){
                
                $this->db->set('prd_title',$data['prd_title']);
                $this->db->set('prd_cat',$data['prd_cat']);
                $this->db->set('prd_dec',$data['prd_dec']);
                $this->db->set('prd_name',$data['prd_name']);
                $this->db->set('prd_status',$data['prd_status']);
                $this->db->where(['prd_id'=>$data['prd_id']]);
                $this->db->update('product');
                return [
                    'status'=>'success',
                    'message'=>'Image Information Saved Successfully...!',
                           
                ];
        }
        else{
            return[
                'status'=>'error',
                'message'=>'Image Information Not Found ...!',
            ];
        }

        }
}
