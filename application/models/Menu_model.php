<?php
class Menu_model extends CI_Model
{
    public function tambahmenu()
    {
        $data = ['menu' => htmlspecialchars($this->input->post('menu', true))];
        $this->db->insert('user_menu', $data);
    }
    public function update_menu($id)
    {
        $data = ['menu' => htmlspecialchars($this->input->post('menu_update', true))];
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }
    public function submenu()
    {

        $query = "SELECT user_sub_menu.*,user_menu.menu FROM user_sub_menu join user_menu on user_sub_menu.menu_id = user_menu.id";
        $data = $this->db->query($query)->result_array();

        return $data;
    }
    public function tambah_submenu()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),

        ];
        $this->db->insert('user_sub_menu', $data);
    }
    public function update_submenu($id)
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),

        ];


        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function tampil_update($id)
    {
        $query = "SELECT user_sub_menu.*,user_menu.menu FROM user_sub_menu join user_menu on user_sub_menu.menu_id = user_menu.id WHERE user_sub_menu.id=$id";
        $data = $this->db->query($query)->row_array();
        return $data;
    }
}
