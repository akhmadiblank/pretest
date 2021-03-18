<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-6">
            <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
            <?php if ($this->session->flashdata()) : ?>
                <!-- <div class="flash-data" data-flashdata=""></div> -->
                <?= $this->session->flashdata('flashmassage'); ?>

            <?php endif; ?>
        </div>
    </div>

    <!-- card view  -->
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('asset/img/') . $user['image']; ?>" class="mt-3 ml-3 figure-img img-fluid rounded" style="width:150px;height:200px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">mamber since:<?= date('d F Y', $user['date_create']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->