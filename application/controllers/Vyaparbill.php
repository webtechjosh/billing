<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vyaparbill extends CI_Controller {


	public function __construct(){

		parent::__construct();
        $this->load->helper('vyaparbill');
	}

	public function index()
	{
		$data['script'] = array('assets/admin/dist/js/frontajax.js');
		$this->load->view('front/index', $data);
	}


	public function price() {

		$this->load->view('front/price');
	}	

	public function about() {

		$this->load->view('front/about');
	}	
	
	public function blog() {

		$this->load->view('front/blog');
	}	

	public function contact() {

		$this->load->view('front/contact');
	}	

	public function services() {

		$this->load->view('front/services');
	}	


	public function register(){
		$return      = array();
		$data        = $this->input->post();
		$email       = $data['email'];
		$email_valid = $this->bill->isEmailExists($email);
        echo $email_valid; die;
	}



}