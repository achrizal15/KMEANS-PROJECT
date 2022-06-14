<?php

class Nilaitesmodels extends CI_Model
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
   public function get_all($where = [])
   {
      $alias = [
         ["table" => "nilai_tes", "alias" => "n"],
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("nilai_tes as n");
      $this->db->where($where);
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("nilai_tes", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($where = [])
   {
      $this->db->select("*");
      $this->db->from("nilai_tes");
      $this->db->where($where);
      return $this->db->get()->row();
   }
   public function delete_pilihan_ganda($nilai_id)
   {
      $this->db->delete("nilai_tes_pilihan_ganda", ["nilai_id" => $nilai_id]);
      return $this->db->affected_rows();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("nilai_tes");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }

   public function perbarui($id, $data)
   {
      $this->db->update("nilai_tes", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("nilai_tes", $data);
      return $this->db->affected_rows();
   }
}
