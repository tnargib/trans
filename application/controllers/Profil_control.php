<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_control extends CI_Controller {

	 public function __construct()
	 {
		 parent::__construct();

	 	$this->load->model('User_model', '', TRUE);

		$this->load->helper('html');
		$this->load->helper('url');
	 }

	public function index()	{
		$data['user'] =  $this->User_model;
		$data['artiste'] = $this->User_model->get_artiste($_SESSION['user']);
		$data['reservation'] = $this->User_model->get_reserv_of($_SESSION['user']);

		$this->load->view('header', $data);
		$this->load->view('profil', $data);
		$this->load->view('footer', $data);
	}

}
?>
