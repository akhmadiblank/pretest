<?php
class User_model extends CI_Model
{
    public function update_data()
    {

        $email = htmlspecialchars($this->input->post('email', true));
        $nama = htmlspecialchars($this->input->post('name', true));

        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
