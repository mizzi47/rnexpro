<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->db->save_queries = false;
		$this->load->model('Job_model');
	}

	public function index()
	{
		$data['user'] = $this->Job_model->getUser();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/job', $data);
		$this->load->view('templates/footer');
	}

	public function jobs()
	{
		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['user'] = $this->Job_model->getUser();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/user', $data);
		$this->load->view('templates/footer');
	}
	public function create_job()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$params = array(
				'job_name' => $this->input->post('job_name'),
				'job_prefix' => $this->input->post('job_prefix'),
				'status' => $this->input->post('status'),
				'job_type' => $this->input->post('type'),
				'contract' => $this->input->post('price'),
				'job_group' => $this->input->post('group'),
				'manager' => $this->input->post('manager'),
				'address' => $this->input->post('address'),
				'meters' => $this->input->post('meters'),
				'city' => $this->input->post('city'),
				'permit' => $this->input->post('permit'),
				'postcode' => $this->input->post('postcode'),
				'lot' => $this->input->post('lot')
			);
			// var_dump($params);
			// die();
			$job_id = $this->Job_model->addJob($params);
			redirect('jobs/owner/' . $job_id);
		}
	}

	public function owner()
	{

		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['user'] = $this->Job_model->getUser();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/owner', $data);
		$this->load->view('templates/footer');
	}

	public function create_owner()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$job_id = $this->input->post('job_id');
			$params = array(
				'owner' => $this->input->post('owner_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email')
			);
			// var_dump($params);
			// die();
			$this->db->where('job_id', $job_id);
			$this->db->update('job', $params);
			redirect('jobs/user/' . $job_id);
		}
	}

	public function user()
	{
		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['user'] = $this->Job_model->getUser();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/user', $data);
		$this->load->view('templates/footer');
	}

	public function create_internal()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$job_id = $this->input->post('job_id');
			foreach ($this->input->post('access') as $access) {
				$akses .= $access . '|';
			}
			$params = array(
				'access' => $akses
			);
			// var_dump($params);
			// die();
			$this->db->where('job_id', $job_id);
			$this->db->update('job', $params);
			redirect('jobs/all/' . $job_id);
		}
	}

	public function all()
	{
		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['user'] = $this->Job_model->getUser();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/all', $data);
		$this->load->view('templates/footer');
	}

	public function update_job_index()
	{
		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['user'] = $this->Job_model->getUser();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/update_view/index', $data);
		$this->load->view('templates/footer');
	}

	public function update_job()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$job_id = $this->input->post('job_id');
			$params = array(
				'job_name' => $this->input->post('job_name'),
				'job_prefix' => $this->input->post('job_prefix'),
				'status' => $this->input->post('status'),
				'job_type' => $this->input->post('type'),
				'contract' => $this->input->post('price'),
				'job_group' => $this->input->post('group'),
				'manager' => $this->input->post('manager'),
				'address' => $this->input->post('address'),
				'meters' => $this->input->post('meters'),
				'city' => $this->input->post('city'),
				'permit' => $this->input->post('permit'),
				'postcode' => $this->input->post('postcode'),
				'lot' => $this->input->post('lot')
			);
			$this->db->where('job_id', $job_id);
			$this->db->update('job', $params);
			redirect('jobs/update_job_index/' . $job_id);
		}
	}

	public function update_owner()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$job_id = $this->input->post('job_id');
			$params = array(
				'owner' => $this->input->post('owner_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email')
			);
			// var_dump($params);
			// die();
			$this->db->where('job_id', $job_id);
			$this->db->update('job', $params);
			redirect('jobs/update_job_index/' . $job_id);
		}
	}

	public function update_internal()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$job_id = $this->input->post('job_id');
			foreach ($this->input->post('access') as $access) {
				$akses .= $access . '|';
			}
			$params = array(
				'access' => $akses
			);
			// var_dump($params);
			// die();
			$this->db->where('job_id', $job_id);
			$this->db->update('job', $params);
			redirect('jobs/update_job_index/' . $job_id);
		}
	}

	public function summary()
	{
		$data['jobs'] = $this->Job_model->getJobs($this->uri->segment(3));
		$data['internal'] = $this->Job_model->getInternal();
		$this->db->where('pj_jobid', (int) $this->uri->segment(3));
		$data['projectfiles'] = $this->db->get('projectfiles')->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/summary', $data);
		$this->load->view('templates/footer');
	}

	public function view()
	{
		$data['job'] = $this->Job_model->getJob();
		$data['internal'] = $this->Job_model->getInternal();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('jobs/view', $data);
		$this->load->view('templates/footer');
	}

	public function close($id)
	{
		$active = "Completed";

		$params = array(
			'status' => $active
		);
		$this->db->where("job_id", $id);
		$this->db->update('job', $params);
		$this->session->set_flashdata('msg-success-add', 'Job status updated.');
		redirect("jobs/view");
	}

	public function open($id)
	{
		$active = "In-progress";

		$params = array(
			'status' => $active
		);
		$this->db->where("job_id", $id);
		$this->db->update('job', $params);
		$this->session->set_flashdata('msg-success-add', 'Job status updated.');
		redirect("jobs/view");
	}

	public function delete($id)
	{
		$this->db->trans_start();
		$this->db->where("job_id", $id);
		$this->db->delete('job');
		$this->db->trans_complete();
		$this->db->trans_start();
		$this->db->where("job_id", $id);
		$this->db->delete('dailylog');
		$this->db->trans_complete();
		$this->session->set_flashdata('msg-warning', 'Job has been deleted.');
		redirect("jobs/view");
	}

	public function uploadProjectFiles()
	{
		// var_dump($_FILES['file']['type'][0]);
		// var_dump($_POST['job_id']);
		// die();
		$job_id = $_POST['job_id'];
		$ds = DIRECTORY_SEPARATOR;
		$storeFolder = './uploads';
		if (!empty($_FILES)) {
			for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
				$newFileName = 'FP' . $job_id . '_' . $_FILES['file']['name'][$i];
				$tempFile = $_FILES['file']['tmp_name'][$i];

				$targetPath = $storeFolder . $ds;

				$targetFile =  $targetPath . $newFileName;

				move_uploaded_file($tempFile, $targetFile);
				$params = array(
					"pj_filename" => $newFileName,
					"pj_extension" => $_FILES['file']['type'][$i],
					"pj_jobid" => $job_id
				);
				$this->db->insert('projectfiles', $params);
			}
			$this->session->set_flashdata('msg-success-add', 'Attachment has been updated.');
			echo $job_id;
		} else {
			$this->session->set_flashdata('msg-fail-add', 'Attachment update failed.');
			echo $job_id;
		}
	}

	public function setScheduleColor()
	{
		$job_id = (int) $_POST['job_id'];
		$params = array(
			'schedulecolor' => $_POST['color_hex'],
		);
		// var_dump($params);
		// die();
		$this->db->where('job_id', $job_id);
		$this->db->update('job', $params);
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('msg-success-add', 'Schedule color successfully updated.');
			echo 'success';
		} else {
			$this->session->set_flashdata('msg-fail-add', 'Schedule color update failed.');
			echo 'fail';
		}
	}
}
