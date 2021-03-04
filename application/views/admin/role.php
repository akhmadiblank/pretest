<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Role Acces</h1>
    <div class="row">
        <div class="col-sm-6">
            <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add_role_access"><i class="fas fa-plus"></i> Add Role Admin</a>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger pb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= validation_errors(); ?>

                </div>
            <?php endif; ?>

            <div class="flash-data" data-flashdata="<?= $this->session->tempdata('flash'); ?>"></div>
            <?php $this->session->unset_tempdata('flash'); ?>
            <form action="">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['role']; ?></td>
                                <td class="">
                                    <a href="<?= base_url() ?>Admin/role_access/<?= $m['id'] ?>" class="badge bg-warning">Access</a> |
                                    <a href="" class="badge bg-success" data-toggle="modal" data-target="#update" data-id="<?= $m['id'] ?>">Update</a> |
                                    <a href="<?= base_url() ?>Admin/delate_role_access/<?= $m['id'] ?>" class="badge bg-danger tombol-hapus">Delate</a>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Tambah role acces -->
<div class="modal fade" id="add_role_access" tabindex="-1" aria-labelledby="add_role_accessLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_role_accessLabel">Add Role Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('Admin/addRole'); ?>" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="add new role">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal update role acces -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Role Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-data"></div>

            </div>
        </div>
    </div>
</div>