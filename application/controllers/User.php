<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!isset($_SESSION['userid'])) {
            $this->session->set_flashdata('msg-warning', 'Please login');
            redirect('');
        }
    }

    public function index()
    {
        $data['users'] = $this->User_model->getUser();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function vendor_index()
    {
        $data['vendor'] = $this->User_model->getVendor();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/vendor', $data);
        $this->load->view('templates/footer');
    }

    public function addUser()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');

            $name = $firstname . ' ' . $lastname;

            $params = array(
                'username' => $this->input->post('username'),
                'name' =>  $name,
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('roles'),
                'phone' => $this->input->post('phone'),
                'status' => $this->input->post('status'),
                'group_id' => (int) $_SESSION['group_id']
            );
            // var_dump($params);
            // die();
            $this->User_model->addUser($params);
            redirect('user/index');
        }
    }

    public function addVendor()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'name' =>  $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
            );
            $this->User_model->addVendor($params);
            redirect('user/vendor_index');
        }
    }

    public function editUser()
    {
        $user_id = $this->input->post('user_id');
        $firstname = $this->input->post('first_name');
        $lastname = $this->input->post('last_name');

        $name = $firstname . ' ' . $lastname;

        $params = array(
            'username' => $this->input->post('username'),
            'name' =>  $name,
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('roles'),
            'phone' => $this->input->post('phone'),
            'status' => $this->input->post('status')
        );
        // var_dump($params);
        // die();
        $this->db->where("id", $user_id);
        $this->db->update('user', $params);
        redirect("user/index");
    }

    public function activeUser($id)
    {
        $active = "A";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('user', $params);
        redirect("user/index");
    }

    public function removeUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('user', $params);
        redirect("user/index");
    }

    public function deleteUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->delete('user');
        redirect("user/index");
    }
}
