<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilitise_m extends CI_Model {
	protected $product_table='product';
	protected $category_table='category';
    public function alljob(){
    $sql="SELECT * FROM `job_opening`";    
        $query = $this->db->query($sql);
        
        // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
        return $query->result_array();
    }
    public function allcont(){
        $sql="SELECT * FROM `contact_us`";    
            $query = $this->db->query($sql);
            
            // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
            return $query->result_array();
        }    
    public function newjobpost($data){
        $this->db->insert('job_opening', $data); 
        $last_id = $this->db->insert_id();
    return [
        'status'=>'success',
        'message'=>'Information Saved Successfully...!',
        'last_id'=>$last_id            
    ];


    }
    // new query for job_opening
    public function business_query(){
        $sql="SELECT * FROM `business_query`";    
            $query = $this->db->query($sql);
            
            // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
            return $query->result_array();
    
    }   
    // updet query status

   
     public function getquery($data){
        $dd=$data['prd_id'];
        $sql="SELECT * FROM business_query where bq_id=$dd ";    
        $query = $this->db->query($sql);
   
    return $query->result_array();
    }

    public function updatequery($data){
        if(isset($data)){
            $this->db->set('status',$data['status']);
            $this->db->where(['bq_id'=>$data['bq_id']]);
            $this->db->update('business_query');
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
     // updet contact status

   
     public function congetquery($data){
        $dd=$data['prd_id'];
        $sql="SELECT * FROM contact_us where cu_id=$dd ";    
        $query = $this->db->query($sql);
   
    return $query->result_array();
    }

    public function conupdatequery($data){
        if(isset($data)){
            $this->db->set('status',$data['status']);
            $this->db->where(['cu_id'=>$data['cu_id']]);
            $this->db->update('contact_us');
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
    // ne contact
    public function newcont($data){
        $this->db->insert('contact_us', $data); 
        // $last_id = $this->db->insert_id();
    return [
        'status'=>'success',
        'message'=>'Information Saved Successfully...!',
        // 'last_id'=>$last_id            
    ];


    }
     // ne contact
     public function newsquery($data){
        $this->db->insert('business_query', $data); 
        // $last_id = $this->db->insert_id();
    return [
        'status'=>'success',
        'message'=>'Information Saved Successfully...!',
        // 'last_id'=>$last_id            
    ];


    }
    public function home_prd_btn($data){
        // $this->db->set('status',$data['status']);
        // $this->db->where(['cu_id'=>$data['cu_id']]);
        // $this->db->update('product');
        $data2=$data['data'];
        $sql="SELECT category.cat_name AS cat_name, product.prd_cat AS prd_cat FROM product JOIN category ON(category.cat_id=product.prd_cat) WHERE product.prd_status=$data2 GROUP BY product.prd_cat";   
        $query=$this->db->query($sql) ;
        return $query->result_array();

    }
    public function get_product($data){
        $dd=$data['prd_cat'];
        $sql="SELECT * FROM `product` WHERE prd_cat=$dd ORDER BY `product`.`prd_id` ASC";    
        $query = $this->db->query($sql);   
        // return $data;
        return $query->result_array();
    
        // $sql="SELECT category.cat_name AS cat_name, product.prd_cat AS prd_cat FROM product JOIN category ON(category.cat_id=product.prd_cat) WHERE product.prd_status=$data2 GROUP BY product.prd_cat";   
        // $query=$this->db->query($sql) ;
        // return $query->result_array();

    }
    

}
