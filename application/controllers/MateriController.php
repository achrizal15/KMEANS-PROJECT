<?php


class MateriController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("materimodels", "mt");
      is_login("materi");
   }
   public function index()
   {
      $data["materi"] = $this->mt->get_all();
      $this->main_libraries->innerview("materi_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["materi"] = $this->mt->get($id);
         if (!$data["materi"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("materi_form", $data);
   }
   public function add()
   {
      $rules = [
         ["field" => "nama", "label" => "Nama", "rules" => "required|is_unique[materi.nama]"],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() != false) {
         $data = $this->input->post();
         if ($_FILES["doc"]["name"]) {
            $this->main_libraries->uploadImage("file");
            $this->upload->do_upload('doc');
            $data["file"] = $this->upload->data("file_name");
         }
         $this->mt->create($data);
         $this->session->set_flashdata("message", "Data ditambahkan");
         redirect(base_url("matericontroller"));
      } else {
         $this->session->set_flashdata("message", validation_errors());
         redirect(base_url("matericontroller/action/add"));
      }
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      if ($_FILES["doc"]["name"]) {
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"] = $this->upload->data("file_name");
      }
      unset($data["id"]);
      $this->mt->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("matericontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->mt->delete($id);
   }
}
