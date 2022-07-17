<?php

//komentar
class AngkatanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("angkatanmodels", "am");
      is_login("angkatan");
   }
   public function index()
   {
      $data["angkatan"] = $this->am->get_all();
      $this->main_libraries->innerview("angkatan_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["angkatan"] = $this->am->get($id);
         // var_dump($data["tugas"]);exit;
         if (!$data["angkatan"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("angkatan_form", $data);
   }
   public function add()
   {
      $data = $this->input->post();
      // echo json_encode($data);exit; // sama dengan dd
      $this->am->create($data);
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("angkatancontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      // unset($data["id"]);
      $this->am->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("angkatancontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->am->delete($id);
   }
}
