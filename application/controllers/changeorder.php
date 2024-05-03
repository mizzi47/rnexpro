<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changeorder extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Changeorder_model', 'model');
        $this->load->model('Job_model', 'Job_model');
        $this->load->library('session');
        if (!isset($_SESSION['userid'])) {
            $this->session->set_flashdata('msg-warning', 'Please login');
            redirect('');
        }
    }
    public function index()
    {
        $data['job_id'] = (int) $this->uri->segment(3);
        $data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('changeorder/index', $data);
        $this->load->view('templates/footer');
    }

    public function co_add_index()
    {
        $data['job_id'] = (int) $this->uri->segment(3);
        $data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('changeorder/co_add_index', $data);
        $this->load->view('templates/footer');
    }

    public function getCo()
    {
        $job_id = $_POST['job_id'];
        $data['changeorder'] = $this->model->getCo((int)$job_id);
        echo json_encode($data['changeorder']);
    }

    public function deleteCo()
    {
        $co_id = $this->uri->segment(4);
        $data['changeorder'] = $this->model->deleteCo((int)$co_id);
    }

    public function submitCo()
    {
        $params = $_POST;
        $insertId = $this->model->addCo($params);
        if($insertId == null){
            echo 'false';
        }else{
            echo 'true';
        }
    }

    public function generateCo()
    {
        $job_id = $_POST['job_id'];
        $id = $_POST['id'];
        $data['changeorder'] = $this->model->getCoById((int)$id);
        $data['changeorder_item'] = $this->model->getCoItemById((int)$id);
        $data['jobs'] = $this->Job_model->getJobs((int)$job_id);
        echo json_encode($data);
    }
}
