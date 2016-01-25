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

        if($cap_min == "")
            $cap_min = 0;

        if($cap_max == "")
            $cap_max = 10^99;

        $this->db->select('*');
        $this->db->from('salle');
        if($nom != "")
            $this->db->where('nom', $nom);
        $this->db->where('capacite >=', $cap_min);
        $this->db->where('capacite <=', $cap_max);
        if($adresse != "")
            $this->db->where('adresse', $adresse);
        $this->db->where('type_salle', $type);
        $this->db->where('acces_handicap', $acces);

        return $this->db->get()->result_array();
    }
};
