<?php

class Tugasmodels extends CI_Model
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
         ["table" => "tugas", "alias" => "t"],
         ["table" => "user", "alias" => "s"],
         ["table" => "kelas", "alias" => "k"],
         ["table" => "materi", "alias" => "m"]
      ];
      $select="";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("pembelajaran as p");
      $this->db->join("user as s","s.id=p.guru_id");
      $this->db->join("kelas as k","k.id=p.kelas_id");
      $this->db->join("materi as m","m.id=p.materi_id");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("pembelajaran", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("tugas");
      $this->db->where("id", $id);
      return $this->db->get()->row();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
   public function perbarui($id, $data)
   {
      $this->db->update("tugas", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("tugas", $data);
      return $this->db->affected_rows();
   }
}
