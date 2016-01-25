<?php

class Reservation_control extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();

				$this->load->model('User_model', '', TRUE);
<<<<<<< HEAD
		      $this->load->model('Reservation_model', '', TRUE);
=======
		    	$this->load->model('Reservation_model', '', TRUE);
>>>>>>> origin/master

		    	$this->load->library('form_validation');

				$this->load->helper('html');
				$this->load->helper('url');
				$this->load->helper('form');
		}

		public function index()
	  {
			$data['user'] = $this->User_model;
            $data['salle'] = $this->User_model->get_salle($_SESSION['user']);

			$this->load->view('header', $data);
			$this->load->view('reservation', $data);
			$this->load->view('footer', $data);
	  }

	  public function search()
	  {
			$data['user'] = $this->User_model;
<<<<<<< HEAD
			$data['salles'] = $this->Reservation_model->search($_POST['nom_salle'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['telephone'], $_POST['type_salle'], $_POST['acces_hand']);
            $data['reservation'] = $this->User_model->get_reserv_of($_SESSION['user']);
			
=======

			if (isset($_POST['acces_hand'])) {
				$acces_hand = true;
			} else {
				$acces_hand = false;
			}
			$data['salles'] = $this->Reservation_model->search($_POST['nom_salle'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['type_salle'], $acces_hand);			

>>>>>>> origin/master
			$this->load->view('header', $data);
			$this->load->view('reservation', $data);
			$this->load->view('footer', $data);
	  }

	  public function add($salle, $id_artiste)
	  {

	  }

	  public function delete()
	  {

	  }
};
