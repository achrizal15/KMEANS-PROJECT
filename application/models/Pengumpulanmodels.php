<?php

class Pengumpulanmodels extends CI_Model
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
   public function get_all($where=[])
   {
      $alias = [
         ["table" => "pengumpulan_tugas", "alias" => "n"],
         ["table" => "pembelajaran", "alias" => "p"],
         ["table" => "siswa", "alias" => "s"],
      ];
      $select="";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("pengumpulan_tugas as n");
      $this->db->join("siswa as s","s.id=n.siswa_id");
      $this->db->join("pembelajaran as p","p.id=n.pembelajaran_id");
      $this->db->where($where);
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("pengumpulan_tugas", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($where= [])
   {
      $this->db->select("*");
      $this->db->from("pengumpulan_tugas");
      $this->db->where($where);
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
      $this->db->update("pengumpulan_tugas", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("pengumpulan_tugas", $data);
      return $this->db->affected_rows();
   }
}
