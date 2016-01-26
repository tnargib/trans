<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_control extends CI_Controller {

	 public function __construct()
	 {
		 parent::__construct();

	 	$this->load->model('User_model', '', TRUE);
		$this->load->library('form_validation');
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
	
	public function editer(){
		$data['user'] =  $this->User_model;
		$data['artiste'] = $this->User_model->get_artiste($_SESSION['user']);
		$data['reservation'] = $this->User_model->get_reserv_of($_SESSION['user']);

		$this->load->view('header', $data);
		$this->load->view('profil_editer', $data);
		$this->load->view('footer', $data);
	}
	
	public function register()
	{
		if (!$this->User_model->connected)
			redirect('connexion');

		$data['user'] = $this->User_model;
		$data['artiste'] = $this->User_model->get_artiste($_SESSION['user']);
		$data['reservation'] = $this->User_model->get_reserv_of($_SESSION['user']);

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{			
			$this->form_validation->set_rules('nomScene', 'nom de scene', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('passconf', 'passconf', 'required');			
			$this->form_validation->set_rules('nom', 'nom', 'required');
			$this->form_validation->set_rules('prenom', 'prenom', 'required');					
			$this->form_validation->set_rules('date', 'date', 'required');
			$this->form_validation->set_rules('formation', 'formation', 'required');
			$this->form_validation->set_rules('genre', 'genre', 'required');
			$this->form_validation->set_rules('influence', 'influence', 'required');
			$this->form_validation->set_rules('mail', 'mail', 'required');
			$this->form_validation->set_rules('telephone', 'telephone', 'required');
			$this->form_validation->set_rules('site', 'site', 'required');
			

			if ($this->form_validation->run())
			{
				if($this->User_model->editer($_POST['nomScene'],$_POST['password'], $_POST['passconf'], $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['date'], $_POST['formation'], $_POST['genre'], $_POST['site'], $_POST['influence'], $_POST['pays']) === TRUE)
					redirect('profil');
				else if($_POST['passconf'] != $_POST['password'])
					$data['error'] = 'Les mots de passe ne coresspondent pas. Veuillez réessayer.';
				else
					$data['error'] = 'Le pseudo existe déjà. Veuillez réessayer.';
			}
			else
				$data['error'] = 'Le formulaire est mal rempli.';
		}

		$this->load->view('header', $data);
		$this->load->view('profil_editer', $data);
		$this->load->view('footer', $data);

	}
	
	

}
?>
