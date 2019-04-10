<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
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
            <h3>Data User</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role ID</th>
                        <th scope="col">Edit Role</th>
                        <th scope="col">Active (1/0)</th>
                        <th scope="col">Edit Acvite Status</th>
                        <th scope="col">Hapus Data</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user1 as $usr) : ?>
                        <tr>
                            <td><?= $usr['name']; ?></td>
                            <td><?= $usr['email']; ?></td>
                            <td><?= $usr['role_id']; ?></td>
                            <!-- <td>
                                                        <form class="user" method="post" action="<?= base_url(); ?>datauser/editrole/<?= $usr['id']; ?>">
                                                            <input type="text" class="form-control; width:50px;" id="role_id" name="role_id" placeholder="<?= $usr['role_id']; ?>" ?>
                                                            <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                                                Edit
                                                            </button>
                                                        </form>
                                                    </td> -->
                            <td>
                                <form class="user" method="post" action="<?= base_url(); ?>datauser/editrole/<?= $usr['id']; ?>">
                                    <select class="form-control; width:50px;" id="role_id" name="role_id" placeholder="<?= $usr['role_id']; ?>" ?>
                                        <option value="1">Administrator</option>
                                        <option value="2">Member</option>
                                        <option value="3">Dosen Pembimbing</option>
                                        <option value="4">Tim Verifikasi</option>
                                        <option value="5">Kepala Prodi</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                        Edit
                                    </button>
                                </form>
                            </td>
                            <td><?= $usr['is_active']; ?></td>
                            <td>
                                <form class="user" method="post" action="<?= base_url(); ?>datauser/editactive/<?= $usr['id']; ?>">
                                    <select class="form-control; width:50px;" id="is_active" name="is_active" placeholder="<?= $usr['is_active']; ?>" ?>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                        Edit
                                    </button>
                                </form>
                            </td>
                            <!-- <td><?= $usr['is_active']; ?></td>
                                                <td>
                                                    <form class="user" method="post" action="<?= base_url(); ?>datauser/editactive/<?= $usr['id']; ?>">
                                                        <input type="text" class="form-control; width:50px;" id="is_active" name="is_active" placeholder="<?= $usr['is_active']; ?>" ?>
                                                        <button type="submit" class="btn btn-primary btn-block; width:50px;">
                                                            Edit
                                                        </button>
                                                    </form>
                                                </td> -->

                            <td>
                                <a href="<?= base_url(); ?>datauser/hapus/<?= $usr['id']; ?>" style="display:inline-block; width:80px" class="badge badge-warning float-right" onclick="return confirm('yakin?');"> HAPUS</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>


</div>