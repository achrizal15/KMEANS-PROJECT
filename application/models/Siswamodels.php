<?php

class Siswamodels extends CI_Model
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
         ["table" => "siswa", "alias" => "s"],
         ["table" => "angkatan", "alias" => "a"]
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("siswa as s");
      $this->db->join("angkatan as a", "a.id=s.angkatan_id");
      $this->db->where($where);
      return $this->db->get()->result();
   }
   public function get_all_penerimaan($where = [])
   {
      $this->db->select("*");
      $this->db->from("siswa as s");
      $this->db->where($where);
      return $this->db->get()->result();
   }
   public function create_penerimaan($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("penerimaan", $data);
      return $this->db->affected_rows();
   }

   public function delete($id)
   {
      $this->db->delete("kelas", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("siswa");
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
      $this->db->update("siswa", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("siswa", $data);
      return $this->db->affected_rows();
   }
}
