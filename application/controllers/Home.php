<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }



    public function index()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
            redirect('admin');
        } elseif ($user['role_id'] == 2) {
            redirect('user');
        } elseif ($user['role_id'] == null) {
            redirect('auth');
        }
    }
}
