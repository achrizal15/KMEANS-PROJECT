<?php


class KelasController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("kelasmodels", "km");
      $this->load->model("usermodels", "um");
      is_login("kelas");
   }
   public function index()
   {
      $data["kelas"] = $this->km->get_all();
      $this->main_libraries->innerview("kelas_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data['guru'] = $this->um->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["kelas"] = $this->km->get($id);
         if (!$data["kelas"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("kelas_form", $data);
   }
   public function add()
   {
      $data = $this->input->post();
      // echo json_encode($data);exit; // sama dengan dd
      $this->km->create($data);
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("kelascontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->km->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("kelascontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->km->delete($id);
   }
}
