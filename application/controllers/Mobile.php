<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	public function index()
	{
		echo "";
	}
	public function privacy_policy()
	{
		$this->load->view('privacy-policy',[]);
	}
	public function term_condition()
	{
		$this->load->view('term-condition',[]);
	}
	public function tm_medan($p)
	{
		$this->load->view('tm_'.$p,[]);
	}
}