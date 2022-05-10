<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->library("main_libraries");
		list_menu();
		is_login("home");
	}
	public function index()
	{
		$this->main_libraries->innerview("home",[]);
	}
}
