<?php

class calculator_logs extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function store_logs($data)
	{
		$this->db->insert('calculator_logs', $data);
	}
}
