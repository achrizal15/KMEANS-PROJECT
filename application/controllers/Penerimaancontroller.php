<?php


class PenerimaanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries", 'session', "form_validation"]);
      $this->load->model("siswamodels", "sm");
      $this->load->model("angkatanmodels", "am");
      $this->load->model("kelasmodels", "km");
      $this->load->model("materimodels", "mm");
      $this->load->model("nilaitesmodels");
      is_login("penerimaan");
   }
   public function index()
   {
      $data["siswa"] = $this->sm->get_all();
      $data['kelas'] = $this->km->get_all();
      $data['angkatan'] = $this->am->get_all();
      $this->main_libraries->innerview("penerimaan_view", $data);
   }
   public function update_kelas()
   {
      $data = $this->input->post();
      $penerimaan = [
         "tingkatan" => $data["tingkatan"],
         "angkatan_id" => $data["angkatan"],
      ];
      foreach ($data['data'] as $siswa) {
         $this->sm->perbarui($siswa['siswa'], ['kelas_id' => $siswa["kelas"], "status" => "ACTIVE"]);
      }
      $this->sm->create_penerimaan($penerimaan);
      $this->session->set_flashdata("message", "Berhasil melakukan penerimaan siswa");
      redirect(base_url("penerimaancontroller"));
   }
   public function ambil_penerimaan($angkatan_id)
   {
      echo json_encode($this->sm->get_all_penerimaan(["angkatan_id" => $angkatan_id]));
   }
   public function penerimaan_get_data($angkatan, $tingkatan)
   {
      $siswa = $this->sm->get_all(["s.angkatan_id" => $angkatan, "s.tingkatan" => $tingkatan]);
      $materi = $this->mm->get_all(["m.tingkatan" => $tingkatan]);
      $kelas = $this->km->get_all(["k.tingkatan" => $tingkatan]);
      $nilai_siswa = [];
      foreach ($siswa as $sk => $sv) {
         $nilai_siswa[$sk] = [
            "nama" => $sv->snama,
            "id" => $sv->sid,
            "angkatan" => $sv->aangkatan,
            "angkatan_id" => $sv->sangkatan_id,
            "tingkatan" => $sv->stingkatan,
            "nilai" => []
         ];
         foreach ($materi as $mk => $mv) {
            $nilai_siswa[$sk]["nilai"][] = $this->nilaitesmodels->get_all(["n.siswa_id" => $sv->sid, "n.materi_id" => $mv->mid])[0];
         }
      }
      $data = [
         "materi" => $materi,
         "siswa" => $siswa,
         "nilai_siswa" => $nilai_siswa,
         "kelas" => $kelas
      ];
      echo json_encode($data);
   }
   private function count_bcv($centroid = [])
   {
      $sumarray = [];
      $bcv = 0;
      foreach ($centroid as $c) {
         foreach ($c as $key => $value) {
            if (key_exists($key, $sumarray)) {
               $sumarray[$key] -= $value;
            } else {
               $sumarray[$key] = $value;
            }
         }
      }
      foreach ($sumarray as $key => $sv) {
         $sumarray[$key] = pow($sv, 2);
         $bcv +=  $sumarray[$key];
      }
      $bcv = round(sqrt($bcv), 2);
      return $bcv;
   }
   private function find_mcv($data)
   {
      $terkecil = [];
      $checked = [];
      foreach ($data as $key => $value) {
         $terkecil[$key] = [];
         foreach ($value['cluster'] as $ki => $item) {
            if (key_exists($key, $terkecil)) {
               if ($terkecil[$key] > $item) {
                  $terkecil[$key] = $item;
                  $checked[$key] = ['id' => $value['id'], "group" => $ki];
               }
            } else {
               $terkecil[$key] = $item;
               $checked[$key] = ['id' => $value['id'], "group" => $ki];
            }
         }
      }
      $mcv = 0;
      foreach ($terkecil as $key => $value) {
         $mcv += pow($value, 2);
      }
      return ["mcv" => $mcv, "terkecil" => $terkecil, "checked" => $checked];
   }

   private function count_average($data, $checked, $pusat_cluster)
   {
      $average = [];
      $jumlah_cluster = 0;
      $nilai = [];
      foreach ($data as $key => $value) {
         foreach ($checked as $id) {
            if ($value['id'] == $id['id']) {
               if (key_exists($id['group'], $average)) {
                  $jumlah_cluster += 1;
                  $average[$id['group']] = ['jumlah' => $jumlah_cluster];
                  foreach ($value['nilai'] as $ki => $item) {
                     if (key_exists($ki, $nilai[$id['group']])) {
                        $nilai[$id['group']][$ki] += $item;
                     } else {
                        $nilai[$id['group']][$ki] = $item;
                     }
                  }
               } else {
                  $jumlah_cluster = 1;
                  $average[$id['group']] = ['jumlah' => $jumlah_cluster];
                  foreach ($value['nilai'] as $ki => $itam) {
                     $nilai[$id['group']][$ki] = $itam;
                  }
               }
            }
         }
      }


      foreach ($average as $key => $value) {
         foreach ($nilai[$key] as $ki => $item) {
            $nilai[$key][$ki] = $item / $value['jumlah'];
         }
      }
      foreach ($pusat_cluster as $kp => $v) {
         if (!key_exists($kp, $nilai)) {
            foreach ($data as $v) {
               foreach ($v['nilai'] as $ki => $item) {
                  $nilai[$kp][$ki] = 0;
               }
            }
         }
      }
      return $nilai;
   }

   private function kmeans_algoritm($iterate, $data, $jumlah_cluster, $pusat_cluster = [], $result = [])
   {
      if ($iterate == 0) {
         $execute = [];
         $pusat_cluster = [];
         for ($jc = 0; $jc < $jumlah_cluster; $jc++) {
            $pusat_cluster['cluster' . $jc] = $data[$jc]['nilai'];
         }
         $bcv = $this->count_bcv($pusat_cluster);
         for ($i = 0; $i < count($data); $i++) {
            $data_nilai = $data[$i]['nilai'];
            $execute[$i] = [
               "id" => $data[$i]['id'],
            ];
            for ($pc = 0; $pc < $jumlah_cluster; $pc++) {
               $execute[$i]['cluster']['cluster' . $pc] = 0;
            }
            foreach ($data_nilai as $dk => $dv) {
               $execute[$i][$dk] = $dv;
               foreach ($pusat_cluster as $pc => $pv) {
                  foreach ($pv as $nk => $nv) {
                     if ($nk == $dk) {
                        $perhitungan = $dv - $nv;
                        $perhitungan = pow($perhitungan, 2);
                        $execute[$i]['cluster'][$pc] += $perhitungan;
                     }
                  }
               }
            }
            for ($x = 0; $x < $jumlah_cluster; $x++) {
               $execute[$i]['cluster']['cluster' . $x] = round(sqrt($execute[$i]['cluster']['cluster' . $x]), 2);
            }
         }
         $mcv_dan_terkecil = $this->find_mcv($execute);
         $rasio = $bcv / $mcv_dan_terkecil['mcv'];
         $new_cluster = $this->count_average($data, $mcv_dan_terkecil['checked'], $pusat_cluster);
         $result[$iterate] = [
            "iterate" => $iterate,
            "bcv" => $bcv,
            "mcv" => $mcv_dan_terkecil['mcv'],
            "checked" => $mcv_dan_terkecil['checked'],
            "tekecil" => $mcv_dan_terkecil['terkecil'],
            "rasio" => $rasio,
            "cluster" => $pusat_cluster,
            "new_cluster" => $new_cluster,
            "execute" => $execute
         ];
         return  $this->kmeans_algoritm($iterate + 1, $data, $jumlah_cluster, $new_cluster, $result);
      } else {
         $execute = [];
         $pusat_cluster = $pusat_cluster;
         $bcv = $this->count_bcv($pusat_cluster);
         for ($i = 0; $i < count($data); $i++) {
            $data_nilai = $data[$i]['nilai'];
            $execute[$i] = [
               "id" => $data[$i]['id'],
            ];
            for ($pc = 0; $pc < $jumlah_cluster; $pc++) {
               $execute[$i]['cluster']['cluster' . $pc] = 0;
            }
            foreach ($data_nilai as $dk => $dv) {
               $execute[$i][$dk] = $dv;
               foreach ($pusat_cluster as $pc => $pv) {
                  foreach ($pv as $nk => $nv) {
                     if ($nk == $dk) {
                        $perhitungan = $dv - $nv;
                        $perhitungan = pow($perhitungan, 2);
                        $execute[$i]['cluster'][$pc] += $perhitungan;
                     }
                  }
               }
            }
            for ($x = 0; $x < $jumlah_cluster; $x++) {
               $execute[$i]['cluster']['cluster' . $x] = round(sqrt($execute[$i]['cluster']['cluster' . $x]), 2);
            }
         }
         $mcv_dan_terkecil = $this->find_mcv($execute);
         $rasio = $bcv / $mcv_dan_terkecil['mcv'];
         $new_cluster = $this->count_average($data, $mcv_dan_terkecil['checked'], $pusat_cluster);
         $result[$iterate] = [
            "iterate" => $iterate,
            "bcv" => $bcv,
            "mcv" => $mcv_dan_terkecil['mcv'],
            "checked" => $mcv_dan_terkecil['checked'],
            "terkecil" => $mcv_dan_terkecil['terkecil'],
            "rasio" => $rasio,
            "cluster" => $pusat_cluster,
            "new_cluster" => $new_cluster,
            "execute" => $execute
         ];
         if ($result[$iterate]['rasio'] <= $rasio) {
            return $result;
         } else {
            if ($iterate <= 5) {
               return $this->kmeans_algoritm($iterate + 1, $data, $jumlah_cluster, $new_cluster, $result);
            } else {
               return $result;
            }
         }
      }
   }
   public function kmeans_method($angkatan, $tingkatan, $c1, $c2)
   {
      $siswa = $this->sm->get_all(["s.angkatan_id" => $angkatan, "s.tingkatan" => $tingkatan]);
      $materi = $this->mm->get_all(["m.tingkatan" => $tingkatan]);
      $kelas_c1 = $this->km->get($c1);
      $kelas_c2 = $this->km->get($c2);
      $nilai_siswa = [];
      foreach ($siswa as $sk => $sv) {
         $nilai_siswa[$sk] = [
            "id" => $sv->sid,
            "nilai" => []
         ];
         foreach ($materi as $mk => $mv) {
            $nilai = $this->nilaitesmodels->get_all(["n.siswa_id" => $sv->sid, "n.materi_id" => $mv->mid]);
            foreach ($nilai as $nk => $nv) {
               $nilai_siswa[$sk]['nilai'][$nv->nmateri] = intval($nv->nnilai);
            }
         }
      }
      $kmeans = $this->kmeans_algoritm(0, $nilai_siswa, 2);
      echo json_encode(
         ["siswa" => $siswa, "materi" => $materi, "kmeans" => $kmeans, "nilai_siswa" => $nilai_siswa, 'c1' => $kelas_c1, "c2" => $kelas_c2]
      );
   }
   public function action($params = "add", $id = "")
   {
      $data['angkatan'] = $this->am->get_all();
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["siswa"] = $this->sm->get($id);
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
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->sm->perbarui($id, $data);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("siswacontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->sm->delete($id);
   }
}
