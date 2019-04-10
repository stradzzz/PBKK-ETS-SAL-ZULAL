<?php

class Mahasiswa_model extends CI_model
{
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getMahasiswaVerif()
    {
        $where = "SELECT * FROM mahasiswa WHERE konfirm_judul = ?";
        return $this->db->query($where, 'Telah Dikonfirmasi')->result_array();
    }


    public function getMahasiswaKaprodi()
    {
        $where = "SELECT * FROM mahasiswa WHERE status = ? OR status = ?";
        return $this->db->query($where, array('Diterima', 'Diterima Bersyarat'))->result_array();
        //        return $this->db->query($where, 'Diterima Bersyarat')->result_array();
    }


    public function tambahDataMahasiswa()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'txt';
        $config['max_size']    = 5120;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('message', 'alert');
        } else {

            $upload_data = $this->upload->data();
            $data = array(
                "id_skripsi" => $this->input->post('id_skripsi', true),
                "nama" => $this->input->post('nama', true),
                "nrp" => $this->input->post('nrp', true),
                "jurusan" => $this->input->post('jurusan', true),
                "topik_skripsi" => $this->input->post('topik_skripsi', true),
                "judul_skripsi" => $this->input->post('judul_skripsi', true),
                "konfirm_judul" => $this->input->post('konfirm_judul', true),
                "status" => $this->input->post('status', true),
                "dosbing_1" => $this->input->post('dosbing_1', true),
                "dosbing_2" => $this->input->post('dosbing_2', true),
                "proposal" =>  $upload_data['file_name']
            );
            $this->db->insert('mahasiswa', $data);
            //  $this->session->set_flashdata('message', 'berhasil');
        }
    }

    public function simpan_file($judul, $deskripsi, $oleh, $file)
    {
        $hsl = $this->db->query("INSERT INTO tbl_files(file_judul,file_deskripsi,file_oleh,file_data) VALUES ('$judul','$deskripsi','$oleh','$file')");
        return $hsl;
    }

    //admin

    public function hapusDataMahasiswa($id_skripsi)
    {
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->delete('mahasiswa');
    }


    //verif
    public function setujuDataMahasiswa($id_skripsi)
    {
        $this->db->set('status', 'Diterima');
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->update('mahasiswa');
    }
    public function syaratDataMahasiswa($id_skripsi)
    {
        $this->db->set('status', 'Diterima Bersyarat');
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->update('mahasiswa');
    }
    public function tolakDataMahasiswa($id_skripsi)
    {
        $this->db->set('status', 'Ditolak');
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->update('mahasiswa');
    }

    public function submitCatatanMahasiswa($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

        // $this->db->set('catatan', $data);
        // $this->db->where('id_skripsi', $id_skripsi);
        // $this->db->update('mahasiswa');
    }


    //kaprodi
    public function submitKaprodiDosen($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }



    //dosbing
    public function konfirmasiJudul($id_skripsi)
    {
        $this->db->set('konfirm_judul', 'Telah Dikonfirmasi');
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->update('mahasiswa');
    }
    public function tolakkonfirmasiKudul($id_skripsi)
    {
        $this->db->set('konfirm_judul', 'Ditolak');
        $this->db->where('id_skripsi', $id_skripsi);
        $this->db->update('mahasiswa');
    }
}
