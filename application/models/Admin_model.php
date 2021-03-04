<?php
class Admin_model extends CI_Model
{
    public function tambah_role()
    {
        $data = ['role' => htmlspecialchars($this->input->post('role', true))];
        $this->db->insert('user_role', $data);
    }
    public function get_role()
    {

        $data = ['id' => $this->input->post('getDetail')];
        $result = $this->db->get_where('user_role', $data)->row_array();
        return $result;
    }

    public function update_Role($id)
    {
        $data = [
            'role' => htmlspecialchars($this->input->post('role', true)),
        ];
        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }
    public function delate_role_access($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
    }
}
