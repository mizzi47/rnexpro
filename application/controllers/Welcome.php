<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function auth()
	{
		if (isset($_POST) && count($_POST) > 0) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->Login_model->login($username, $password);

			// var_dump($data[0]);
			// die();
			if ($data[0] != null) {
				if ($data[0]->status == 'A') {
					$sesdata = array(
						'userid' => $data[0]->id,
						'username' => $data[0]->username,
						'role' => $data[0]->role,
						'name' => $data[0]->name,
						'logged_in' => TRUE
					);
					setcookie("userid", $data[0]->id, time() + (86400 * 30));
					setcookie("role", $data[0]->role, time() + (86400 * 30));
					// var_dump($sesdata);
					// die();
					$this->session->set_userdata($sesdata);
					if (true) {
						redirect(base_url('dashboard'));
					} else {
						redirect(base_url(''));
					}
				} else {
					echo '<script type="text/javascript">
                        alert("This user is inactive");
                        window.location.href = "' . base_url('') . '";
                    </script>';
				}
			} else {
				echo '<script type="text/javascript">
				        alert("Wrong Username or Password");
				        window.location.href = "' . base_url('') . '";
				    </script>';
				redirect(base_url('login'));
			}
		} else {
			$this->index();
		}
	}

	public function register_user()
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
				'role' => 4,
				'phone' => $this->input->post('phone'),
				'status' => 'A'
			);
			// var_dump($params);
			// die();
			$insertId = $this->User_model->addUser($params);
			if($insertId == null){
				$this->session->set_flashdata('msg-warning', 'Registration fail');
				redirect('welcome/register');
			}else{
				$this->session->set_flashdata('msg-success', 'Registration Success');
				redirect('welcome/index');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

	public function auth_mobile()
	{
		$jsonData = file_get_contents('php://input', true);
		$objectData = json_decode($jsonData);
		$data = (array) $objectData;
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$user = $this->db->get('user')->result_array();
		echo json_encode($user);
	}
}
