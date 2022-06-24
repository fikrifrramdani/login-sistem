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
            <?php foreach ($subMenu as $sm) : ?>
               <form method="post" action="<?= base_url('menu/updateSubMenu'); ?>">
                  <div class="modal-body">
                     <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $sm['id']; ?>">
                        <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu title" value="<?= $sm['title']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                           <?php foreach ($menu as $m) : ?>
                              <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url" value="<?= $sm['url']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu icon" value="<?= $sm['icon']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                        <div class="form-check">
                           <input type="checkbox" class="form-check-input" value="1" id="is_active" checked name="is_active" placeholder="SubMenu active">
                           <label class="form-check-label" for="is_active">Active?</label>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary" value="simpan">Save</button>
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
