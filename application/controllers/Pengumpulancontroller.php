<?php


class PengumpulanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("pengumpulanmodels", "nm");
      $this->load->model("pembelajaranmodels", "pm");
      $this->load->model("usermodels", "um");
      $this->load->model("kelasmodels", "km");
      $this->load->model("materimodels", "mt");
      $this->load->model("tugasmodels", "tm");
      // is_login("pembelajaran");
   }
   public function index()
   {
      return show_404();
   }
   public function pengumpulan($p_id)
   {
      is_siswa();
      $data["pem"] = $this->pm->get_all(["p.id" => $p_id])[0];
      $data['jawaban']=$this->nm->get(["pembelajaran_id" => $p_id, "siswa_id" => $this->session->userdata("id")]);
      $this->main_libraries->innerview("pengumpulan_form", $data);
   }
   public function submit_pengumpulan()
   {
      $jawaban = $this->input->post("jawaban");
      $file = "";
      $this->db->delete("pengumpulan_tugas",["pembelajaran_id" => $this->input->post("p_id"), "siswa_id" => $this->session->userdata("id")]);
      if ($_FILES["doc"]!=null) {
         $this->main_libraries->uploadImage("file");
         $this->upload->do_upload('doc');
         $file = $this->upload->data("file_name");
      }
      if($jawaban=="" && $file==""){
         $this->session->set_flashdata("message", "Jawaban tidak boleh kosong");
         redirect(base_url("pengumpulancontroller/pengumpulan/".$this->input->post("p_id")));
      }
      $data = [
         "pembelajaran_id" => $this->input->post("p_id"),
         "jawaban" => $jawaban,
         "file" => $file,
         "siswa_id" => $this->session->userdata("id"),
      ];
      $this->nm->create($data);
      $this->session->set_flashdata("message", "Jawaban berhasil dikirim");
      redirect(base_url("pengumpulancontroller/pengumpulan/".$this->input->post("p_id")));
   }
}
