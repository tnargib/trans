<?php

class Reservation_model extends CI_Model
{
    public $tasks = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);

        if ($this->User_model->connected)
        {
            // $this->tasks = $this->db
            //     ->order_by('priority', 'DESC')
            //     ->get_where('tasks', ['user_id' => $this->User_model->id])
            //     ->result_object();
        }
    }

    public function search($nom, $cap_min, $cap_max, $adresse, $telephone, $type, $acces) {
      
    }
};
