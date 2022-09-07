<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Model {
	public function q_profile($data){
	if(isset($data)){
            $this->db->set(['full_name'=>$data['nm_users'],'mobile_number'=>$data['mobile_number'],'email_id'=>$data['email_id'],'password'=>$data['password']]);
            $this->db->where(['id'=>$data['id']]);
			return $this->db->update('nm_users');
    }

	}
	public function active_profile($id){
		$query=$this->db->query("SELECT * FROM `nm_users` WHERE `id`=$id");
		 $stat =$query->result_array();
		return $stat;  
	}

}
