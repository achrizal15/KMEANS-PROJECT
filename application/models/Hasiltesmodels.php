<?php

class Hasiltesmodels extends CI_Model
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
         ["table" => "hasil_tes", "alias" => "s"],
         ["table" => "soal_tes", "alias" => "st"],
         ["table" => "soal_tes_pilihan_ganda", "alias" => "stp"],
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("hasil_tes as s");
      $this->db->join("soal_tes as st", "st.id=s.soal_tes_id");
      $this->db->join("soal_tes_pilihan_ganda as stp", "stp.id=s.jawaban");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("hasil_tes", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($where=[])
   {
      $this->db->select("*");
      $this->db->from("hasil_tes");
      $this->db->where($where);
      return $this->db->get()->row();
   }
   public function delete_pilihan_ganda($hasil_id){
      $this->db->delete("hasil_tes_pilihan_ganda", ["hasil_id" => $hasil_id]);
      return $this->db->affected_rows();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
   public function create_pilihan_ganda($id_hasil, $data)
   {
      foreach ($data as $item) {
         $this->db->insert("hasil_tes_pilihan_ganda", [
            "hasil_id" => $id_hasil,
            "jawaban"=>$item,
            "created_at"=>date("Y-m-d H:i:s", strtotime("now")),
         ]);
      }
   }
   public function get_pilihan_ganda($id_hasil){
      $this->db->select("*");
      $this->db->from("hasil_tes_pilihan_ganda");
      $this->db->where("hasil_id", $id_hasil);
      return $this->db->get()->result();
   }
   public function perbarui($id, $data)
   {
      $this->db->update("hasil_tes", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("hasil_tes", $data);
      return $this->db->affected_rows();
   }
}
