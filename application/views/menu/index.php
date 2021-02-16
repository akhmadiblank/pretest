<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Menu</h1>
    <div class="row">
        <div class="col-sm-6">
            <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMenu">Add Menu</a>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
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
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td class="">
                                    <a href="<?= base_url() ?>Menu/hapus_menu/<?= $m['id'] ?>" class="badge bg-danger tombol-hapus">Delate</a> |
                                    <a href="" class="badge bg-success" data-toggle="modal" data-target="#updateMenu">Update</a>

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




<!-- Modal -->
<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="addMenuLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" aria-describedby="emailHelp" name="menu" placeholder="add your menu">
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
<!-- Modal update-->
<div class="modal fade" id="updateMenu" tabindex="-1" aria-labelledby="updateMenuLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMenuLabel">Update Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url() ?>Menu/update_menu/<?= $m['id'] ?>" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="menu_update" aria-describedby="emailHelp" name="menu_update" placeholder="update your menu" value="<?= $m['menu'] ?>">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button href="" type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>