<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Schedule_model');
        $this->load->library('session');
        if (!isset($_SESSION['userid'])) {
			$this->session->set_flashdata('msg-warning', 'Please login');
            redirect('');
        }
	}
    public function index()
    {
        $data['job'] = $this->db->where('status', 'In-progress')->get('job')->result_array();
        $this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('schedule/schedule', $data);
        $this->load->view('schedule/schedule_js');
		$this->load->view('templates/footer');
    }

    public function getSchedule(){
        $data['allSchedule'] = $this->Schedule_model->getSchedule();
        echo json_encode($data['allSchedule']);
    }

    public function addSchedule()
    {
        $jsonSchedule = $_POST['jsonSchedule'];
        $objectSchedule = json_decode($jsonSchedule);
        $selected_job_id = $_POST['selected_job_id'];
        $data = (array) $objectSchedule;
		$this->Schedule_model->addSchedule($data, $selected_job_id);
    }

    public function removeSchedule()
    {
        $schedule_id = $_POST['schedule_id'];
        $this->Schedule_model->removeSchedule($schedule_id);
    }

    public function editSchedule()
    {
        $schedule_id =  (int) $_POST['schedule_id'];
        $data = array(
            'title' => $_POST['title'],
            'body' => $_POST['body'],
        );
        $this->Schedule_model->editSchedule($data, $schedule_id);
    }

    public function ganttchart()
    {
        $this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('schedule/ganttchart');
		$this->load->view('templates/footer');
    }
}