<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Submenu Management</h1>
    <div class="row">
        <div class="col-sm">
            <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add_Sub_Menu">Add Sub_Menu</a>
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
                            <th scope="col">MENU</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">URL</th>
                            <th scope="col">ICON</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tb>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td><?= $m['title']; ?></td>
                                <td><?= $m['url']; ?></td>
                                <td><?= $m['icon']; ?></td>
                                <td class="">
                                    <a href="<?= base_url() ?>Menu/hapus_sub_menu/<?= $m['id'] ?>" class="badge bg-danger tombol-hapus">Delate</a> |

                                    <a href="<?= base_url() ?>Menu/updatesubmenu/<?= $m['id'] ?>" class="badge bg-success">Update</a>

                                </td>
                            </tr>
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
<div class="modal fade" id="add_Sub_Menu" tabindex="-1" aria-labelledby="add_sub_MenuLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_sub_MenuLabel">Add Sub_Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('menu/submenu'); ?>" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="add your sub menu title">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($sub_menu as $sm) : ?>
                                <option value="<?= $sm['id']; ?>"><?= $sm['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="add your url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="add your icon code">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="is_active" checked>
                        <label class="form-check-label" for="inlineCheckbox1">Is_actived</label>
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
<!-- Modal submenu-->
<div class="modal fade" id="updatesubMenu" tabindex="-1" aria-labelledby="updatesubMenuLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatesubMenuLabel">Update Sub_Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url() ?>Menu/updatesubmenu/<?= $m['id'] ?>" method="POST">

                    <div class="form-group">

                        <input type="text" class="form-control" id="title" name="title" value="<?= $title; ?>">

                    </div>
                    <div class="form-group">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($sub_menu as $sm) : ?>
                                <option value="<?= $sm['id']; ?>"><?= $sm['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $m['url']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $m['icon']; ?>">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="is_active" checked>
                        <label class="form-check-label" for="inlineCheckbox1">Is_actived</label>
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