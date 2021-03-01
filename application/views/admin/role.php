<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Role Acces</h1>
    <div class="row">
        <div class="col-sm-6">
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
                        <?php foreach ($role as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['role']; ?></td>
                                <td class="">
                                    <a href="<?= base_url() ?>Admin/role_access/<?= $m['id'] ?>" class="badge bg-warning">Access</a>

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