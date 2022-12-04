<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Librarian_model extends CI_Model
{
    private $table = 'librarians';

    public function getAll(){
        return $this->db->get($this->table)->result();
    }

    public function getByID($id){
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insertData($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function updateSaveData($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

        public function deleteData($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}