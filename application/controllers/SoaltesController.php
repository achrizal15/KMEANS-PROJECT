<?php


class SoaltesController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("soaltesmodels", "sm");
      $this->load->model("materimodels", "mm");
      $this->load->model("usermodels", "um");
      is_login("soaltes");
   }

   public function index()
   {
      $data["soaltest"] = $this->sm->get_all();
      $data['materi'] = $this->mm->get_all();
      $this->main_libraries->innerview("soaltes_view", $data);
   }
   public function nilai()
   {
      is_login("nilaites");
      $data["soaltest"] = $this->sm->get_all();
      $data['materi'] = $this->mm->get_all();
      $this->main_libraries->innerview("soaltes_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data['materi'] = $this->mm->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["soaltes"] = $this->sm->get($id);
         $data["pilihan_ganda"] = $this->sm->get_pilihan_ganda($id);
         if (!$data["soaltes"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("soaltes_form", $data);
   }
 
   public function add()
   {
      $data=[
         'materi_id'=> $this->input->post("materi_id"),
         'soal'=> $this->input->post("soal"),
         'tingkatan'=> $this->input->post("tingkatan"),
         'jawaban'=> $this->input->post("jawabankunci"),
      ];
      if($_FILES["doc"]["name"]){
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"]= $this->upload->data("file_name");
      }
      $this->sm->create($data);
      $soal_id=$this->db->insert_id();
      $jawaban=$this->input->post("jawaban");
      $jawaban[]=$data["jawaban"];
      $this->sm->create_pilihan_ganda($soal_id, $jawaban);      
      $this->session->set_flashdata("message", "Data ditambahkan");
      redirect(base_url("soaltescontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data=[
         'materi_id'=> $this->input->post("materi_id"),
         'soal'=> $this->input->post("soal"),
         'tingkatan'=> $this->input->post("tingkatan"),
         'jawaban'=> $this->input->post("jawabankunci"),
      ];
      if($_FILES["doc"]["name"]){
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $data["file"]= $this->upload->data("file_name");
      }
      $this->sm->delete_pilihan_ganda($id);
      $jawaban=$this->input->post("jawaban");
      $jawaban[]=$data["jawaban"];
      $this->sm->create_pilihan_ganda($id, $jawaban);
      $this->sm->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("soaltescontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->sm->delete($id);
   }
}
