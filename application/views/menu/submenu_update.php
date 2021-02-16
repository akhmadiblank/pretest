<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Update Submenu Management</h1>
    <div class="row">
        <div class="col-sm-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="flash-data" data-flashdata="<?= $this->session->tempdata('flash'); ?>"></div>
            <?php $this->session->unset_tempdata('flash'); ?>
            <form action="<?= base_url() ?>Menu/updatesubmenu/<?= $menu_update['id']; ?>" method="POST">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $menu_update['title']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu_id" class="col-sm-2 col-form-label">Nama menu</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($sub_menu as $sm) : ?>
                                <?php if ($sm['menu'] == $menu_update['menu']) : ?>
                                    <option value="<?= $sm['id']; ?>" selected><?= $menu_update['menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $sm['id']; ?>"><?= $sm['menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $menu_update['url']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu_update['icon']; ?>">
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="is_active" checked>
                    <label class="form-check-label" for="inlineCheckbox1">Is_actived</label>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-dismiss="modal" href="<?= base_url('Menu/submenu'); ?>">Close</a>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->