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

    public function register($username, $password, $mail, $name, $surname, $phone, $date, $formation, $genre, $site, $influence, $scenename, $country, $state, $simil)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        if ($this->db->get_where('artiste', ['username' => $username])->num_rows() > 0)
            return FALSE;
        else
            return $this->db->insert('artiste', [
                'login' => $username,
                'pass' => $password,
		'telephone' => $phone,
                'mail' => $mail,
		'nom' => $name,
                'prenom' => $surname,
		'nomscene' => $scenename,
		'pays' => $country,
                'datedebut' => $date,
		'formation' => $formation,
                'genre' => $genre,
		'siteweb' => $site,
                'statut' => $state,
		'artiste_simil' => $simil,
		
            ]);
    }

    public function connect($username, $password)
    {
        $user = $this->db->limit(1)->get_where('users', ['username' => $username])->unbuffered_row();

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

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
    }
}
