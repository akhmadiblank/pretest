<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">
            <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Reset Password</h1>
                                    <h5 class=mb-4><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>
                                <?php if ($this->session->flashdata()) : ?>
                                    <!-- <div class="flash-data" data-flashdata=""></div> -->
                                    <?= $this->session->flashdata('flashmassage'); ?>
                                    <?php $this->session->sess_destroy(); ?>
                                <?php endif; ?>
                                <form class="user" method="post" action="<?= base_url('Auth/changePassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="Password1" placeholder="Enter new password..." name="Password1" value="<?= set_value('Password1'); ?>">
                                        <?= form_error('Password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="Password2" placeholder="repeat password..." name="Password2" value="<?= set_value('Password2'); ?>">
                                        <?= form_error('Password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                    <hr>

                                </form>


                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Back to home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>