<?php


class NilaitesController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("soaltesmodels", "sm");
      $this->load->model("siswamodels", "ssm");
      $this->load->model("materimodels", "mm");
      $this->load->model("usermodels", "um");
      $this->load->model("nilaitesmodels");
      is_login("nilaites");
   }

   public function index()
   {
      $data["soaltest"] = $this->sm->get_all();
      $data["siswa"] = $this->ssm->get_all();
      $data['materi'] = $this->mm->get_all();
      $this->main_libraries->innerview("nilaites_view", $data);
   }

   
 
}
