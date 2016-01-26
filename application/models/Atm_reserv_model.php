<?php

class Atm_reserv_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);
    }

    public function get_accepted() {

        $this->db->select('reservation.id_res, salle.nom, artiste.nomscene, reservation.date_reservation, reservation.horaire');
        $this->db->from('reservation');
        $this->db->join('salle', 'salle.id_salle = reservation.id_salle');
        $this->db->join('artiste', 'artiste.id_artiste = reservation.id_artiste');
        $this->db->where('validation', 'validé');

        return $this->db->get()->result_array();
    }

    public function get_waiting() {

        $this->db->select('reservation.id_res, salle.nom, artiste.nomscene, reservation.date_reservation, reservation.horaire');
        $this->db->from('reservation');
        $this->db->join('salle', 'salle.id_salle = reservation.id_salle');
        $this->db->join('artiste', 'artiste.id_artiste = reservation.id_artiste');
        $this->db->where('validation', 'en attente');

        return $this->db->get()->result_array();
    }

    public function get_refused() {

        $this->db->select('reservation.id_res, salle.nom, artiste.nomscene, reservation.date_reservation, reservation.horaire');
        $this->db->from('reservation');
        $this->db->join('salle', 'salle.id_salle = reservation.id_salle');
        $this->db->join('artiste', 'artiste.id_artiste = reservation.id_artiste');
        $this->db->where('validation', 'refusé');

        return $this->db->get()->result_array();
    }

    public function accept($id_res) {
      $data = array(
         'validation' => 'validé',
      );
      $this->db->where('id_res', $id_res);
      $this->db->update('reservation', $data);
    }

    public function refuse($id_res) {
      $data = array(
         'validation' => 'refusé',
      );
      $this->db->where('id_res', $id_res);
      $this->db->update('reservation', $data);
    }
};
