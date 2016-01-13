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

		$data = ['user' => $this->User_model];

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('username', 'username', 'required|alpha_dash');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('mail', 'mail', 'required|alpha_dash');			
			$this->form_validation->set_rules('nom', 'nom', 'required|alpha_dash');
			$this->form_validation->set_rules('prenom', 'prenom', 'required|alpha_dash');
			$this->form_validation->set_rules('telephone', 'telpehone', 'required|numeric');
			$this->form_validation->set_rules('date', 'date', 'required|alpha_dash');
			$this->form_validation->set_rules('formation', 'formation', 'required|alpha_dash');
			$this->form_validation->set_rules('genre', 'genre', 'required|alpha_dash');
			$this->form_validation->set_rules('site', 'site', 'required|alpha_dash');
			$this->form_validation->set_rules('influence', 'influence', 'required|alpha_dash');

			if ($this->form_validation->run())
			{
				if($this->User_model->register($this->input->post('username'), $this->input->post('password'), $this->input->post('mail'), $this->input->post('nom'), $this->input->post('prenom'), $this->input->post('telephone'), $this->input->post('date'), $this->input->post('formation'), $this->input->post('genre'), $this->input->post('site'), $this->input->post('influence')) === TRUE)
					redirect('index');
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
			redirect('todolist');

		$data = ['user' => $this->User_model];

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
