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
          if (!$this->User_model->connected){
			redirect('connexion');
          }

		  $data['user'] = $this->User_model;
		  $data['artiste'] = $this->User_model->get_artiste($_SESSION['user']);		  

		  if ($_SERVER['REQUEST_METHOD'] == 'POST')
		      {		                             
                 if((int)$_POST['cap_min'] > (int)$_POST['cap_max']){
                     $data['error'] = 'Capacités incorrectes.';
                 }
                 elseif(!isset($_POST['nom_salle']) && !isset($_POST['cap_min'])&& !isset($_POST['cap_max'])&& !isset($_POST['adresse'])&& !isset($_POST['type_salle'])&& !isset($_POST['date'])&& !isset($_POST['horaire']) && !isset($_POST['acces_hand'])){
                     $data['error'] = 'Pas assez de renseignement';
                 }
                 else{
                     if(isset($_POST['acces_hand'])){
                         $acces_hand = true;
                     }
                     else{
                         $acces_hand = false;
                     }
                     if($this->Reservation_model->search($_POST['nom_salle'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['type_salle'], $_POST['date'], $_POST['horaire'],$acces_hand) === FALSE){
                        $data['error'] = 'Vous avez déjà un concert prévu à cette date.';                     
                    } else{
                        $data['salles'] = $this->Reservation_model->search($_POST['nom_salle'], $_POST['cap_min'], $_POST['cap_max'], $_POST['adresse'], $_POST['type_salle'], $_POST['date'], $_POST['horaire'],$acces_hand);
                     }                               

                    }
                
            }   
            
            
			$this->load->view('header', $data);
			$this->load->view('reservation', $data);
			$this->load->view('footer', $data);
      }

	  public function add($salle)
	  {
            
	  }

	  public function delete()
	  {

	  }
};
