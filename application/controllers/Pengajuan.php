<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form'));
    }

    public function judul()
    {

        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Form Tambah Data Mahasiswa';


        $this->form_validation->set_rules('id_skripsi', 'ID Skripsi', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('topik_skripsi', 'Topik Skripsi', 'required');
        $this->form_validation->set_rules('judul_skripsi', 'Judul Skripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_sidebar', $data);
            $this->load->view('templates/home_topbar', $data);
            //    $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/home_footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pengajuan/judul');
        }
    }
}
