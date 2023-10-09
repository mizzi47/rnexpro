<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
