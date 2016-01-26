<?php

class Reservation_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);
    }

    public function search($nom, $cap_min, $cap_max, $adresse, $type, $date, $horaire, $acces_hand) {

        $id = $this->db->limit(1)->get_where('artiste', ['login' => $_SESSION['user']])->unbuffered_row();
        $id = $id->id_artiste;

        $this->db->select('id_salle, date_reservation, horaire, validation');
        $this->db->from('reservation');
        $this->db->where('id_artiste', $id);

        $reserv = $this->db->get()->result();

        foreach ($reserv as $row) {
            if($row->date_reservation == $date){
                return false;
            }
        }

        $this->db->select('id_salle, nom, capacite,adresse, telephone, type_salle, acces_handicap');
        $this->db->from('salle');
        if(!empty($nom)){
            $this->db->like('nom', $nom);
        }

        $this->db->where('acces_handicap', $acces_hand);
        $this->db->where('type_salle', $type);

        if(!empty($cap_max)){
            $this->db->where('capacite <=', $cap_max);
        }
        if(!empty($cap_min)){
            $this->db->where('capacite >=', $cap_min);
        }

        if(!empty($adresse)){
            $this->db->like('adresse', strtoupper($adresse));
        }

        $this->db->limit(3);

        $salles = $this->db->get()->result();

        return $salles;
    }

    public function add_reserv($salle) {
      $this->db->select('*');
      $this->db->from('artiste');
      $this->db->where('pseudo', $_SESSION['user']);
      $artiste = $this->db->get()->result();

      $data = array(
        'id_salle' => $salle,
        'id_artiste' => $_SESSION['user'],
        'date_Reservation' => '',
        'horaire' => '',
        'validation' => '',
      );

     $this->db->insert('reservation', $data);
    }
};
