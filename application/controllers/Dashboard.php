<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->db->save_queries = false;
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data['incomingjob'] = $this->Dashboard_model->countJobIncoming();
		$data['inprogressjob'] = $this->Dashboard_model->countJobInprogress();
		$data['completedjob'] = $this->Dashboard_model->countJobCompleted();
		$data['totaldailylog']  = $this->db->count_all_results('dailylog');
		$data['latestdailylog']  = $this->Dashboard_model->getLatestDailylog();
		$data['getJobName']  = $this->Dashboard_model->getJobName();
		$data['getUserName']  = $this->Dashboard_model->getUserName();
		$data['totaluser']  = $this->db->count_all_results('user');
		// $data['s1']  = $this->db->like('scope', '1', 'both')->count_all_results('dailylog');
		// $data['s2']  = $this->db->like('scope', '1', 'both')->count_all_results('dailylog');
		// $data['s3']  = $this->db->like('scope', '2', 'both')->count_all_results('dailylog');
		// $data['s4']  = $this->db->like('scope', '3', 'both')->count_all_results('dailylog');
		// $data['s5']  = $this->db->like('scope', '4', 'both')->count_all_results('dailylog');
		// $data['s6']  = $this->db->like('scope', '5', 'both')->count_all_results('dailylog');
		// $data['s7']  = $this->db->like('scope', '6', 'both')->count_all_results('dailylog');
		// $data['s8']  = $this->db->like('scope', '7', 'both')->count_all_results('dailylog');
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
}
