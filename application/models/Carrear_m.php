<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrear_m extends CI_Model {
	protected $product_table='product';
	protected $category_table='category';
    public function alljob(){
    $sql="SELECT * FROM `job_opening`";    
        $query = $this->db->query($sql);
        
        // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
        return $query->result_array();
    }
    public function allapl(){
        $sql="SELECT * FROM `job_application`";    
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
   // --------------------------------update  Application information
    public function getApl($data){
        $dd=$data['prd_id'];
        $sql="SELECT * FROM job_application where job_app_id=$dd ";    
        $query = $this->db->query($sql);
   
    return $query->result_array();
    }

    public function updateApl($data){
        if(isset($data)){

            $this->db->set('job_aap_status',$data['job_aap_status']);
            $this->db->set('job_id',$data['job_id']);
            $this->db->where(['job_app_id'=>$data['job_app_id']]);
            $this->db->update('job_application');
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
    // job post update
   
    public function getpost($data){
        $dd=$data['prd_id'];
        $sql="SELECT * FROM job_opening where job_id=$dd ";    
        $query = $this->db->query($sql);
   
    return $query->result_array();
    }

    public function updateJob($data){
        if(isset($data)){

            $this->db->set('job_title',$data['job_title']);
            $this->db->set('job_dec',$data['job_dec']);
            $this->db->set('is_active',$data['is_active']);
            $this->db->where(['job_id'=>$data['job_id']]);
            $this->db->update('job_opening');
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

    //
    }
 

