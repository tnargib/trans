<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	 public function __construct()
	 {
		 parent::__construct();

	 	$this->load->model('User_model', '', TRUE);

		$this->load->helper('html');
		$this->load->helper('url');
	 }

	public function index()	{
		$data = ['user' => $this->User_model];

		$this->load->view('header', $data);
		$this->load->view('profil', $data);
		$this->load->view('footer', $data);
	}

}
?>
