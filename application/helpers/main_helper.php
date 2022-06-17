<?php

if (!function_exists("active_sidebar")) {
   function active_sidebar($params)
   {
      $CI = &get_instance();
      if ($params == $CI->uri->segment(1)) {
         return "active";
      }
   }
}
// Ini adalah tempat menambah menu
if (!function_exists("list_menu")) {
   function list_menu()
   {
      $CI = &get_instance();
      $CI->load->model("rolemodels");
      $menu = [
         [
            "nama" => "Home",
            "content" => "home",
            "icon" => "fa-solid fa-gauge",
            "link" => "",
            "group" => null
         ],
         [
            "nama" => "Materi",
            "content" => "materi",
            "icon" => "fa-solid fa-square-poll-horizontal",
            "link" => "matericontroller",
            "group" => null
         ],
         [
            "nama" => "Kelas",
            "content" => "kelas",
            "icon" => "fa-solid fa-window-frame",
            "link" => "kelascontroller",
            "group" => null
         ],
         [
            "nama" => "Jam Pelajaran",
            "content" => "pembelajaran",
            "icon" => "fa-solid fa-users",
            "link" => "pembelajarancontroller",
            "group" => null
         ],
         [
            "nama" => "Angkatan",
            "content" => "angkatan",
            "icon" => "fa-solid fa-school",
            "link" => "angkatancontroller",
            "group" => null
         ],
         [
            "nama" => "Siswa",
            "link" => "siswacontroller",
            "icon" => "fa-solid fa-user-graduate",
            "content" => "siswa",
            "group" => null,
         ],
         [
            "nama" => "Penerimaan Siswa",
            "link" => "penerimaancontroller",
            "icon" => "fa-solid fa-screen-users",
            "content" => "penerimaan",
            "group" => null,
         ],
         [
            "nama" => "Soal Tes",
            "link" => "soaltescontroller",
            "icon" => "fa-solid fa-list-dropdown",
            "content" => "soaltes",
            "group" => "Manage Tes",
         ],
         [
            "nama" => "Nilai Tes",
            "link" => "nilaitescontroller",
            "icon" => "fa-solid fa-list-dropdown",
            "content" => "nilaites",
            "group" => "Manage Tes",
         ],
         [
            "nama" => "User",
            "link" => "usercontroller",
            "icon" => "fa-solid fa-user-headset",
            "content" => "user",
            "group" => "Manage Staff",
         ],
         [
            "group" => "Manage Staff",
            "content" => "role",
            "link" => "rolecontroller",
            "nama" => "Role",
            "icon" => "fa-solid fa-user-headset",
         ]
      ];
      $CI->rolemodels->set_menu($menu);
      return $menu;
   }
}

if (!function_exists("custom_alert_messages")) {
   function custom_alert_messages($type, $message)
   {
      $message = strip_tags($message);
      switch ($type) {
         case 'warning':
            $data = '<div class="alert alert-warning alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . ' </div>';
            break;
         case 'error':
            $data = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message . '</div>';
            break;

         default:
            $data = ' <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ' . $message . '</div>';
            break;
      }
      echo $data;
   }
}
if (!function_exists("is_login")) {
   function is_login($controller = "home")
   {
      $CI = &get_instance();
      $CI->load->library("session");
      $CI->load->model("roleaksesmodels", "rak");
      list_menu();
      if (!$CI->session->has_userdata("id")) {
         redirect(base_url("authcontroller"));
      } else {
         if ($CI->session->userdata("role") === "siswa") {
            redirect(base_url("home/landing_siswa"));
         } else {
            $role_akses = $CI->rak->get_roles_akses($CI->session->userdata("role"), $controller);
            if (!$role_akses) {
               show_404();
            }
         }
      }
   }
}
if (!function_exists("is_siswa")) {
   function is_siswa()
   {
      $CI = &get_instance();
      $CI->load->library("session");
      $role =    $CI->session->userdata("role");
      if ($role != "siswa") {
         show_404();
      }
   }
}
if (!function_exists("show_menu")) {
   function show_menu($menu)
   {
      $CI = &get_instance();
      $CI->load->library("session");
      $CI->load->model("roleaksesmodels", "rak");
      $role_akses = $CI->rak->get_roles_akses($CI->session->userdata("role"), $menu);
      return $role_akses ? "has" : null;
   }
}
