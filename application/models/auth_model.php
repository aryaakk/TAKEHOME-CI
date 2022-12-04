<?php


defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{

    public function getDetail($email, $password)
    {
        $sql    = "SELECT * FROM librarians where email='$email' and password='$password'";
        $query  = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
