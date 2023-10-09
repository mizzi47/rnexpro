<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dailylog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['latestdailylog']  = $this->Dashboard_model->getLatestDailylog();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dailylog/dailyloglist', $data);
		$this->load->view('templates/footer');
	}

	public function attachment($job_id, $dailylog_id)
	{
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog'] = $this->db->get('dailylog')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog_files'] = $this->db->get('dailylog_files')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog_files_description'] = $this->db->get('dailylog_files_description')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$this->db->where('description_id IS NULL');
		$data['dailylog_files_old'] = $this->db->get('dailylog_files')->result_array();
		$data['dailylog_id'] = $dailylog_id;
		$data['job_id'] = $job_id;

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dailylog/attachment', $data);
		$this->load->view('templates/footer');
	}

	public function view($job_id, $dailylog_id)
	{
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog'] = $this->db->get('dailylog')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog_files'] = $this->db->get('dailylog_files')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$data['dailylog_files_description'] = $this->db->get('dailylog_files_description')->result_array();
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$this->db->where('description_id IS NULL');
		$data['dailylog_files_old'] = $this->db->get('dailylog_files')->result_array();
		$data['dailylog_id'] = $dailylog_id;
		$data['job_id'] = $job_id;
		$data['getJobName']  = $this->Dashboard_model->getJobName();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dailylog/dailylog_view', $data);
		$this->load->view('templates/footer');
	}

	////daily logs data
	function getDailyLog_Web()
	{
		$job_id = $_POST['job_id'];
		$this->db->where('job_id', $job_id);
		$data = $this->db->get('dailylog')->result_array();
		echo json_encode($data);
	}

	function addDailyLog_Web()
	{
		$user_id = $this->input->cookie('userid');
		$job_id = (int) $this->uri->segment(3);
		$params = array(
			"logdate" => $_POST['logdate'],
			"logdate_created" => date("d/m/Y"),
			"update" => $_POST['update'],
			"pending" => $_POST['pending'],
			"issue" => $_POST['issue'],
			"info" => $_POST['info'],
			"scope" => implode("|", $_POST['scope']),
			"job_id" => $job_id,
			"user_id" => 13,
		);
		$this->db->trans_start();
		$this->db->insert('dailylog', $params);
		$dailylog_id = $this->db->insert_id();
		$params = array(
			"description_name" => $_POST['description'],
			"dailylog_id" => $dailylog_id,
		);
		$this->db->insert('dailylog_files_description', $params);
		$inserted_id = $this->db->insert_id();
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = './uploads';
		if (!empty($_FILES)) {
			for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
				$newFileName = 'FDL' . $dailylog_id . '_' . $inserted_id . '_' . $_FILES['file']['name'][$i];
				$tempFile = $_FILES['file']['tmp_name'][$i];

				$targetPath = $storeFolder . $ds;

				$targetFile =  $targetPath . $newFileName;

				move_uploaded_file($tempFile, $targetFile);
				$params = array(
					"file_name" => $newFileName,
					"file_extension" => $_FILES['file']['type'][$i],
					"dailylog_id" => $dailylog_id,
					"description_id" => $inserted_id,
				);
				$this->db->insert('dailylog_files', $params);
			};
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('msg-fail-add', 'Daily log update failed.');
			echo $job_id;
			//redirect('dailylog/dailylog_index/' . $job_id);
		} else {
			$this->db->trans_commit();
			$this->session->set_flashdata('msg-success-add', 'Daily log has been updated.');
			echo $job_id;
			//redirect('dailylog/dailylog_index/' . $job_id);
		}
	}

	function deleteDailyLog_Web()
	{
		$dailylog_id = $_POST['dailylog_id'];
		$this->db->where('dailylog_id', $dailylog_id);
		$this->db->delete('dailylog');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('msg-success-add', 'Daily log has been deleted.');
			redirect('dailylog/index');
		} else {
			$this->session->set_flashdata('msg-fail-add', 'Delete daily log failed.');
			redirect('dailylog/index');
		}
	}

	function getDailyLog()
	{
		$jsonData = file_get_contents('php://input', true);
		$objectData = json_decode($jsonData);
		$data = (array) $objectData;
		$this->db->where('job_id', $data['job_id']);
		$data = $this->db->get('dailylog')->result_array();
		echo json_encode($data);
	}

	function addDailyLog()
	{
		$jsonData = file_get_contents('php://input', true);
		$objectData = json_decode($jsonData);
		$data = (array) $objectData;
		$params = array(
			"logdate" => $data['logdate'],
			"logdate_created" => date("Y/m/d"),
			"update" => $data['update'],
			"pending" => $data['pending'],
			"issue" => $data['issue'],
			"scope" => implode("|", $data['scope']),
			"job_id" => (int)$data['job_id'],
			"user_id" => (int)$data['user_id'],
		);
		$this->db->insert('dailylog', $params);
		$inserted_id = $this->db->insert_id();
		echo $inserted_id;
	}

	//// daily logs files section
	function getDailyLogFiles_Web()
	{
		$dailylog_id = $_POST['dailylog_id'];
		$this->db->select('file_name');
		$this->db->where('dailylog_id', (int) $dailylog_id);
		$datadailylog_files = $this->db->get('dailylog_files')->result_array();
		echo json_encode($datadailylog_files);
	}

	public function dropzoneUpload()
	{
		$dailylog_id = (int) $this->uri->segment(4);
		$job_id = (int) $this->uri->segment(3);
		$params = array(
			"description_name" => $_POST['description'],
			"dailylog_id" => $dailylog_id,
		);
		$this->db->insert('dailylog_files_description', $params);
		$inserted_id = $this->db->insert_id();
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = './uploads';
		if (!empty($_FILES)) {
			for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
				$newFileName = 'FDL' . $dailylog_id . '_' . $inserted_id . '_' . $_FILES['file']['name'][$i];
				$tempFile = $_FILES['file']['tmp_name'][$i];

				$targetPath = $storeFolder . $ds;

				$targetFile =  $targetPath . $newFileName;

				move_uploaded_file($tempFile, $targetFile);
				$params = array(
					"file_name" => $newFileName,
					"file_extension" => $_FILES['file']['type'][$i],
					"dailylog_id" => $dailylog_id,
					"description_id" => $inserted_id,
				);
				$this->db->insert('dailylog_files', $params);
			}
			$this->session->set_flashdata('msg-success-add', 'Attachment has been updated.');
			$paramsResponse = array(
				"dailylog_id" => $dailylog_id,
					"job_id" => $job_id,
			);
			echo json_encode($paramsResponse);
		} else {
			$this->session->set_flashdata('msg-fail-add', 'Attachment update failed.');
			$paramsResponse = array(
				"dailylog_id" => $dailylog_id,
					"job_id" => $job_id,
			);
			echo json_encode($paramsResponse);
		}
	}

	function getDailyLogFiles()
	{
		$jsonData = file_get_contents('php://input', true);
		$objectData = json_decode($jsonData);
		$data = (array) $objectData;
		$this->db->select('file_name');
		$this->db->where('dailylog_id', $data['dailylog_id']);
		$datadailylog_files = $this->db->get('dailylog_files')->result_array();
		echo json_encode($datadailylog_files);
	}

	function addDailyLogFiles()
	{
		$jsonData = file_get_contents('php://input', true);
		$objectData = json_decode($jsonData);
		$data = (array) $objectData;
		$params = array(
			"file_name" => $data['file_name'],
			"file_extension" => $data['file_extension'],
			"dailylog_id" => $data['dailylog_id'],
		);
		$this->db->insert('dailylog_files', $params);
		$inserted_id = $this->db->insert_id();
		echo $inserted_id;
	}

	function getDailyLogLatestDetails()
	{
		$selected_dailylog_id = $_POST['selected_dailylog_id'];
		$this->db->where('dailylog_id', $selected_dailylog_id);
		$data = $this->db->get('dailylog')->result_array();
		echo json_encode($data[0]);
	}

	function viewBy()
	{
		$dailylog_id = $_POST['dailylog_id'];
		$this->db->select('view_by');
		$this->db->where('dailylog_id', $dailylog_id);
		$data = $this->db->get('dailylog')->result_array();
		if ($data[0]['view_by'] == NULL) {
			$this->db->set('view_by', $this->input->cookie('userid'));
			$this->db->where('dailylog_id', (int) $dailylog_id);
			$this->db->update('dailylog');
			echo 'from null update done';
		} else {
			$allViewed = explode("|", $data[0]['view_by']);
			echo json_encode($allViewed);
			if (in_array($this->input->cookie('userid'), $allViewed, FALSE)) {
				array_push($allViewed, $this->input->cookie('name'));
				echo '  after  ';
				echo json_encode($allViewed);
				$allViewedStr = implode('|', $allViewed);
				$this->db->set('view_by', $allViewedStr);
				$this->db->where('dailylog_id', (int) $dailylog_id);
				$this->db->update('dailylog');
			}
			// echo 'from existing update done';
		}
	}

	//temp
	function getJob()
	{
		$user_id = file_get_contents('php://input', true);
		$this->db->like('access', $user_id . '|', 'after');
		$this->db->or_like('access', '|' . $user_id . '|', 'both');
		$this->db->or_like('access', '|' . $user_id, 'before');
		$data = $this->db->get('job')->result_array();
		echo json_encode($data);
	}
	function getJob_Web()
	{
		$user_role = $this->input->cookie('role');
		$user_id = $this->input->cookie('userid');
		if ($user_role == 1) {
			$this->db->where('status', 'In-progress');
			$data = $this->db->get('job')->result_array();
		} else {
			$this->db->where('status', 'In-progress');
			$this->db->like('access', $user_id . '|', 'after');
			$this->db->or_like('access', '|' . $user_id . '|', 'both');
			$this->db->or_like('access', '|' . $user_id, 'before');
			$data = $this->db->get('job')->result_array();
		}
		echo json_encode($data);
	}

	function dailylog_index()
	{
		$data['getJobName']  = $this->Dashboard_model->getJobName();
		$data['getUserName']  = $this->Dashboard_model->getUserName();
		$this->db->where('job_id', (int) $this->uri->segment(3));
		$data['dailylog'] = $this->db->get('dailylog')->result_array();
		$data['job_id'] = (int) $this->uri->segment(3);
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dailylog/dailylog_index', $data);
		$this->load->view('templates/footer');
	}

	function dailylog_add_index()
	{
		$data['getJobName']  = $this->Dashboard_model->getJobName();
		$data['job_id'] = (int) $this->uri->segment(3);
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dailylog/dailylog_add_index', $data);
		$this->load->view('templates/footer');
	}
}
