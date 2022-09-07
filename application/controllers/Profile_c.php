<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_c extends CI_Controller {

	public function features_profile()
	{
		// echo 'Dashboard admin';		
		// $this->load->view('home_dash');
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('profile/profile');
		$this->load->view('ad_layout/footer');
	}
}
