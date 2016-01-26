<?php

class Atm_artiste_control extends CI_Controller
{
		public function __construct()
		{
				parent::__construct();

				$this->load->model('User_model', '', TRUE);
	    	$this->load->model('Atm_artiste_model', '', TRUE);

	    	$this->load->library('form_validation');

				$this->load->helper('html');
				$this->load->helper('url');
				$this->load->helper('form');
		}

		public function index()
	  {
			$data['user'] = $this->User_model;

      $data['artistes'] = $this->Atm_artiste_model->get_accepted();

			$this->load->view('header', $data);
			$this->load->view('artiste_atm_accepted', $data);
			$this->load->view('footer', $data);
	  }

    public function waiting()
	  {
			$data['user'] = $this->User_model;

      $data['artistes'] = $this->Atm_artiste_model->get_waiting();

			$this->load->view('header', $data);
			$this->load->view('artiste_atm_waiting', $data);
			$this->load->view('footer', $data);
	  }

    public function refused()
	  {
			$data['user'] = $this->User_model;

      $data['artistes'] = $this->Atm_artiste_model->get_refused();

			$this->load->view('header', $data);
			$this->load->view('artiste_atm_refused', $data);
			$this->load->view('footer', $data);
	  }

    public function accept($id_artiste)
	  {
      $data['artistes'] = $this->Atm_artiste_model->accept($id_artiste);
       redirect('Atm_artiste_control/waiting');
	  }

    public function refuse($id_artiste)
	  {
      $data['artistes'] = $this->Atm_artiste_model->refuse($id_artiste);
       redirect('Atm_artiste_control/waiting');
	  }
};
