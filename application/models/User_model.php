<?php

class User_model extends CI_Model
{
    public $connected = FALSE;
    public $id        = -1;
    public $username  = 'Unknown';
    public $password  = 'password';

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (isset($_SESSION['user']))
        {
            $user = $this->db->limit(1)->get_where('users', ['id' => $_SESSION['user']])->unbuffered_row();

            if ($user != NULL)
            {
                $this->connected = TRUE;
                $this->id        = $user->id;
                $this->username  = $user->username;
                $this->password  = $user->password;
            }
        }
    }

    public function register($username, $password, $passconf, $mail, $name, $surname, $sceneName, $phone, $date, $formation, $genre, $site, $influence, $country, $state)
    {
        $pass_hash = sha1($password);

        if ($this->db->get_where('artiste', ['login' => $username])->num_rows() > 0)
            return FALSE;
        else if($password != $passconf)
            return FALSE;
        else
            return $this->db->insert('artiste', [
                'login' => $username,
                'pass' => $password,
                'mail' => $mail,
                'nom' => $name,
                'prenom' => $surname,
                'nomscene' => $sceneName,
		        'telephone' => $phone,
		        'datedebut' => $date,
                'formation' => $formation,
                'genre' => $genre,
                'siteweb' => $site,
                'artiste_simil' => $influence,
		        'pays' => $country,
                'statut' => $state,
            ]);
    }

    public function connect($username, $password)
    {
        $user = $this->db->limit(1)->get_where('personne', ['login' => $username])->unbuffered_row();

        if ($user != NULL && password_verify($password, $user->password))
        {
            $_SESSION['user'] = $user->id;
            $this->connected = TRUE;
            $this->id        = $user->id;
            $this->username  = $user->username;
            $this->password  = $user->password;

            return TRUE;
        }
        else
            return FALSE;
    }

    function login($pseudo, $mdp)
    {
        $this->db->select('login, pass');
        $this->db->from('personne');
        $this->db->where('login', $pseudo);
        $this->db->where('pass', $mdp);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
    }
}
