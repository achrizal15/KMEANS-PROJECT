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
      $this->load->model("siswamodels", "sm");
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
      if ($this->session->has_userdata("id")) {
         redirect(base_url());
      }
      $data['angkatan'] = $this->angkatanmodels->get($angkatan_id);
      if (!$data['angkatan']) {
         redirect("/");
      }
      $this->main_libraries->innerview("register_form", $data, true);
   }
   public function add_siswa()
   {
      $rules = [
         ["field" => "email", "label" => "Email", "rules" => "required|is_unique[siswa.email]"],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() != false) {
         $data = $this->input->post();
         $data["password"] = password_hash($data['password'], PASSWORD_DEFAULT);
         $this->sm->create($data);
         $this->session->set_flashdata("message", "Berhasil Mendaftar");
         $user_data = [
            "id" => $this->db->insert_id(),
            "role" => "siswa",
            "nama" => $data['nama'],
            "email" => $data['email'],
         ];
         $this->session->set_userdata($user_data);
         redirect(base_url("authcontroller/register_siswa"));
      } else {
         $this->session->set_flashdata("message", validation_errors());
         redirect(base_url("authcontroller/register_siswa/" . $this->input->post("angkatan_id")));
      }
   }
   public function auth_siswa()
   {
      if ($this->session->has_userdata("id")) {
         redirect(base_url());
      }
      $email = $this->input->post("email");
      $password = $this->input->post("password");
      $user = $this->db->get_where("siswa", ["email" => $email])->row();
      if (!$user) {
         $this->session->set_flashdata("message", "Login error");
         redirect(base_url("authcontroller/login"));
      } else {
         if($user->status=="NON ACTIVE"){
            $this->session->set_flashdata("message", "Angkatan anda telah berakhi.");
            redirect(base_url("authcontroller/login"));
         }
         if (password_verify($password, $user->password)) {
            $user_data = [
               "id" => $user->id,
               "role" => "siswa",
               "nama" => $user->nama,
               "email" => $user->email,
            ];
            $this->session->set_userdata($user_data);
            redirect(base_url("home/landing_siswa"));
         } else {
            $this->session->set_flashdata("message", "Password error");
            redirect(base_url("authcontroller/login/siswa"));
         }
      }
   }
   public function login($role = 'staff')
   {
      if ($this->session->has_userdata("id")) {
         redirect(base_url());
      }
      $data['auth'] = $role == "siswa" ? "auth_siswa" : 'auth';
      $this->main_libraries->innerview("login_view", $data, true);
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
               "email" => $user->email,
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
