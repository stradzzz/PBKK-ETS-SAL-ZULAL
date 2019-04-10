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
                        <th scope="col">Status Verifikasi</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Edit Catatan</th>
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
                        <td><?= $mhs['status']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>verif/terima/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:130px" class="badge badge-success float-right" onclick="return confirm('yakin?');"> TERIMA</a>
                            <a href="<?= base_url(); ?>verif/terimabersyarat/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:130px" class="badge badge-warning float-right" onclick="return confirm('yakin?');"> TERIMA BERSYARAT</a>
                            <a href="<?= base_url(); ?>verif/ditolak/<?= $mhs['id_skripsi']; ?>" style="display:inline-block; width:130px" class="badge badge-danger float-right" onclick="return confirm('yakin?');"> TOLAK</a>
                        </td>
                        <td><?= $mhs['catatan']; ?></td>
                        <td>
                            <form class="user" method="post" action="<?= base_url(); ?>verif/submitcatatan/<?= $mhs['id_skripsi']; ?>">
                                <input type="text" class="form-control; width:200px;" id="catatan" name="catatan" placeholder="Type here" ?>
                                <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                    Edit
                                </button>
                            </form>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>


</div> 