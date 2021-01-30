<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "HALAMAN LOGIN";
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }
    public function registration()
    {

        $this->load->library('session');
        $this->form_validation->set_rules('name', 'fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|min_length[3]|matches[password2]',
            array(
                'matches' => 'Password dont match!',
                'min_lenght[3]' => 'Password too short'
            )
        );
        $this->form_validation->set_rules('password2', 'password2', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "USER REGISTRATION";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_create' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
            congratulation,your account has been created.please login!
          </div>');
            redirect('auth');
        }
    }
}
