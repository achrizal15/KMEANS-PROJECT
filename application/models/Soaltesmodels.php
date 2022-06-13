<?php

class Soaltesmodels extends CI_Model
{
   public function setAliasColumn($column, $alias)
   {
      $column =   $this->db->list_fields($column);
      $result = [];
      foreach ($column as $key) {
         $result[] = $alias . "." . $key . " AS " . $alias . $key;
      }
      return $result;
   }
   public function get_all()
   {
      $alias = [
         ["table" => "soal_tes", "alias" => "s"],
         ["table" => "materi", "alias" => "m"],
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("soal_tes as s");
      $this->db->join("materi as m", "m.id=s.materi_id");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("soal_tes", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("soal_tes");
      $this->db->where("id", $id);
      return $this->db->get()->row();
   }
   public function delete_pilihan_ganda($soal_id){
      $this->db->delete("soal_tes_pilihan_ganda", ["soal_id" => $soal_id]);
      return $this->db->affected_rows();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
   public function create_pilihan_ganda($id_soal, $data)
   {
      foreach ($data as $item) {
         $this->db->insert("soal_tes_pilihan_ganda", [
            "soal_id" => $id_soal,
            "jawaban"=>$item,
            "created_at"=>date("Y-m-d H:i:s", strtotime("now")),
         ]);
      }
   }
   public function get_pilihan_ganda($id_soal){
      $this->db->select("*");
      $this->db->from("soal_tes_pilihan_ganda");
      $this->db->where("soal_id", $id_soal);
      return $this->db->get()->result();
   }
   public function perbarui($id, $data)
   {
      $this->db->update("soal_tes", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("soal_tes", $data);
      return $this->db->affected_rows();
   }
}
