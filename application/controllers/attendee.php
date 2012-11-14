<?php

class Attendee extends CI_Controller {
	function __construct() {
		parent::__construct();

		## Initialise Database
		$this->load->database(); // This is not really required because Active Record is used
		$result = $this->db->query('select email from attendee');
		if($result == null)
		{
			$createTableQuery = 'CREATE TABLE attendee(';
			$createTableQuery .= 'name varchar(30),';
			$createTableQuery .= 'email varchar(30) PRIMARY KEY);';
			$result = $this->db->query($createTableQuery); // $result == 1 (on success)
		}
	}

	function index() {
		$data['pageTitle'] = 'Welcome';
		$data['heading'] = 'Welcome to the Conference Registration System';
		$this->load->view('welcome', $data);
	}

	function register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[12]|xss_clean|matches[name]');

		if ($this->form_validation->run() == false) {
			$data['pageTitle'] = 'Welcome';
			$data['heading'] = 'Welcome to the Conference Registration System';
			$this->load->view('welcome', $data);
		} else {
			$this->load->model('attendee_model');
			$this->attendee_model->addAttendee($this->input->post('name'), $this->input->post('email'));

			$data['pageTitle'] = 'Successful Registration';
			$data['heading'] = 'Successful Registration';
			$data['message'] = '"'.$this->input->post('name').'" is now registered :)';
			$this->load->view('welcome', $data);
		}
	}

	function admin() {
		$data['pageTitle'] = 'Successful Registration';
		$data['heading'] = 'Successful Registration';
		$data['message'] = '"'.$this->input->post('name').'" is now registered :)';
		$this->load->view('welcome', $data);	
	}
}

?>