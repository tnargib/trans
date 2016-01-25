<?php

class Reservation_control extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();

				$this->load->model('User_model', '', TRUE);

		      $this->load->model('Reservation_model', '', TRUE);

		    	$this->load->model('Reservation_model', '', TRUE);


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
          if (!$this->User_model->connected)
			redirect('connexion');

		  $data['user'] = $this->User_model;
		  $data['artiste'] = $this->User_model->get_artiste($_SESSION['user']);		  

		  if ($_SERVER['REQUEST_METHOD'] == 'POST')
		      {			
                /**$this->form_validation->set_rules('nom', 'nom', 'required');
                $this->form_validation->set_rules('cap_min', 'cap_min', 'required');
                $this->form_validation->set_rules('cap_max', 'cap_max', 'required');			
                $this->form_validation->set_rules('adresse', 'adresse', 'required');
                $this->form_validation->set_rules('type_salle', 'type_salle', 'required');					
                $this->form_validation->set_rules('date', 'date', 'required');
                $this->form_validation->set_rules('horaire', 'horaire', 'required');	*/		

			 if ($this->form_validation->run())
			     {
                    $recherche = $this->Reservation_model->search($_POST['nom'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['type_salle'], $_POST['date'], $_POST['acces_hand']);
                 
                    if($recherche === true){
                        $data['salles'] = $recherche;	
                    }
             }else
				$data['error'] = 'Le formulaire est mal rempli.';
		  }

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
