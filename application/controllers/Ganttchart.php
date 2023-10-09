<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganttchart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
        $this->load->model('Job_model');
        $this->load->library('session');
    }
    public function index()
    {
        $data['job'] = $this->Job_model->getJob();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ganttchart/job_ganttchart', $data);
        $this->load->view('templates/footer');
    }

    public function view_gantt($job_id)
    {
        $data['job_id'] = $job_id;
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ganttchart/ganttchart', $data);
        $this->load->view('templates/footer');
    }

    public function view_gantt_download($job_id)
    {
        // $data['allSchedule'] = $this->Schedule_model->getScheduleById($job_id);
        // $this->load->view('templates/header');
        // $this->load->view('ganttchart/download_ganttchart', $data);
        // $this->load->view('templates/footer');
        $doc = new DomDocument("1.0", "UTF-8");
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        $doc->load(base_url() .'/assets/gantt_template.xml');
        $taskMainTag = $doc->getElementsByTagName("Tasks")->item(0);
        $occ = $doc->createElement('task');
        $occ = $taskMainTag->appendChild($occ);
        // $signed_values = array("name" => $r_name, "age" => $r_age, "number" => $r_number, "team" => $r_team, "bike" => $r_bike);

        // $occ = $doc->createElement('rider');
        // $occ = $catTag->appendChild($occ);

        // foreach ($signed_values as $fieldname => $fieldvalue) {
        //     $child = $doc->createElement($fieldname);
        //     $child = $occ->appendChild($child);
        //     $value = $doc->createTextNode($fieldvalue);
        //     $value = $child->appendChild($value);
        // }
        echo $doc->saveXML();
    }

    public function getGantt()
    {
        $job_id = $_POST['job_id'];
        $data['allSchedule'] = $this->Schedule_model->getScheduleById($job_id);
        echo json_encode($data['allSchedule']);
    }

    public function updateGantt()
    {
        $schedule_id =  (int) $_POST['schedule_id'];
        $data = array(
            'start' => $_POST['start'],
            'end' => $_POST['end'],
        );
        $response = $this->Schedule_model->editScheduleInGanttChart($data, $schedule_id);
        echo $response;
    }
}
