<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->library("main_libraries");
		$this->load->model("siswamodels");
		$this->load->model("hasiltesmodels");
		$this->load->model("soaltesmodels");
		$this->load->model("angkatanmodels");
	}
	public function index()
	{
		is_login("home");
		$this->main_libraries->innerview("home", []);
	}
	public function landing_siswa()
	{
		$siswa_id = $this->session->userdata("id");
		$hasilTes = $this->hasiltesmodels->get(["id_siswa" => $siswa_id]);
		if ($hasilTes == null) {
			redirect(base_url("home/tes_akademik"));
			return false;
		}
		// var_dump($siswa);
		echo json_encode($hasilTes);
	}
	public function tes_akademik()
	{
		$siswa_id = $this->session->userdata("id");
		$data['siswa'] = $this->siswamodels->get($siswa_id);
		$data['soal'] = $this->soaltesmodels->get_all(["s.tingkatan"=>$data['siswa']->tingkatan]);
		$data['angkatan'] = $this->angkatanmodels->get($data['siswa']->angkatan_id);
		$this->main_libraries->innerview("tes_akademik", $data, true);
	}
	public function tes_akademik_submit()
	{
		$siswa_id = $this->session->userdata("id");
		$item = $this->input->post("item");
		foreach ($item as  $val) {
			$this->hasiltesmodels->create([
				"id_siswa" => $siswa_id,
				"id_soal" => $val['soal'],
				"jawaban" => isset($val['jawaban'])?$val['jawaban']:null,
			]);
		}
		echo json_encode($item);
	}
}
