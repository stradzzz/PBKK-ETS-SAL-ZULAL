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
                        <th scope="col">Status Skripsi</th>
                        <th scope="col">Dosen Pembimbing 1</th>
                        <th scope="col">Dosen Pembimbing 2</th>
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
                            <form class="user" method="post" action="<?= base_url(); ?>kaprodi/submitdosen1/<?= $mhs['id_skripsi']; ?>">
                                <input type="text" class="form-control; width:200px;" id="dosbing_1" name="dosbing_1" placeholder="<?= $mhs['dosbing_1']; ?>" ?>
                                <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                    Edit
                                </button>
                            </form>
                        </td>
                        <td>
                            <form class="user" method="post" action="<?= base_url(); ?>kaprodi/submitdosen2/<?= $mhs['id_skripsi']; ?>">
                                <input type="text" class="form-control; width:200px;" id="dosbing_2" name="dosbing_2" placeholder="<?= $mhs['dosbing_2']; ?>" ?>
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