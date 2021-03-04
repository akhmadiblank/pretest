<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Registration_model');
        $this->load->library('session');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password_login', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "HALAMAN LOGIN";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            //meenggunakan function private login supaya tidak terlalu panjang methodnya
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password_login');
        $data = $this->db->get_where('user', array('email' => $email))->row_array();
        //jika data ada
        if ($data) {
            //jika data aktif
            if ($data['is_active'] == 1) {
                //cek kecocokan password
                if (password_verify($password, $data['password'])) {
                    $data_user = [
                        'email' => $data['email'],
                        'role_id' => $data['role_id']
                    ];
                    $this->session->set_userdata($data_user);
                    if ($data['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('User');
                    }
                } else {
                    $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
            this email has been not actived!
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
            email is not registed!
          </div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
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
            $this->Registration_model->registration();
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
            congratulation,your account has been created.please login!
          </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $unset_array = ['email', 'role_id'];
        $this->session->unset_userdata($unset_array);
        $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
            you have been logged out!
          </div>');
        redirect('auth');
    }
    public function forbidden()
    {
        $this->load->view('auth/forbidden');
    }
}
