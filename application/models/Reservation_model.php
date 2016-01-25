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

    public function search($nom, $cap_min, $cap_max, $adresse, $type, $acces) {

        if ($acces == NULL) {
            $acces = FALSE;
        }
        else {
            $acces = TRUE;
        }

        $this->db->select('*');
        $this->db->from('salle');
        $this->db->where('nom', $nom);
        $this->db->where('capacite >=', $cap_min);
        $this->db->where('capacite <=', $cap_max);
        $this->db->where('adresse', $adresse);
        $this->db->where('type_salle', $type);
        $this->db->where('acces_handicap', $acces);

        return $this->db->get()->result_array();
    }
};
