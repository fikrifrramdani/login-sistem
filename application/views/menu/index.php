<!-- Begin Page Content -->
<div class="container-fluid">

   <div class="row">
      <div class="col-lg-7">

         <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>

         <?= $this->session->flashdata('message'); ?>

         <!-- DataTales Example -->
         <div class="card shadow border-left-info mb-4">
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-6">
                     <h4 class="m-0 font-weight-bold text-primary"><?= $title; ?></h4>
                  </div>
                  <div class="col-lg-6">
                     <a class="float-right shadow btn btn-primary" href="#" data-toggle="modal" data-target="#menuModal">Add New Menu</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th scope="col">No</th>
                           <th scope="col">Menu</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($Mmenu as $m) : ?>
                           <tr>
                              <th scope="row"><?= $i++ ?></th>
                              <td><?= $m['menu']; ?></td>
                              <td>
                                 <a class="badge badge-pill badge-success" href="<?= base_url('menu/changeMenu/') . $m['id']; ?>">edit</a>
                                 <a class="badge badge-pill badge-danger" href="<?= base_url('menu/hapus/') . $m['id']; ?>">delete</a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Input -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="menuModalLabel">Add New Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('menu'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Add</button>
            </div>
         </form>
      </div>
   </div>
</div>
