<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilitise extends CI_Controller {

	public function contact_us()
	{
		$this->load->view('home/head');
		$this->load->view('utilitise/contact');
		// $this->load->view('home/footer');
		
	}
	public function query_us()
	{
		$this->load->view('home/head');
		$this->load->view('utilitise/query');
		$this->load->view('home/footer');
		
	}
	public function about_us()
	{
		$this->load->view('home/head');
		$this->load->view('utilitise/about_us');
		$this->load->view('home/footer');
		
	}
	
	public function home_product()
	{
		$this->load->model('Utilitise_m');
		$this->load->view('home/head');
		$this->load->view('utilitise/home_product');
		$this->load->view('home/footer');
		
	}
	public function home_product_data()
	{
		$this->load->model('Utilitise_m');
		$this->load->view('home/head');
		$this->load->view('utilitise/home_product');
		$this->load->view('home/footer');
		
	}

	public function viewcontact()
	{
		// echo "viewcontact";
		$this->load->model('Utilitise_m');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('utilitise/all_contact');
		$this->load->view('ad_layout/footer');
	
	

		
	}
	public function viewqueryus()
	{
		$this->load->model('Utilitise_m');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('utilitise/all_query');
		$this->load->view('ad_layout/footer');

		
	}
	// update query

	public function getstatquery()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->getquery($_REQUEST);
		echo json_encode($data);
		
	}
	public function updatestatusquery()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->updatequery($_REQUEST);
		echo json_encode($data);
	}
	// update qcontact update status

	public function congetstatquery()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->congetquery($_REQUEST);
		echo json_encode($data);
		
	}
	public function conupdatestatusquery()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->conupdatequery($_REQUEST);
		echo json_encode($data);
	}
	// new contact

	public function newcontact()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->newcont($_REQUEST);
		echo json_encode($data);
	}
	public function newsquery()	{
		// echo json_encode($_REQUEST);
		// die;
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->newsquery($_REQUEST);
		echo json_encode($data);
	}
	public function get_product(){
		$this->load->model('Utilitise_m');
		$data=$this->Utilitise_m->get_product($_REQUEST);
		echo json_encode($data);

	}

}
