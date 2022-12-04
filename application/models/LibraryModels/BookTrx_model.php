<?php


defined('BASEPATH') or exit('No direct script access allowed');

class BookTrx_model extends CI_Model
{
    private $table = 'book_trxs';

    public function getAllJoin()
    {
        $this->db->select(
            "*, members.full_name, members.phone, borrow_details.book_id, borrow_details.borrow_id"
        );
        $this->db->join('borrow_detail', 'book_trxs.member_id = members.id');
        $this->db->join('members', 'book_trxs.detail_id = borrow_details.id');
        $this->db->from('book_trxs');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
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
