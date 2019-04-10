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


            <div class="card">
                <div class="card-header">
                    Form Pengajuan Seminar Proposal Skripsi
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>


                    <form action="" method="post" ;>

                        <div class="form-group">
                            <label for="id_skripsi">ID Skripsi</label>
                            <input type="text" name="id_skripsi" class="form-control" id="id_skripsi">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>

                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" name="nrp" class="form-control" id="nrp">
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan">
                        </div>

                        <div class="form-group">
                            <label for="topik_skripsi">Topik Skripsi</label>
                            <input type="text" name="topik_skripsi" class="form-control" id="topik_skripsi">
                        </div>

                        <div class="form-group">
                            <label for="judul_skripsi">Judul Skripsi</label>
                            <input type="text" name="judul_skripsi" class="form-control" id="judul_skripsi">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>



        </div>
    </div>


</div> 