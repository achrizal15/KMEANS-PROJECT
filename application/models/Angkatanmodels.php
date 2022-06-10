<?php

class Angkatanmodels extends CI_Model
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
         ["table" => "angkatan", "alias" => "a"]
      ];
      $select="";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("angkatan as a");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("angkatan", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("angkatan");
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
      $this->db->update("angkatan", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("angkatan", $data);
      return $this->db->affected_rows();
   }
}
