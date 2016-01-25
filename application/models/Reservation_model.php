<?php

class Reservation_model extends CI_Model
{
    public $tasks = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);
    }

    public function search($nom, $cap_min, $cap_max, $adresse, $type, $acces) {

        $this->db->select('id_salle, nom, capacite,adresse, telephone, type_salle, acces_handicap');
        $this->db->from('salle');
        $this->db->like('nom', $nom); 

        return $this->db->get()->result_array();
    }
};
