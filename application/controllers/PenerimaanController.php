<?php


class PenerimaanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("siswamodels", "sm");
      $this->load->model("angkatanmodels", "am");
      $this->load->model("kelasmodels", "km");
      $this->load->model("materimodels", "mm");
      $this->load->model("nilaitesmodels");
      is_login("penerimaan");
   }
   public function index()
   {
      $data["siswa"] = $this->sm->get_all();
      $data['kelas'] = $this->km->get_all();
      $data['angkatan'] = $this->am->get_all();
      $this->main_libraries->innerview("penerimaan_view", $data);
   }
   public function penerimaan_get_data($angkatan, $tingkatan)
   {
      $siswa = $this->sm->get_all(["s.angkatan_id" => $angkatan, "s.tingkatan" => $tingkatan]);
      $materi = $this->mm->get_all(["m.tingkatan" => $tingkatan]);
      $nilai_siswa = [];
      foreach ($siswa as $sk => $sv) {
         $nilai_siswa[$sk] = [
            "nama" => $sv->snama,
            "id" => $sv->sid,
            "angkatan" => $sv->aangkatan,
            "angkatan_id" => $sv->sangkatan_id,
            "tingkatan" => $sv->stingkatan,
            "nilai" => []
         ];
         foreach ($materi as $mk => $mv) {
            $nilai_siswa[$sk]["nilai"][] = $this->nilaitesmodels->get_all(["n.siswa_id" => $sv->sid, "n.materi_id" => $mv->mid])[0];
         }
      }
      $data = [
         "materi" => $materi,
         "siswa" => $siswa,
         "nilai_siswa" => $nilai_siswa
      ];
      echo json_encode($data);
   }
   public function kmeans_method($angkatan, $tingkatan)
   {
      var_dump(1.61>0.93452381 );
      exit;
      $siswa = $this->sm->get_all(["s.angkatan_id" => $angkatan, "s.tingkatan" => $tingkatan]);
      $materi = $this->mm->get_all(["m.tingkatan" => $tingkatan]);
      $nilai_siswa = [];
      foreach ($siswa as $sk => $sv) {
         $nilai_siswa[$sk] = [
            "nama" => $sv->snama,
            "id" => $sv->sid,
            "angkatan" => $sv->aangkatan,
            "angkatan_id" => $sv->sangkatan_id,
            "tingkatan" => $sv->stingkatan,
            "nilai" => []
         ];
         foreach ($materi as $mk => $mv) {
            $nilai_siswa[$sk]["nilai"][] = $this->nilaitesmodels->get_all(["n.siswa_id" => $sv->sid, "n.materi_id" => $mv->mid])[0];
         }
      }
      $cluster = $nilai_siswa[0];
      $cluster1 = $nilai_siswa[1];
      $matrix = [];
      for ($i = 0; $i < count($nilai_siswa); $i++) {
         $matrix[$i]["nama"] = $nilai_siswa[$i]["nama"];
         $matrix[$i]["total_cluster"] = 0;
         $matrix[$i]["total_cluster1"] = 0;
         for ($j = 0; $j < count($nilai_siswa[$i]['nilai']); $j++) {
            $nilai_cluster = $cluster['nilai'][$j]->nnilai;
            $nilai_cluster1 = $cluster1['nilai'][$j]->nnilai;
            $nilai_jarak = $nilai_siswa[$i]["nilai"][$j]->nnilai;
            $matrix[$i]['total_cluster'] += pow(intval($nilai_jarak) - intval($nilai_cluster), 2);
            $matrix[$i]['total_cluster1'] += pow(intval($nilai_jarak) - intval($nilai_cluster1), 2);
         }
         $matrix[$i]["total_cluster"] = round(sqrt($matrix[$i]["total_cluster"]), 2);
         $matrix[$i]["total_cluster1"] = round(sqrt($matrix[$i]["total_cluster1"]), 2);
      }
      echo json_encode($matrix);
   }
   public function action($params = "add", $id = "")
   {
      $data['angkatan'] = $this->am->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["siswa"] = $this->sm->get($id);
         if (!$data["siswa"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("siswa_form", $data);
   }
   public function add()
   {
      $data = $this->input->post();
      // echo json_encode($data);exit; // sama dengan dd
      $this->sm->create($data);
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("siswacontroller"));
   }

   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->sm->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("siswacontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->sm->delete($id);
   }
}
