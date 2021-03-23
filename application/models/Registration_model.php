<?php
class Registration_model extends CI_Model
{
    public function registration($token)
    {

        $email = $this->input->post('email', true);
        $data_token = [
            'email' => $email,
            'token' => $token,
            'date_create' => time()
        ];
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'date_create' => time()
        ];
        $this->db->insert('user', $data);
        $this->db->insert('user_token', $data_token);
    }
}
