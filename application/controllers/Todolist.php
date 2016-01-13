<?php

class Todolist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model', '', TRUE);
        $this->load->model('Todolist_model', '', TRUE);

        $this->load->library('form_validation');

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
	}

    public function display()
    {
        if (!$this->User_model->connected)
            redirect('connexion');

        $data = [
            'user'  => $this->User_model,
            'tasks' => $this->Todolist_model->tasks
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->form_validation->set_rules('content', 'content', 'required');

            if ($this->form_validation->run())
            {
                if ($this->Todolist_model->create_task($this->input->post('content')))
                    redirect('todolist');
            }
            else
                $data['error'] = 'Le formulaire est mal rempli.';
        }

		$this->load->view('header', $data);
		$this->load->view('display', $data);
		$this->load->view('footer', $data);
    }

    public function delete_task()
    {
        if (!$this->User_model->connected)
            redirect('connexion');

        if (isset($_GET['task']))
        	$this->Todolist_model->delete_task($this->input->get('task'));

		redirect('todolist');
    }

    public function change_task_priority()
    {
        if (!$this->User_model->connected)
            redirect('connexion');

        if (isset($_GET['task']) && isset($_GET['change']))
        	$this->Todolist_model->change_task_priority($this->input->get('task'), $this->input->get('change'));

		redirect('todolist');
    }
};
