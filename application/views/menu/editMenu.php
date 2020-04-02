<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="card shadow border-left-info">
      <div class="card-header">
         <h1 class="m-0 font-weight-bold text-primary"><?= $title; ?></h1>
      </div>
      <?= $this->session->flashdata('message'); ?>
      <div class="card-body">
         <!-- Content -->
         <div class="col-lg-6">
            <?php foreach ($Mmenu as $m) : ?>
               <form method="post" action="<?= base_url('menu/updateMenu'); ?>">
                  <div class="modal-body">
                     <div class="form-group">
                        <input type="text" name="id" id="id" class="form-control mb-3" value="<?= $m['id']; ?>" readonly>
                        <input type="text" class="form-control" id="title" name="menu" placeholder="Menu title" value="<?= $m['menu']; ?>">
                        <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <button type="submit" class="btn btn-primary" value="update">Save</button>
                  </div>
               </form>
            <?php endforeach; ?>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
