<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controllernida extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
    }

    public function index()
    {

        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('viewnida/index', $data, array('error' => ' '));
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->load->model('Modelnida');

        $this->load->view('viewnida/judul');
    }

    public function tambah_aksi()
    { }

    function create()
    {
        $this->load->model('Modelnida');
        // $this->load->view('upload_form', array('error' => ' ' ));

        $data['title'] = 'Pengajuan Judul Skripsi';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        //$this->form_validation->set_rules('proposal', 'Proposal','required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('viewnida/judul', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Modelnida-- > tambahJudul();
            redirect('viewnida/judul');
        }
    }

    public function update()
    {
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['nrp' => $this->session->userdata('nrp')])->row_array();

        $username = 'username_nrp_nip';

        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'gif|png|jpg';
        $config['max_size']             = 2048;
        $config['overwrite']   = true;
        $config['file_name']   = $this->session->userdata('name');

        $this->load->library('upload', $config);
        $upload_data = $this->upload->data();

        if ($this->upload->do_upload('image')) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password harus diisi
      </div>');
                redirect('user');
            } else {

                $data  = [
                    "name" => htmlspecialchars($this->input->post('name', true)),
                    "username_nrp_nip" => htmlspecialchars($this->input->post('username', true)),
                    "email" => htmlspecialchars($this->input->post('email', true)),
                    "image" => $this->upload->data('file_name'),
                    "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];

                $id = $this->input->post('id');

                $where = array(
                    'id' => $id
                );

                $this->m_user->update_data($where, $data, 'User');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update
      </div>');
                redirect('user');
            }
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password harus diisi
      </div>');
                redirect('user');
            } else {

                $data  = [
                    "name" => htmlspecialchars($this->input->post('name', true)),
                    "username_nrp_nip" => htmlspecialchars($this->input->post('username', true)),
                    "email" => htmlspecialchars($this->input->post('email', true)),
                    "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];

                $id = $this->input->post('id');

                $where = array(
                    'id' => $id
                );

                $this->m_user->update_data($where, $data, 'User');
                //return "default.jpg";
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update
      </div>');
                redirect('user');
                return "default.jpg";
            }
        }
    }

    public function judul()
    {
        $data['title'] = 'Pengajuan Judul Tugas Akhir';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/judul', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dosen()
    {
        $data['title'] = 'Pengajuan Dosen Pembimbing';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();

        $this->load->model('m_user');
        // $data['data'] = $this->db->get('judul');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/dosen', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pembagianRMK()
    {
        $data['title'] = 'Pembagian RMK';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pembagianRMK', $data);
        $this->load->view('templates/footer', $data);
    }

    public function statusSkripsi()
    {
        $data['title'] = 'Status Skripsi';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/statusSkripsi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout
      </div>');
        redirect('auth');
    }

    public function tambah_dosen()
    {
        $this->load->model('m_user');
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();
        $data['judul'] = $this->db->get_where('judul', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();

        $dosen1 = $this->input->post('dosbing1');
        $dosen2 = $this->input->post('dosbing2');


        $data = array(
            'dosen1' => $dosen1,
            'dosen2' => $dosen2,
            'status_dosen' => 'Belum Disetujui'

        );

        $id = $this->input->post('id_judul');

        $where = array(
            'id_judul' => $id
        );


        $this->m_user->update_data($where, $data, 'judul');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan dosen berhasil dilakukan
      </div>');
        redirect('user/dosen');
    }

    public function judull1()
    {
        $data['title'] = 'Pengajuan Judul Tugas Akhir';
        $data['user'] = $this->db->get_where('user', ['username_nrp_nip' => $this->session->userdata('username')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/judull1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function download()
    {
        $this->load->helper('download');

        force_download('./proposaljudul/proposal.pdf', null);
    }
}
