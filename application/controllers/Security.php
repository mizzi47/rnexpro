<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Security extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['users'] = $this->User_model->getUserAll();

        $this->load->view('templates/header');
        $this->load->view('security', $data);
        // $this->load->view('templates/footer');
    }

    public function activeUser($id)
    {
        $active = "A";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('user', $params);
        $this->session->set_flashdata('msg-success-add', 'Status Changed');
        redirect("security");
    }

    public function removeUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('user', $params);
        $this->session->set_flashdata('msg-success-add', 'User Deactivated');
        redirect("security");
    }

    public function deleteUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->delete('user');
        $this->session->set_flashdata('msg-warning', 'User Deleted');
        redirect("security");
    }
}
