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
		$this->load->model("nilaitesmodels");
		$this->load->model("angkatanmodels");
		$this->load->model("materimodels");
		$this->load->model("pembelajaranmodels");
	}
	public function index()
	{
		is_login("home");
		$this->main_libraries->innerview("home", []);
	}
	public function landing_siswa()
	{
		$data["pembelajaran"] = $this->pembelajaranmodels->get_all();
		$siswa_id = $this->session->userdata("id");
		$hasilTes = $this->hasiltesmodels->get(["id_siswa" => $siswa_id]);
		if ($hasilTes == null) {
			redirect(base_url("home/tes_akademik"));
			return false;
		}
		$this->main_libraries->innerview("siswa/landing",$data);
	}
	public function tes_akademik()
	{
		$siswa_id = $this->session->userdata("id");
		$data['siswa'] = $this->siswamodels->get($siswa_id);
		$data['soal'] = $this->soaltesmodels->get_all(["s.tingkatan" => $data['siswa']->tingkatan]);
		$data['angkatan'] = $this->angkatanmodels->get($data['siswa']->angkatan_id);
		$this->main_libraries->innerview("tes_akademik", $data, true);
	}
	public function tes_akademik_submit()
	{
		$siswa_id = $this->session->userdata("id");
		$data['siswa'] = $this->siswamodels->get($siswa_id);
		$item = $this->input->post("item");
		foreach ($item as  $val) {
			$this->hasiltesmodels->create([
				"id_siswa" => $siswa_id,
				"id_soal" => $val['soal'],
				"jawaban" => isset($val['jawaban']) ? $val['jawaban'] : null,
			]);
		}

		$materi = $this->materimodels->get_all();
		foreach ($materi as $mval) {
			if ($mval->mtingkatan != $data['siswa']->tingkatan) {
				continue;
			}
			$soal = $this->soaltesmodels->get_all(["materi_id" => $mval->mid]);
			$total_nilai = 100;
			$nilai_per_soal = round($total_nilai / count($soal));
			$nilai = 0;
			foreach ($soal as $sv) {
				$dataHasil = $this->hasiltesmodels->get_all(["id_siswa" => $siswa_id, "id_soal" => $sv->sid]);
				if (count($dataHasil) > 0) {
					if ($dataHasil[0]->stpjawaban == $dataHasil[0]->stjawaban) {
						$nilai += $nilai_per_soal;
					}
				}
			}
			$this->nilaitesmodels->create([
				"siswa_id" => $siswa_id,
				"materi_id" => $mval->mid,
				"nilai" => $nilai,
				"materi" => $mval->mnama
			]);
		}
		$this->session->set_flashdata("message", "Tes Akademik berhasil disimpan");
		redirect(base_url("home/landing_siswa"));
	}
}
