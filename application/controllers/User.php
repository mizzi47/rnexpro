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

    public function client()
    {
        $data['client'] = $this->User_model->getclient();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('user/client', $data);
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

    public function addclient()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');

            $name = $firstname . ' ' . $lastname;

            $params = array(
                'client_username' => $this->input->post('client_username'),
                'client_name' =>  $this->input->post('client_name'),
                'ref_icnum' => $this->input->post('ref_icnum'),
                'client_password' => $this->input->post('client_password'),
                'client_email' => $this->input->post('client_email'),
                'phone_num' => $this->input->post('phone_num'),
                // 'role' => $this->input->post('roles'),
                'client_status' => $this->input->post('client_status'),
                'client_address' => $this->input->post('client_address'),
                'group_id' => (int) $_SESSION['group_id']
            );
            // var_dump($params);
            // die();
            $this->User_model->addclient($params);
            redirect('user/client');
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
        $this->db->update('maincon_user', $params);
        redirect("user/index");
    }

    public function activeUser($id)
    {
        $active = "A";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('maincon_user', $params);
        redirect("user/index");
    }

    public function removeUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->update('maincon_user', $params);
        redirect("user/index");
    }

    public function deleteUser($id)
    {
        $active = "B";

        $params = array(
            'status' => $active
        );
        $this->db->where("id", $id);
        $this->db->delete('maincon_user');
        redirect("user/index");
    }
}
