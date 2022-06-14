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
   private function check_kelas()
   {
      $tingkatan = $this->input->post('tingkatan'); // get first name
      $nama = $this->input->post('nama'); // get last name
      $this->db->select('id');
      $this->db->from('kelas');
      $this->db->where('nama', $nama);
      $this->db->where('tingkatan', $tingkatan);
      $query = $this->db->get();
      $num = $query->num_rows();
      if ($num > 0) {
         return FALSE;
      } else {
         return TRUE;
      }
   }
   public function add()
   {
      $data = $this->input->post();

      if ($this->check_kelas() != false) {
         $this->km->create($data);
         $this->session->set_flashdata("message", "Data ditambahkan");
         redirect(base_url("kelascontroller"));
      } else {
         $this->session->set_flashdata("message","Data sudah ada");
         redirect(base_url("kelascontroller/action/add"));
      }
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      $kelas=$this->km->get($id);
      if($data['nama']!=$kelas->nama || $data['tingkatan']!=$kelas->tingkatan){
         if ($this->check_kelas() == false) {
            $this->session->set_flashdata("message","Data sudah ada");
            redirect(base_url("kelascontroller/action/edit/".$id));
            return false;
         }
      }
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
