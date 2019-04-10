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
                        <td>
                            <a href="<?= base_url(); ?>dosbing/setuju/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:80px" class="badge badge-success float-right" onclick="return confirm('yakin?');"> KONFIRMASI</a>
                            <a href="<?= base_url(); ?>dosbing/tolak/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:80px" class="badge badge-danger float-right" onclick="return confirm('yakin?');"> TOLAK</a>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>


</div> 