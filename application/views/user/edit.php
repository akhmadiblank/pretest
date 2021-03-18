<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Page</h1>

    <!-- page form -->
    <div class="row">
        <div class="col-md-6">
            <?= form_open_multipart('User/edit'); ?>
            <div class="form-group row">
                <label for="inputemail" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputemail" name="email" value="<?= $user['email']; ?>" Readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputusername" class="col-sm-2 col-form-label">username</label>
                <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputusername" name="name" value="<?= $user['nama']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('asset/img/') . $user['image']; ?>" width="100px" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->