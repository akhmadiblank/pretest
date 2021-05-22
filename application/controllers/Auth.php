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
                        redirect('Halaman');
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
            $token = base64_encode(random_bytes(16));
            $this->Registration_model->registration($token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
            congratulation,your account has been created.please verify four account!
          </div>');
            redirect('auth');
        }
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'pebisnismuda93@gmail.com',
            'smtp_pass' => 'salamun123',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('pebisnismuda93@gmail.com', 'CodeIgniter Verification System');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account verification');
            $this->email->message('click this link to verify your account :<a href=' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '>active</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('click this link to Reset password :<a href=' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '>Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //cek apakah emailnya terdaftar
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            //cek apakah tokennya valid
            if ($user_token) {
                //cek masa kadaluarsa token,kita cek satu hari
                if (time() - $user_token['date_create'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('flashmassage', '<div class="alert alert-succes" role="alert">
                    ' . $email . ' has been actived! please login
                  </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
                    Account verification failed.token expired!
                  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
                Account verification failed.token invalid!
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
            Account verification failed.wrong email!
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
    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Forgot Password";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/forgotPassword');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(16));
                $data_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];
                $this->db->insert('user_token', $data_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
                Check your email to reset your password!
              </div>');
                redirect('auth/forgotPassword');
            }
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
            email is not registered or actived
          </div>');
            redirect('auth/forgotPassword');
        }
    }
    public function resetPassword()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //cek apakah emailnya terdaftar
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
                Reset Password failed!wrong token!
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
            Reset Password failed!wrong password!
          </div>');
            redirect('auth');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('Password1', 'new Password', 'required|min_length[3]');
        $this->form_validation->set_rules('Password2', 'Password Confirmation', 'required|matches[Password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Change Password";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/changePassword');
            $this->load->view('template/auth_footer');
        } else {
            $newPassword = password_hash($this->input->post('Password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $newPassword);
            $this->db->where('email', $email);
            $this->db->update('user');
            unset($_SESSION['reset_email']);
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-succces" role="alert">
           Password has been changed.please login!
          </div>');
            redirect('auth');
        }
    }
}
