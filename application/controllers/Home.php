<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		// $this->load->model("roleaksesmodels", "ram");
		// $this->load->model("produkmodels", "pm");
		// $this->load->model("trstokmasukmodels", "tsm");
		// $this->load->model("trstokkeluarmodels", "tsk");
		$this->load->library("main_libraries");
		is_login("home");
	}
	public function index()
	{
		$this->main_libraries->innerview("home",[]);
	}
}
