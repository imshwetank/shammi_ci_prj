<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class Msg_ci extends CI_Controller {
	function  __construct(){
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('home');
		echo 'message';
		die;
	}
	public function send_mail(){
		// print_r($_REQUEST);
		$name= $_REQUEST['name'];
		$message= $_REQUEST['message'];
		$subject='Enquiry Vizurban Legal';
		$to_address= $_REQUEST['email'];
		$from_address="admin@vizurban.legal";
		// $replay_mail='tech@bnwjournal.com';
		$replay_mail="info@vizurban.legal";
		$password="Add4!n1234";
		$this->load->library('phpmailer_lib');
			// PHPMailer object
		$mailer = $this->phpmailer_lib->load();
		$mailer = new PHPMailer(true);
			try{
				$mailer->isSMTP();
				$mailer->Host="mail.vizurban.legal";
				$mailer->SMTPAuth =true;
				$mailer->Username="$from_address";
				$mailer->Password="$password";
				$mailer->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
				$mailer->Port="465";
				$mailer->setFrom($from_address);
				$mailer->addAddress($to_address,'Do Not ReplayMail');
				$mailer->addReplyTo($replay_mail, 'Client ReplayMail');
				$mailer->Subject=$subject;
				$mailer->isHTML(true);
				$mailer->Body="<p>Lump sum calculator helps the investor to estimate the returns that will be made by a lump sum mutual fund investment. A lump sum calculator helps to calculate the maturity amount for a given lump sum investment made today. It shows the probable wealth gain during the tenure of investment for the amount invested at the beginning of the period.

				Just enter the amount you are willing to invest, expected rate of return per annum you think the investment will generate and the time period (in years) you are willing to stay invested.
				For example, let’s say that you plan to invest ₹1 lakh for a period of 30 years and expect a return of 12% per annum. The online calculator will calculate the return generated i.e ₹28,95,992 and the maturity amount i.e. ₹29,95,992.</p>";
				$mailer->send();
				echo json_encode("<h1>Mail has been sent</h1>");
			}catch(Exception $e){
				echo json_encode("Mail Error:".$mailer->ErrorInfo);
			}		
		die;
	}
	
		
	
}
