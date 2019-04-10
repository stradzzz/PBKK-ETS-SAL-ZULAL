<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_sidebar', $data);
        $this->load->view('templates/home_topbar', $data);
        //  $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        //   $this->load->view('templates/footer');
        $this->load->view('templates/home_footer');
    }

    public function hapus($id_skripsi)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id_skripsi);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin');
    }
}
