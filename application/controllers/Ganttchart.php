<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ganttchart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
        $this->load->model('Job_model');
        $this->load->library('session');
        if (!isset($_SESSION['userid'])) {
            $this->session->set_flashdata('msg-warning', 'Please login');
            redirect('');
        }
    }
    public function index()
    {
        $data['job'] = $this->Job_model->getJobsInprogress();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ganttchart/job_ganttchart', $data);
        $this->load->view('templates/footer');
    }

    public function view_gantt($job_id)
    {
        $data['job_id'] = $job_id;
        $data['selected_job'] = $this->Job_model->getJob($job_id);
        $data['checkScheduleIfExist'] = $this->Schedule_model->checkScheduleIfExist($job_id);
        if (count($data['checkScheduleIfExist']) == 0) {
            $this->session->set_flashdata('msg-warning', 'No schedule found, please insert at least one');
            redirect('ganttchart');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('ganttchart/ganttchart', $data);
            $this->load->view('templates/footer');
        }
    }

    public function view_gantt_download($job_id)
    {
        $dataschedule = $this->Schedule_model->getScheduleById((int)$job_id);
        // $this->load->view('templates/header');
        // $this->load->view('ganttchart/download_ganttchart', $data);
        // $this->load->view('templates/footer');
        $dom = new DomDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->load(base_url() . '/assets/gantt_template.xml');
        $tasks = $dom->documentElement->getElementsByTagName('Tasks')[0];
        $taskdom = new DOMDocument();
        $taskdom->load(base_url() . '/assets/task_template.xml');
        $task = $taskdom->getElementsByTagName('Task')[0];
        $count = 1;
        foreach ($dataschedule as $ds) {
            $task->getElementsByTagName('UID')[0]->nodeValue = $count;
            $task->getElementsByTagName('ID')[0]->nodeValue = $count;
            $task->getElementsByTagName('Name')[0]->nodeValue = $ds['title'];
            $task->getElementsByTagName('CreateDate')[0]->nodeValue = $ds['start'];
            $task->getElementsByTagName('Start')[0]->nodeValue = $ds['start'];
            $task->getElementsByTagName('Finish')[0]->nodeValue = $ds['end'];
            $date1 = strtotime($ds['start']);
            $date2 = strtotime($ds['end']);
            $diff = $date2 - $date1;
            $days = floor($diff / (60 * 60 * 24));
            $task->getElementsByTagName('Duration')[0]->nodeValue = 'PT' . $days * 8 . 'H0M0S';
            $tasks->appendChild($dom->importNode($task, true));
            $count++;
        }
        header('Content-type: "text/xml"; Charset="utf8"');
        header('Content-disposition: attachment; filename="data.xml"');
        echo $dom->SaveXML();
    }

    public function getGantt()
    {
        $job_id = $_POST['job_id'];
        $data['allSchedule'] = $this->Schedule_model->getScheduleById($job_id);
        echo json_encode($data['allSchedule']);
    }

    public function spreadSheet($job_id)
    {
        $dataschedule = $this->Schedule_model->getScheduleById((int) $job_id);
        $this->db->where('job_id', (int)$job_id);
        $dataJob = $this->db->get('job')->result_array();
        $inputFileName = './assets/gctemplate.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $count = 8;
        $sheetCount = 1;
        $dateStart = new DateTime($dataJob[0]['start_date']);
        $formattedDateStart = $dateStart->format('m/d/Y');
        $activeWorksheet->setCellValue('A1', $dataJob[0]['job_name']);
        $activeWorksheet->setCellValue('A2', $dataJob[0]['owner']);
        $activeWorksheet->setCellValue('C4', $formattedDateStart);
        foreach ($dataschedule as $sch) {
            $dts = new DateTime($sch['start']);
            $formattedS = $dts->format('m/d/Y');
            $dte = new DateTime($sch['end']);
            $formattedE = $dte->format('m/d/Y');
            $activeWorksheet->setCellValue('A' . $count, $sheetCount);
            $activeWorksheet->setCellValue('B' . $count, $sch['title']);
            $activeWorksheet->setCellValue('E' . $count, $formattedS);
            $activeWorksheet->setCellValue('F' . $count, $formattedE);
            $count++;
            $sheetCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->setPreCalculateFormulas(false);
        // $writer->save('GanntChart_' . $dataschedule[0]['job_name'] . '.xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $dataJob[0]['job_name'] . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
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
