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
            $user = $this->db->limit(1)->get_where('personne', ['login' => $_SESSION['user']])->unbuffered_row();

            if ($user != NULL)
            {
                $this->connected = TRUE;                
                $this->username  = $user->login;
                $this->password  = $user->pass;
            }
        }
    }
    public function register($login, $password, $passconf, $mail, $name, $surname, $sceneName, $phone, $date, $formation, $genre, $site, $influence, $country, $state)
    {
        $pass_hash = sha1($password);

        if ($this->db->get_where('artiste', ['login' => $login])->num_rows() > 0)
            return FALSE;
        else if($password != $passconf)
            return FALSE;
        else
            return $this->db->insert('artiste', [
                'login' => $login,
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

        if ($user != NULL && $password == $user->pass)
        {
            $_SESSION['user'] = $user->login;
            $this->connected = TRUE;           
            $this->username  = $user->login;
            $this->password  = $user->pass;

            return TRUE;
        }
        else
            return FALSE;
    }

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
    }
}
