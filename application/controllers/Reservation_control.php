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

	  public function search()
	  {
			$data['user'] = $this->User_model;

			if (isset($_POST['acces_hand'])) {
				$acces_hand = true;
			} else {
				$acces_hand = false;
			}
			$data['salles'] = $this->Reservation_model->search($_POST['nom_salle'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['type_salle'], $acces_hand);
			print_r($_POST);
			

			$this->load->view('header', $data);
			$this->load->view('reservation', $data);
			$this->load->view('footer', $data);
	  }

	  public function add()
	  {

	  }

	  public function delete()
	  {

	  }
};
