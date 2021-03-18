<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('User_model');
        // $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function edit()
    {

        $data['title'] = 'Edit Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './asset/img/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'user.png') {
                        unlink('./asset/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $data = ['image' => $new_image];
                    $this->db->update('user', $data,  ['email' => $this->session->userdata('email')]);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->User_model->update_data();
            $this->session->set_flashdata('flashmassage', '<div class="alert alert-primary" role="alert">
            your account has been edited
          </div>');
            redirect('user');
        }
    }
    public function ChangePassword()
    {
        $data['title'] = 'ChangePassword';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('Password1', 'new Password', 'required|min_length[3]');
        $this->form_validation->set_rules('Password2', 'Password Confirmation', 'required|matches[Password1]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('template/footer', $data);
        } else {
            $CurrentPassword = $this->input->post('current_password');
            $oldPassword = $data['user']['password'];
            if (password_verify($CurrentPassword, $oldPassword)) {
                $newPassword = $this->input->post('Password1');
                $repeatPassword = $this->input->post('Password2');
                $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                if ($oldPassword !== $newPassword) {
                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('flashmassage', '<div class="alert alert-success" role="alert">
              your password has been updated!
              </div>');

                    redirect('User/ChangePassword');
                } else {
                    $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
              new password cannot be the same as current password
              </div>');
                    redirect('User/ChangePassword');
                }
            } else {
                $this->session->set_flashdata('flashmassage', '<div class="alert alert-danger" role="alert">
                email is not registed!
              </div>');
                redirect('User/ChangePassword');
            }
        }
    }
}
