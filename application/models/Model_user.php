<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function view_user()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
    }

    public function addRole($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getUser()
    {
        return $this->db->get('user_role');
    }

    public function hapusRole($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
