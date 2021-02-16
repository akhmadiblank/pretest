<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->Menu_model->tambahmenu();
            $this->session->set_tempdata('flash', "Menu berhasil ditambahkan");
            redirect('menu');
        }
    }
    public function hapus_menu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        //$this->session->set_flashdata('flash', "Menu berhasil ditambahkan");
        redirect('menu');
    }
    public function update_menu($id)
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $this->form_validation->set_rules('menu_update', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->Menu_model->update_menu($id);
            $this->session->set_tempdata('flash', "Menu berhasil diupdate");
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        //data['user']=untuk profile
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->submenu();
        $data['sub_menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Id', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->Menu_model->tambah_submenu();
            $this->session->set_tempdata('flash', "sub Menu berhasil ditambahkan");
            redirect('Menu/submenu');
        }
    }
    public function hapus_sub_menu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        redirect('Menu/submenu');
    }
    public function updatesubmenu($id)
    {
        $data['title'] = 'Submenu Management test123';
        //data['user']=untuk profile
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['menu_update'] = $this->Menu_model->tampil_update($id);
        $data['sub_menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Id', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu_update', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->Menu_model->update_submenu($id);
            $this->session->set_tempdata('flash', "sub Menu berhasil diupdate");
            redirect('Menu/submenu');
        }
    }
}
