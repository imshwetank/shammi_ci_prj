<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
		$this->load->model('Login_m');
		$this->load->library('form_validation');
        // parent::__construct();
    }
	public function loginpage()
	{
        if($this->session->userdata('status')=='success'){
            header('Location:'.base_url('user/dashboard'));
            die;
        }
      
		$this->load->view('auth/loginpage');
        // echo 'hi';
	}
    public  function forgot_password(){
        $this->load->view('auth/reset_pwd');
 
    }
    public function userCheck(){
		$email_id=$this->input->post('emai_id', TRUE);
        $password=$this->input->post('user_password', TRUE);
        $validation=true;
        // $uppercase = preg_match('^[A-Z]$', $password);
        // $lowercase = preg_match('#[a-z]+#', $password);
        // $number    = preg_match('#[0-9]+#', $password);
        // $specialChars = preg_match("#W+#", $password);
        $pwd_lenth=strlen($password);
        if($pwd_lenth < 8) {
            $result_info['message']='Password is Not a Valide Formate ...!';
            $result_info['status']='error';
            // $validation=false;			
        }
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $result_info['message']='Email is Not a Valide Formate Please Check...!';
            $result_info['status']='error';
            // $validation=false;			
        }
        if($pwd_lenth >= 8 && filter_var($email_id, FILTER_VALIDATE_EMAIL)){
                $this->load->model('login_m');
                $login_data = array(
                                'email_id' => $email_id,
                                'password' => md5($password));
                $result=$this->login_m->login_check_m($login_data);
                if($result['status']=='success'){
                $result3 = json_decode(json_encode($result['data']),true);
                $result_info['message']=$result['message'];
                $result_info['status']=$result['status'];
                $result_info['location']=base_url('user/dashboard');
                $this->session->set_userdata('name', $result3['full_name']);
                $this->session->set_userdata('user_id', $result3['id']);
                $this->session->set_userdata('mobile_number', $result3['mobile_number']);
                $this->session->set_userdata('status', 'success');
                                $update_data = array(
                                'id'=>$result3['id'],
                                'ip'=>$_SERVER['REMOTE_ADDR']);
                                $result_2=$this->login_m->updatelogin_ip($update_data);
                            }
                if($result['status']=='error'){	
                    $result_info['message']=$result['message'];
                    $result_info['status']=$result['status'];
                    $result_info['location']='';
                }	 		
        }
        echo json_encode($result_info);
    }
    public function passwordChange(){
        $result_info=[];
        $password=$this->input->post('user_password', TRUE);
        $user_id=$this->input->post('user_id', TRUE);
        $validation=true;
        $pwd_lenth=strlen($password);
        if($pwd_lenth < 8) {
            $result['message']='Password is Not a Valide Formate ...!';
            $result['status']='error';
            // $validation=false;			
        }
        if($pwd_lenth >= 8){
                $this->load->model('login_m');
                $userData = array(
                                'user_id'=>$user_id,
                                'password' => md5($password));
                $result=$this->login_m->login_change($userData);
                if($result['status']=='success'){
                $result['message']=$result['message'];
                $result['status']=$result['status'];;
 	 		
        }
      
        // echo json_encode($result);
    }
    echo json_encode($result);
    }
    public function forgotChange(){
        // echo json_encode($_REQUEST);
        // die;
        
        $result=[];
        $this->load->model('login_m');
        $email_id=$this->input->post('email', TRUE);
        $otp=$this->input->post('otp', TRUE);
        // $otp=$this->generateNumericOTP(6);
        // echo $_REQUEST;
        $validation=true;
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $result['message']='Email is Not a Valide Formate Please Check...!';
            $result['status']='error';	
            $validation=false;
            die;	
        }
        // if ($otp<=5) {
        //     $result['message']='OTP is Not a Valide Formate Please Check...!';
        //     $result['status']='error';	
        //     $validation=false;	
        //     die;
        // }
        if ($validation=true) {
            $userData = array(
                // 'name'=>"Shwetank",
                'email_id' =>$email_id,
                'otp'=>$otp
            );

            $result=$this->login_m->checkEmailOtp($userData);
            // echo json_encode($result);
            if ($result['status']=='success') {
                $password=$this->input->post('password', TRUE);
                $conf_pwd=$this->input->post('confirm-password', TRUE);
                
                if ($_REQUEST['password']!=$_REQUEST['confirm-password']) {
                    $result['message']='Password And confirm password incorrect!!';
                    $result['status']='error'; 
                    echo json_encode($result);
                    exit();                           
                }
             
                if(strlen($conf_pwd)<8) {
                    $result['message']='Password is Not a Valide Formate ...!';
                    $result['status']='error';
                    // $validation=false;
                    echo json_encode($result);
                    exit();                  		
                }
                else {
                    $change_pwd_otp = array(
                      
                        'email_id' =>$email_id,
                        'password'=>md5($conf_pwd),
                        'otp'=>'vbnvnnv'
                    ); 
                    $result=$this->login_m->change_pwd_otp($change_pwd_otp);                 
                }
            }
            
            // $this->send_mail_otp($userData);
            // $result['message']='OTP is Email on your mail ID Please Check...!';
            // $result['status']='success';		
        }
        
        echo json_encode($result);
    }
    public function otpSend(){
        $result=[];
        $this->load->model('login_m');
        $email_id=$this->input->post('email_id', TRUE);
        $otp=$this->generateNumericOTP(6);
        $validation=true;
        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $result['message']='Email is Not a Valide Formate Please Check...!';
            $result['status']='error';	
            $validation=false;	
        }
        if ($validation=true) {
            $userData = array(
                'name'=>"Shwetank",
                'email_id' =>$_REQUEST['email_id'],
                'otp'=>$otp
            );

            $result=$this->login_m->VuseEmail($userData);
            if ($result['status']=='success') {
                $this->send_mail_otp($userData);
                // $this->login_m->otpEmail($userData);
            }
            
            // $this->send_mail_otp($userData);
            // $result['message']='OTP is Email on your mail ID Please Check...!';
            // $result['status']='success';		
        }
        
        echo json_encode($result);
    }

    public function generateNumericOTP($n) {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }
    // email otp

    public function send_mail_otp($data){
        $this->load->model('login_m');

        $this->login_m->otpEmail($data);
		// print_r($_REQUEST);
		$name= $data['name'];
		$to_address= $data['email_id'];
        $otp=$data['otp'];
            // settings
        $subject='OTP For Password Chenge';
		$from_address="info@shamminamkeens.com";
		$replay_mail='mukularora1708@gmail.com';
// 		$replay_mail="info@vizurban.legal";
		$password="SureshAr0r@";
		$this->load->library('phpmailer_lib');
			// PHPMailer object
		$mailer = $this->phpmailer_lib->load();
		$mailer = new PHPMailer(true);
			try{
				$mailer->isSMTP();
				$mailer->Host="smtp.hostinger.com";
				$mailer->SMTPAuth =true;
				$mailer->Username="$from_address";
				$mailer->Password="$password";
				$mailer->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
				$mailer->Port="465";
				$mailer->setFrom($from_address);
				$mailer->addAddress($to_address,$subject);
				$mailer->addReplyTo($replay_mail, 'Client ReplayMail');
				$mailer->Subject=$subject;
				$mailer->isHTML(true);
				$mailer->Body="Dear $name Your OTP is : $otp ";
				$mailer->send();
                $result['message']='OTP is Email on your mail ID Please Check...!';
                $result['status']='success';	
				echo json_encode($result);
			}catch(Exception $e){
                $result['message']="Mail Error:".$mailer->ErrorInfo.$to_address;
                $result['status']='error';
				echo json_encode($result);
			}		
		die;
	}

    // end otpSend
}
