<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('calculator');
	}

	public function store_logs()
	{
		$this->load->model('calculator_logs');
		$postData = $this->input->post();

		$data = array(
			'first_number' => $postData['first_number'],
			'sec_number' => $postData['sec_number'],
			'action' => $postData['action'],
			'total' => $postData['result'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);

		if (!empty($data['total']) || $data['total'] === '0') {
			$this->calculator_logs->store_logs($data);
		}
	}
}
