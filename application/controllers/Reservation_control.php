<?php

class Reservation_control extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();

				$this->load->model('User_model', '', TRUE);
		    $this->load->model('Reservation_model', '', TRUE);

		    $this->load->library('form_validation');

				$this->load->helper('html');
				$this->load->helper('url');
				$this->load->helper('form');
		}

		public function index()
	  {
			$data['user'] = $this->User_model;

			$this->load->view('header', $data);
			$this->load->view('reservation', $data);
			$this->load->view('footer', $data);
	  }

	  public function display()
	  {

	  }

	  public function search()
	  {

	  }

	  public function add()
	  {

	  }

	  public function delete()
	  {

	  }
};
