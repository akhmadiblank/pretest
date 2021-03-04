<form action="<?= base_url('Admin/update_Role/') ?><?= $id['id']; ?>" method="POST">

    <div class="form-group">
        <input type="text" class="form-control" id="role" name="role" placeholder="add new role" value="<?= $id['role']; ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah" class="btn btn-primary">Update</button>
    </div>
</form>