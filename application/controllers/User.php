<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model', '', TRUE);

    $this->load->library('form_validation');

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function register()
	{
		if ($this->User_model->connected)
			redirect('index');

		$data['user'] = $this->User_model;

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('username', 'username', 'required|alpha_dash');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('passconf', 'passconf', 'required');
			$this->form_validation->set_rules('mail', 'mail', 'required');
			$this->form_validation->set_rules('nom', 'nom', 'required');
			$this->form_validation->set_rules('prenom', 'prenom', 'required');
			$this->form_validation->set_rules('nomScene', 'nom de scene', 'required');
			$this->form_validation->set_rules('telephone', 'telpehone', 'required');
			$this->form_validation->set_rules('date', 'date', 'required');
			$this->form_validation->set_rules('formation', 'formation', 'required');
			$this->form_validation->set_rules('genre', 'genre', 'required');
			$this->form_validation->set_rules('site', 'site', 'required');
			$this->form_validation->set_rules('influence', 'influence', 'required');

			if ($this->form_validation->run())
			{
				if($this->User_model->register($_POST['username'], $_POST['password'], $_POST['passconf'], $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['nomScene'], $_POST['telephone'], $_POST['date'], $_POST['formation'], $_POST['genre'], $_POST['site'], $_POST['influence'], $_POST['pays'], "En attente") === TRUE)
					redirect('index');
				else if($_POST['passconf'] != $_POST['password'])
					$data['error'] = 'Les mots de passe ne coresspondent pas. Veuillez réessayer.';
				else
					$data['error'] = 'Le pseudo existe déjà. Veuillez réessayer.';
			}
			else
				$data['error'] = 'Le formulaire est mal rempli.';
		}

		$this->load->view('header', $data);
		$this->load->view('inscription', $data);
		$this->load->view('footer', $data);

	}

	public function connect()
	{
		if ($this->User_model->connected)
			redirect('index');

		$data['user'] = $this->User_model;

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('username', 'username', 'required|alpha_dash');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run())
			{
				if ($this->User_model->connect($this->input->post('username'), $this->input->post('password')) === TRUE)
					redirect('index');
				else
					$data['error'] = 'L\'utilisateur n\'existe pas ou le mot de passe est incorrect.';
			}
			else
				$data['error'] = 'Le formulaire est mal rempli.';
		}

		$this->load->view('header', $data);
		$this->load->view('connexion', $data);
		$this->load->view('footer', $data);
	}

	public function disconnect()
	{
		$this->User_model->disconnect();
		redirect('index');
	}
}
