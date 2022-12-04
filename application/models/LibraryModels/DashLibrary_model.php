<?php


defined('BASEPATH') or exit('No direct script access allowed');

class DashLibrary_model extends CI_Model
{
    private $tb_member = "members";
    private $tb_book = "books";
    private $tb_borrow = "book_trxs";
    private $tb_librarians = "librarians";

    public function getCountMembers()
    {
        $query = $this->db->get($this->tb_member);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return "0";
        }
    }
    public function getCountBook()
    {
        $query = $this->db->get($this->tb_book);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return "0";
        }
    }
    public function getCountBorrBook()
    {
        $query = $this->db->get($this->tb_borrow);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return "0";
        }
    }
    public function getCountLibrarian()
    {
        $query = $this->db->get($this->tb_librarians);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return "0";
        }
    }
}
