<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $table = 'members';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getEnumGender()
    {
        $row = $this->db->query(" SHOW COLUMNS FROM `$this->table` LIKE 'gender' ")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_fields = $enum_array[1];
        return ($enum_fields);
    }

    public function getEnumNation()
    {
        $row = $this->db->query(" SHOW COLUMNS FROM `$this->table` LIKE 'nationality' ")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_fields = $enum_array[1];
        return ($enum_fields);
    }

    public function getByID($id)
    {
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
