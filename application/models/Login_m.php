<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {
	protected $User_table='nm_users';
	protected $assdt_sidebar_table_='assdt_sidebar';

	public function index()
	{
		// $this->load->view('welcome_message');
		// echo 'login check model';
	}

	public function login_check_m($LuserData) {
		$email_id=$LuserData['email_id'];
		$password_u=$LuserData['password'];
		$data=[];

        $query = $this->db->get_where($this->User_table, array('email_id' => $LuserData['email_id']));
		
        if ($this->db->affected_rows() > 0) {
            $password = $query->row('password');
            $is_active = $query->row('is_active');
        //  echo '<pre>';
		 $query2 = $this->db->get_where($this->User_table, array());

				if($password_u ==$password && $is_active !=='BLOCKED') {

					$data=$query->row();
                return [
                    'status' => 'success',
					'location'=>'dashboard',
					'message'=>"Sussess Login",
					'data' => $data
                ];
			}
			else if($is_active =='BLOCKED') {

                return [
                    'status' =>'error',
                    'message' => 'Blocked user account login Credentials',
					'location'=>'login'
                ];
			}
				else if($password_u !==$password){
					return ['status' => 'error','message' => 'Invalid Credentials Please Check','location'=>'login'];
				}
				else {
            return ['status' => 'error','message' => 'Somthing Error','location'=>'login'];
        }
        } else {
            return ['status' => 'error','message' => 'No User Found','location'=>'login'];
			
        }
		
    }
	public function updatelogin_ip($ip_data){
	if(isset($ip_data)){
			$this->db->set('last_login_ip',$ip_data['ip']);
			// $this->db->set('otp_status',$data['0']);
			$this->db->where(['id'=>$ip_data['id']]);
			$this->db->update('nm_users');
	}
	}

	// password changed
	public function login_change($data){
			$this->db->set('password',$data['password']);
			$this->db->where(['id'=>$data['user_id']]);
			$this->db->update('nm_users');
			return [
				'status' => 'success',
				'message'=>"Password changed successfully"
			];	
	}
	// email kotp
	public function otpEmail($data){
		$this->db->set('otp',$data['otp']);
		$this->db->set('otp_status','0');
		$this->db->where(['email_id'=>$data['email_id']]);
		$this->db->update('nm_users');
		// $otp=$data['otp'];
		// $otp_status=0;
		// $email_id=$data['email_id'];

		// $this->db->update('nm_users');
		// $sql="UPDATE nm_users SET otp=$otp,otp_status=$otp_status WHERE email_id=$email_id";
		// $query = $this->db->query($sql);
		return [
			'status'=>'success'
		];
		
}
// check valide email
			public function VuseEmail($LuserData){
				$email_id=$LuserData['email_id'];
					// $password_u=$LuserData['password'];
					$data=[];

					$query = $this->db->get_where($this->User_table, array('email_id' => $LuserData['email_id']));
					
					if ($this->db->affected_rows() > 0) {
						// $password = $query->row('password');
						$is_active = $query->row('is_active');
						$user_id = $query->row('id');
					//  echo '<pre>';
					$query2 = $this->db->get_where($this->User_table, array());

							if($is_active !=='BLOCKED') {

								$data=$query->row();
							return [
								'status' => 'success',
								// 'location'=>'dashboard',
								'message'=>"Email Validated Successfully ",
								'user_id' => $user_id
								
							];
							
						}
						else if($is_active =='BLOCKED') {

							return [
								'status' =>'error',
								'message' => 'Blocked user account login Credentials',
								'location'=>'login'
							];
						}
							else if($is_active =='BLOCKED'){
								return ['status' => 'error','message' => 'Invalid Credentials Please Check','location'=>'login'];
							}
							else {
						return ['status' => 'error','message' => 'Somthing Error','location'=>'login'];
					}
					} else {
						return ['status' => 'error','message' => 'No User Found','location'=>'login'];
						
					}
			}
			public function checkEmailOtp($LuserData){
// return $LuserData;
// 				die;
				$email_id=$LuserData['email_id'];
					// $password_u=$LuserData['password'];
					$data=[];

					$query = $this->db->get_where($this->User_table, array('email_id' => $LuserData['email_id']));
					
					if ($this->db->affected_rows() > 0) {
						// $password = $query->row('password');
						$is_active = $query->row('is_active');
						$db_otp = $query->row('otp');
						$user_id = $query->row('id');
					//  echo '<pre>';
					$query2 = $this->db->get_where($this->User_table, array('email_id' => $LuserData['email_id']));

							if($is_active !=='BLOCKED' && $db_otp==$LuserData['otp']) {

								$data=$query->row();
							return [
								'status' => 'success',
								// 'location'=>'dashboard',
								'message'=>"Email and OTP Validated Successfully  ",
								'user_id' => $user_id
								
							];
							
						}
						else if($db_otp !==$LuserData['otp']) {

							$data=$query->row();
						return [
							'status' => 'error',
							// 'location'=>'dashboard',
							'message'=>"Email OTP Not Valide ",
							'user_id' => $user_id];
						die;
					}
						else if($is_active =='BLOCKED') {

							return [
								'status' =>'error',
								'message' => 'Blocked user account login Credentials',
								'location'=>'admin'
							];
							die;
						}
							else if($is_active =='BLOCKED'){
								return ['status' => 'error','message' => 'Invalid Credentials Please Check','location'=>'admin'];
							}
							else {
						return ['status' => 'error','message' => 'Somthing Error','location'=>'admin'];
					}
					} else {
						return ['status' => 'error','message' => 'No User Found','location'=>'admin'];
						
					}
			}
			public function change_pwd_otp($data){
			$this->db->set('password',$data['password']);
			$this->db->set('otp',$data['otp']);
			$this->db->where(['email_id'=>$data['email_id']]);
			$this->db->update('nm_users');
			return [
				'status' => 'success',
				'message'=>"Password changed successfully",
				'location'=>base_url('admin')
			];	

			}
// ens email
}


