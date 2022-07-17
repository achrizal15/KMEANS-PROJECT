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
		$data["siswaSD"] = $this->siswamodels->get_all(['s.tingkatan' => "SD"]);
		$data["siswaSMP"] = $this->siswamodels->get_all(['s.tingkatan' => "SMP"]);
		$data["siswaSMA"] = $this->siswamodels->get_all(['s.tingkatan' => "SMA"]);
		$angkatan = $this->angkatanmodels->get_last();
		if ($angkatan->akhir_periode <= date("Y-m-d")) {
			$data_angkatan = [
				"akhir_periode" => date("Y-m-d", strtotime("+6 month")),
				"awal_periode" => date("Y-m-d"),
				"akhir_pendaftaran" => date("Y-m-d", strtotime("+6 day")),
				"awal_pendaftaran" => date("Y-m-d"),
				"angkatan" => date("Y M"), "status" => "pendaftaran"
			];
			$this->angkatanmodels->create($data_angkatan);
			$this->angkatanmodels->perbarui($angkatan->id, ["status" => 'nonaktif']);
			$this->angkatanmodels->ahir_angkatan($angkatan->id);
		}

		$this->main_libraries->innerview("home", $data);
	}
	public function landing_siswa()
	{
		is_siswa();
		$siswa_id = $this->session->userdata("id");
		$siswa = $this->siswamodels->get($siswa_id);
		$data["pembelajaran"] = $this->pembelajaranmodels->get_all(['p.kelas_id' => $siswa->kelas_id]);
		$data['hasiltes'] = $this->nilaitesmodels->get_all(["n.siswa_id" => $siswa_id]);
		if ($data['hasiltes'] == null) {
			redirect(base_url("home/tes_akademik"));
			return false;
		}
		$this->main_libraries->innerview("siswa/landing", $data);
	}
	public function tes_akademik()
	{
		is_siswa();
		$siswa_id = $this->session->userdata("id");
		$data['siswa'] = $this->siswamodels->get($siswa_id);
		$data['soal'] = $this->soaltesmodels->get_all(["s.tingkatan" => $data['siswa']->tingkatan]);
		$data['angkatan'] = $this->angkatanmodels->get($data['siswa']->angkatan_id);
		$this->main_libraries->innerview("tes_akademik", $data, true);
	}
	public function tes_akademik_submit()
	{
		is_siswa();
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
