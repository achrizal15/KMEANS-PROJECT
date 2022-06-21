<?php


class PembelajaranController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("pembelajaranmodels", "pm");
      $this->load->model("usermodels", "um");
      $this->load->model("pengumpulanmodels", "nm");
      $this->load->model("kelasmodels", "km");
      $this->load->model("materimodels", "mt");
      $this->load->model("tugasmodels", "tm");
      is_login("pembelajaran");
   }
   public function index()
   {
      
      $user=$this->session->userdata("id");
      $data["pembelajaran"] = $this->pm->get_all(["p.guru_id"=>$user]);
      $this->main_libraries->innerview("pembelajaran_view", $data);
   }
   public function show_hasil_tugas($id)
   {
      // echo $id;exit;
      $data["tugas"] = $this->nm->get_all(["pembelajaran_id" => $id]);
      $this->main_libraries->innerview("hasil_tugas_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data['guru'] = $this->um->get_all();
      $data['materi'] = $this->mt->get_all();
      $data['kelas'] = $this->km->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["pembelajaran"] = $this->pm->get($id);
         $data["tugas"] = $this->tm->get($data['pembelajaran']->tugas_id);
         // var_dump($data["tugas"]);exit;
         if (!$data["pembelajaran"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("pembelajaran_form", $data);
   }
   public function add()
   {
      $data_tugas = [
         "judul" => $this->input->post("judul"),
         "deskripsi" => $this->input->post("deskripsi_tugas"),
      ];
      if ($data_tugas['judul'] != '' && $data_tugas['deskripsi'] != '') {
         $this->tm->create($data_tugas);
      }
      $tugas_id = $this->db->insert_id();
      $data = [
         "nama" => $this->input->post("nama"),
         "materi_id" => $this->input->post("materi_id"),
         "kelas_id" => $this->input->post("kelas_id"),
         "guru_id" => $this->input->post("guru_id"),
         "tugas_id" => $tugas_id,
         "deskripsi" => $this->input->post("deskripsi_pembelajaran"),
      ];
      if ($_FILES["doc"]["name"]) {
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"] = $this->upload->data("file_name");
      }
      // echo json_encode($data);exit; // sama dengan dd
      $this->pm->create($data);
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("pembelajarancontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("pembelajaran_id");
      $tugas_id = $this->input->post("tugas_id");
      $data = [
         "nama" => $this->input->post("nama"),
         "materi_id" => $this->input->post("materi_id"),
         "kelas_id" => $this->input->post("kelas_id"),
         "guru_id" => $this->input->post("guru_id"),
         "deskripsi" => $this->input->post("deskripsi_pembelajaran"),
      ];
      if ($_FILES["doc"]["name"]) {
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"] = $this->upload->data("file_name");
      }
      $data_tugas = [
         "judul" => $this->input->post("judul"),
         "deskripsi" => $this->input->post("deskripsi_tugas"),
      ];
      if ($data_tugas['judul'] != '' && $data_tugas['deskripsi'] != '') {
         if ($tugas_id == '') {
            $this->tm->create($data_tugas);
            $data["tugas_id"] = $this->db->insert_id();
         } else {
            $this->tm->perbarui($tugas_id, $data_tugas);
         }
      }
      $this->pm->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("pembelajarancontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->pm->delete($id);
   }
}
