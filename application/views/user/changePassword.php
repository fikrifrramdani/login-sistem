<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow border-left-info">
        <?= $this->session->flashdata('message'); ?>
        <div class="card-header">
            <h1 class="h3 text-dark"><?= $title; ?></h1>
        </div>
        <div class="card-body">
            <!-- Content -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('user/changePassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                            <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                            <?= form_error('newPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Repeat Password</label>
                            <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                            <?= form_error('repeatPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
