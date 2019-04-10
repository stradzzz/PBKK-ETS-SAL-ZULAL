<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datauser extends CI_Controller
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
        $data['user1'] = $this->Mahasiswa_model->getAllUser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_sidebar', $data);
        $this->load->view('templates/home_topbar', $data);
        //   $this->load->view('templates/header', $data);
        $this->load->view('datauser/index', $data);
        //   $this->load->view('templates/footer');
        $this->load->view('templates/home_footer');
    }

    public function hapus($id_skripsi)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id_skripsi);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('datauser');
    }

    public function editrole($id)
    {
        $role_id = $this->input->post('role_id');

        $data = array(
            'role_id' => $role_id
        );

        $where = array(
            'id' => $id
        );

        $this->Mahasiswa_model->submitKaprodiDosen($where, $data, 'user');

        redirect('datauser');
    }

    public function editactive($id)
    {
        $is_active = $this->input->post('is_active');

        $data = array(
            'is_active' => $is_active
        );

        $where = array(
            'id' => $id
        );

        $this->Mahasiswa_model->submitKaprodiDosen($where, $data, 'user');

        redirect('datauser');
    }
}
