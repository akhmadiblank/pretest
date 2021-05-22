<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{
    public function index()
    {
        $this->load->view('beranda/header');
        $this->load->view('beranda/index');
        $this->load->view('beranda/footer');
    }
}
