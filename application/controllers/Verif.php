<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif extends CI_Controller
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
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaVerif();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_sidebar', $data);
        $this->load->view('templates/home_topbar', $data);
        //    $this->load->view('templates/header', $data);
        $this->load->view('verif/index', $data);
        //   $this->load->view('templates/footer');
        $this->load->view('templates/home_footer');
    }

    public function terima($id_skripsi)
    {
        $this->Mahasiswa_model->setujuDataMahasiswa($id_skripsi);
        $this->session->set_flashdata('flash', 'Diterima');
        redirect('verif');
    }
    public function terimabersyarat($id_skripsi)
    {
        $this->Mahasiswa_model->syaratDataMahasiswa($id_skripsi);
        $this->session->set_flashdata('flash', 'DiterimaBersyarat');
        redirect('verif');
    }

    public function ditolak($id_skripsi)
    {
        $this->Mahasiswa_model->tolakDataMahasiswa($id_skripsi);
        $this->session->set_flashdata('flash', 'Ditolak');
        redirect('verif');
    }

    public function submitcatatan($id_skripsi)
    {
        $catatan = $this->input->post('catatan');

        $data = array(
            'catatan' => $catatan
        );

        $where = array(
            'id_skripsi' => $id_skripsi
        );

        $this->Mahasiswa_model->submitCatatanMahasiswa($where, $data, 'mahasiswa');


        //$this->Mahasiswa_model->submitCatatanMahasiswa($id_skripsi);
        //$this->session->set_flashdata('flash', 'submitted');
        redirect('verif');
    }
}
