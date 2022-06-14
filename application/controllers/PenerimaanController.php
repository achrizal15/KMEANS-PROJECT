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
      is_login("penerimaan");
   }
   public function index()
   {
      $data["siswa"] = $this->sm->get_all();
      $data['kelas'] = $this->km->get_all();
      $this->main_libraries->innerview("penerimaan_view", $data);
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
