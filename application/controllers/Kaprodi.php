<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi extends CI_Controller
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
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaKaprodi();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_sidebar', $data);
        $this->load->view('templates/home_topbar', $data);
        //    $this->load->view('templates/header', $data);
        $this->load->view('kaprodi/index', $data);
        //   $this->load->view('templates/footer');
        $this->load->view('templates/home_footer');
    }

    public function submitdosen1($id_skripsi)
    {
        $dosbing_1 = $this->input->post('dosbing_1');

        $data = array(
            'dosbing_1' => $dosbing_1
        );

        $where = array(
            'id_skripsi' => $id_skripsi
        );

        $this->Mahasiswa_model->submitKaprodiDosen($where, $data, 'mahasiswa');


        //$this->Mahasiswa_model->submitCatatanMahasiswa($id_skripsi);
        //$this->session->set_flashdata('flash', 'submitted');
        redirect('kaprodi');
    }

    public function submitdosen2($id_skripsi)
    {
        $dosbing_2 = $this->input->post('dosbing_2');

        $data = array(
            'dosbing_2' => $dosbing_2
        );

        $where = array(
            'id_skripsi' => $id_skripsi
        );

        $this->Mahasiswa_model->submitKaprodiDosen($where, $data, 'mahasiswa');


        //$this->Mahasiswa_model->submitCatatanMahasiswa($id_skripsi);
        //$this->session->set_flashdata('flash', 'submitted');
        redirect('kaprodi');
    }
}
