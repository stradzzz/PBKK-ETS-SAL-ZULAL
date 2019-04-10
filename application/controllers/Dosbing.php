<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosbing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('url', 'download'));
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
        $this->load->view('dosbing/index', $data);
        //   $this->load->view('templates/footer');
        $this->load->view('templates/home_footer');
    }

    public function setuju($id_skripsi)
    {
        $this->Mahasiswa_model->konfirmasiJudul($id_skripsi);
        $this->session->set_flashdata('flash', 'Telah Dikonfirmasi');
        redirect('dosbing');
    }
    public function tolak($id_skripsi)
    {
        $this->Mahasiswa_model->tolakkonfirmasiKudul($id_skripsi);
        $this->session->set_flashdata('flash', 'Ditolak');
        redirect('dosbing');
    }
}
