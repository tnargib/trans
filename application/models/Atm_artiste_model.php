<?php

class Atm_artiste_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);
    }

    public function get_accepted() {

        $this->db->select('*');
        $this->db->from('artiste');
        $this->db->where('statut', 'validé');

        return $this->db->get()->result_array();
    }

    public function get_waiting() {

        $this->db->select('*');
        $this->db->from('artiste');
        $this->db->where('statut', 'en attente');

        return $this->db->get()->result_array();
    }

    public function get_refused() {

        $this->db->select('*');
        $this->db->from('artiste');
        $this->db->where('statut', 'refusé');

        return $this->db->get()->result_array();
    }

    public function accept($id_artiste) {
      $data = array(
         'statut' => 'validé',
      );
      $this->db->where('id_artiste', $id_artiste);
      $this->db->update('artiste', $data);
    }

    public function refuse($id_artiste) {
      $data = array(
         'statut' => 'refusé',
      );
      $this->db->where('id_artiste', $id_artiste);
      $this->db->update('artiste', $data);
    }
};
