<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Controller {

	public function dashboard()
	{
		// echo 'Dashboard admin';		
		// $this->load->view('home_dash');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		// $this->load->view('ad_layout/');
		$this->load->view('dashboard/dash_index');
		$this->load->view('ad_layout/footer');
	}
}
