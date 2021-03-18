<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
    <div class="row">
        <div class="col-lg-6">
            <?php if ($this->session->flashdata()) : ?>
                <!-- <div class="flash-data" data-flashdata=""></div> -->
                <?= $this->session->flashdata('flashmassage'); ?>
            <?php endif; ?>
            <form method="post" action="<?= base_url('User/ChangePassword'); ?>">
                <div class="form-group row">
                    <label for="current password" class="col-sm-3 col-form-label col-form-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control" id="current password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password1" class="col-sm-3 col-form-label col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control" id="password1" name="Password1">
                        <?= form_error('Password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-3 col-form-label col-form-label">Repaet Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control" id="password2" name="Password2">
                        <?= form_error('Password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Change Password
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->