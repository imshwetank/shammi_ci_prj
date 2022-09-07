<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {
	protected $product_table='product';
	protected $job_table='job_opening';
    protected $business_table='business_query';
    protected $contact_us_table='contact_us';
	protected $apl_table='job_application';
	// protected $assdt_sidebar_table_='assdt_sidebar';
    public function NnoOfProduct($getBy){
        $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
        return $query->num_rows();
    }
	public function jobs($getBy){
        $query = $this->db->get_where($this->job_table, array('is_active' => $getBy['data']));
        return $query->num_rows();
    }
	public function application($getBy){
        $query = $this->db->get_where($this->apl_table, array('job_aap_status' => $getBy['data']));
        return $query->num_rows();
    }
	public function productChart($getBy){
		$data_d=$getBy['data'];
		$query=$this->db->query("SELECT COUNT(*) AS product_count,count(*) * 100.0 / sum(count(*)) Over() as Percentage, category.cat_name AS prd_cat FROM product RIGHT JOIN category ON (product.prd_cat=category.cat_id) WHERE product.prd_status=$data_d GROUP BY product.prd_cat");
        // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
		// $count=$query->num_rows();
        return $query->result_array();
    }
    // utilities
    public function business_query(){
        $sql="SELECT * FROM `business_query`";    
            $query = $this->db->query($sql);
            
            // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
            return $query->result_array();
    
    }
    public function alljob(){
        $sql="SELECT * FROM `job_opening`";    
            $query = $this->db->query($sql);
            
            // $query = $this->db->get_where($this->product_table, array('prd_status' => $getBy['data']));
            return $query->result_array();
        } 
        public function business_count(){
            $sql="SELECT * FROM `business_query`";    
                $query = $this->db->query($sql);
                return $query->num_rows();
        }
        public function business_pend($data){

            $query = $this->db->get_where($this->business_table, array('status' => $data['data']));
           
                return $query->num_rows();
        
        }
        public function contact_count(){
            $sql="SELECT * FROM `contact_us`";    
                $query = $this->db->query($sql);
                return $query->num_rows();
        }
        public function contact_pend($data){

            $query = $this->db->get_where($this->contact_us_table, array('status' => $data['data']));
           
                return $query->num_rows();
        
        }

}
