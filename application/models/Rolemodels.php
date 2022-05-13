<?php

class Rolemodels extends CI_Model
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
   public function set_menu($menus)
   {
      $title = [];
      foreach ($menus as $menu) {
         $akses = $this->db->get_where("akses", ["content" => $menu["content"]])->row();
         if ($akses == null) {
            $this->db->insert("akses", [
               "nama" => $menu["nama"],
               "content" => $menu["content"],
               "icon" => $menu["icon"],
               "link" => $menu["link"],
               "group" => $menu["group"],
               "created_at" => date("Y-m-d H:i:s", strtotime("now"))
            ]);
         } else {
            $this->db->update("akses", [
               "nama" => $menu["nama"],
               "content" => $menu["content"],
               "icon" => $menu["icon"],
               "link" => $menu["link"],
               "group" => $menu["group"],
               "created_at" => date("Y-m-d H:i:s", strtotime("now"))
            ], ["id" => $akses->id]);
         }
         $title[] = $menu["content"];
      }
      $aksesAll = $this->get_all_akses();
      foreach ($aksesAll as $key => $value) {
         if (!in_array($value->content, $title)) {
            $this->db->delete("akses", ["content" => $value->content]);
         }
      }
   }
   public function get_all_akses()
   {
      $this->db->select("*");
      $this->db->from("akses");
      $this->db->order_by("id", "ASC");
      return $this->db->get()->result();
   }

   public function get_all()
   {
      $this->db->select("*");
      $this->db->from("role");
      $this->db->order_by("created_at", "desc");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("role", ["id" => $id]);
      $this->db->delete("role_akses", ["role_id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("role");
      $this->db->where("id", $id);
      return $this->db->get()->row();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("produk");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
   public function perbarui($id, $data)
   {
      $this->db->update("role", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("role", $data);
      return $this->db->affected_rows();
   }
}
