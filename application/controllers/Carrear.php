<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrear extends CI_Controller {

	public function index()	{
		echo 'hi';
	}
	public function postjob()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('carrear/new_job');
		$this->load->view('ad_layout/footer');
		
	}
	// job post new_job
	public function postjobnew(){
		$this->load->model('Carrear_m');
		if ($_REQUEST['job_title']!=="" && $_REQUEST['job_dec']!=="") {
			$return_info =$this->Carrear_m->newjobpost($_REQUEST);
			
		}else {
			$return_info['message']="Please fill All Fielad";
			$return_info['status']="error";
		}
		echo json_encode($return_info);
	}
	// ----------------------------------------------------------------
	public function alljobs()	{
		$this->load->model('Carrear_m');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('carrear/all_jobs');
		$this->load->view('ad_layout/footer');
	}
	public function allapplication()	{
		$this->load->model('Carrear_m');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('carrear/all_apl');
		$this->load->view('ad_layout/footer');
	}
	public function jobapplay()	{
		
		$this->load->view('carrear/aply_job');

		
	}
	public function statusupdate()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		// $this->load->view('');
		$this->load->view('ad_layout/footer');
	}
	// get job status update status
	public function getstatus()	{
		$this->load->model('Carrear_m');
		$data=$this->Carrear_m->getApl($_REQUEST);
		echo json_encode($data);
		
	}
	public function updatestatus()	{
		// echo json_encode($_REQUEST);
		$this->load->model('Carrear_m');
		$data=$this->Carrear_m->updateApl($_REQUEST);
		echo json_encode($data);
	}
	// update job
	public function getstatusjob()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Carrear_m');
		$data=$this->Carrear_m->getpost($_REQUEST);
		echo json_encode($data);
		
	}
	public function updatestatusjob()	{
		echo json_encode($_REQUEST);
		die;
		$this->load->model('Carrear_m');
		$data=$this->Carrear_m->updateApl($_REQUEST);
		echo json_encode($data);
	}
	
}
