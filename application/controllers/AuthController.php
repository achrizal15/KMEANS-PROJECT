<?php

class AuthController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->model("authmodels", "am");
      $this->load->model("angkatanmodels");
   }
   public function index()
   {
      redirect(current_url() . "/landing");
   }
   public function landing()
   {
      $angkatan = $this->angkatanmodels->get_all();
      $data['angkatan'] = [];
      foreach ($angkatan as $item) {
         if (date("Y-m-d", strtotime($item->aakhir_pendaftaran)) < date("Y-m-d")) continue;
         $data['angkatan'][] = $item;
      }
      $this->main_libraries->innerview("landing", $data, true);
   }
   public function register_siswa($angkatan_id = null)
   {
      $data['angkatan'] = $this->angkatanmodels->get($angkatan_id);
      if (!$data['angkatan']) {
         redirect("/");
      }
      echo 1;
      // $this->main_libraries->innerview("form_register_siswa", [], true);
   }
   public function login()
   {
      if ($this->session->has_userdata("id")) {
         redirect(base_url());
      }
      $this->main_libraries->innerview("login_view", [], true);
   }

   public function logout()
   {
      session_destroy();
      redirect(base_url("authcontroller"));
   }
   public function auth()
   {
      if ($this->session->has_userdata("id")) {
         redirect(base_url());
      }
      $email = $this->input->post("email");
      $password = $this->input->post("password");
      $user = $this->am->get(["email" => $email]);
      if (!$user) {
         $this->session->set_flashdata("message", "Login error");
         redirect(base_url("authcontroller/login"));
      } else {
         if (password_verify($password, $user->password)) {
            $user_data = [
               "id" => $user->id,
               "role" => $user->role_id,
               "nama" => $user->nama,
               "email" => $user->email
            ];
            $this->session->set_userdata($user_data);
            redirect(base_url());
         } else {
            $this->session->set_flashdata("message", "Password error");
            redirect(base_url("authcontroller/login"));
         }
      }
   }
}
