<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <br>
    <a href="<?= base_url("datauser"); ?>" class="btn btn-primary" role="button">Data User</a>
    <a href="<?= base_url("admin"); ?>" class="btn btn-primary" role="button">Data Skripsi Mahasiswa</a>
    <br> <br> <br>
    <div class="row-mt-3">
        <div class="col-md-6">
            <h3>Daftar Skripsi Mahasiswa</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">ID Skripsi</th>
                        <th scope="col">Topik Skripsi</th>
                        <th scope="col">Judul Skripsi</th>
                        <th scope="col">Konfirmasi Judul</th>
                        <th scope="col">Status Verifikasi</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Dosen Pembimbing 1</th>
                        <th scope="col">Dosen Pembimbing 2</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['nrp']; ?></td>
                        <td><?= $mhs['jurusan']; ?></td>
                        <td><?= $mhs['id_skripsi']; ?></td>
                        <td><?= $mhs['topik_skripsi']; ?></td>
                        <td><?= $mhs['judul_skripsi']; ?></td>
                        <td><?= $mhs['konfirm_judul']; ?></td>
                        <td><?= $mhs['status']; ?></td>
                        <td><?= $mhs['catatan']; ?></td>
                        <td><?= $mhs['dosbing_1']; ?></td>
                        <td><?= $mhs['dosbing_2']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/hapus/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:80px" class="badge badge-warning float-right" onclick="return confirm('yakin?');"> HAPUS</a>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>


</div> 