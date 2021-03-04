<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer', $data);
    }
    public function role_access($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template/footer', $data);
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuid');
        $role_id = $this->input->post('roleid');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_tempdata('change', '<div class="alert alert-primary" role="alert">
        access have changed</div>', 5);
    }
    public function addRole()
    {
        $data['title'] = 'role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('Admin/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->Admin_model->tambah_role();
            $this->session->set_tempdata('flash', "role berhasil ditambahkan");
            redirect('Admin/role');
        }
    }
    public function getAccess_modal()
    {

        $data['id'] = $this->Admin_model->get_role();
        $this->load->view('Admin/role_update', $data);
    }
    public function update_Role($id)
    {
        $this->Admin_model->update_Role($id);
        $this->session->set_tempdata('flash', "role berhasil diUpdate");
        redirect('Admin/role');
    }
    public function delate_role_access($id)
    {
        $this->Admin_model->delate_role_access($id);
        redirect('Admin/role');
    }
}
