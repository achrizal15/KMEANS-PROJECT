<?php


class SiswaController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("siswamodels", "sm");
      $this->load->model("angkatanmodels", "am");
      $this->load->model("kelasmodels", "km");
   }
   public function index()
   {
      is_login("siswa");
      $data["siswa"] = $this->sm->get_all();
      $data['angkatan'] = $this->am->get_all();
      $this->main_libraries->innerview("siswa_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      is_siswa();
      $id = $this->session->userdata('id');
      $data['angkatan'] = $this->am->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["siswa"] = $this->sm->get($id);
         $data['angkatan'] = $this->am->get_all(["a.id" => $data["siswa"]->angkatan_id])[0];
         $data['kelas'] = $this->km->get_all(["k.id" => $data["siswa"]->kelas_id])[0];
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
      $id = $this->session->userdata('id');
      $data = $this->input->post();
      // echo json_encode($data);eix
      if ($data['password'] == "") {
         unset($data['password']);
      }else{
         $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      }
      $this->sm->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("siswacontroller/action/edit"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->sm->delete($id);
   }
}
