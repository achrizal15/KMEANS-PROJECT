<?php


class PembelajaranController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("pembelajaranmodels", "pm");
      $this->load->model("usermodels", "um");
      $this->load->model("kelasmodels", "km");
      $this->load->model("materimodels", "mt");
      $this->load->model("tugasmodels", "tm");
      is_login("pembelajaran");
   }
   public function index()
   {
      $data["pembelajaran"] = $this->pm->get_all();
      $this->main_libraries->innerview("pembelajaran_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data['guru'] = $this->um->get_all();
      $data['materi'] = $this->mt->get_all();
      $data['kelas'] = $this->km->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["pembelajaran"] = $this->pm->get($id);
         if (!$data["pembelajaran"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("pembelajaran_form", $data);
   }
   public function add()
   {
      $data_tugas = [
         "judul"=>$this->input->post("judul"),
         "deskripsi"=>$this->input->post("deskripsi"),
      ];

      $this->tm->create($data_tugas);
      $tugas_id = $this->db->insert_id();
      $data = [
         "materi_id"=>$this->input->post("materi_id"),
         "kelas_id"=>$this->input->post("kelas_id"),
         "tugas_id"=>$tugas_id,
         "deskripsi"=>$this->input->post("deskripsi"),
      ];
      if($_FILES["doc"]["name"]){
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"]= $this->upload->data("file_name");
      }
      // echo json_encode($data);exit; // sama dengan dd
      $this->pm->create($data);
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("pembelajarancontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
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
