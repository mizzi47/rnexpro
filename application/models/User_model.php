<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function addUser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    function editUser($data)
    {
        $this->db->where('id', $this->session->userdata('userid'));
        $this->db->update('user', $data);
    }

    function getUser($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->where('group_id', (int) $_SESSION['group_id']);
        return $this->db->get('user')->result_array();
    }

    function getUserAll($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('user')->result_array();
    }

    function getVendor($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('vendor')->result_array();
    }

     function addVendor($data)
    {
        $this->db->insert('vendor', $data);
    }
}