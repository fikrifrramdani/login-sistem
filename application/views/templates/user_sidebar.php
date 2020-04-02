<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-code"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Ngoding</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Looping Menu -->
   <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading mt-2">
         <?= $m['menu']; ?>
      </div>

      <!-- Sub menu sesuai menu -->
      <?php
      $menuid = $m['id'];
      $querySubMenu = "SELECT * FROM `user_sub_menu`
						  WHERE `menu_id` = $menuid
						   AND `is_active` = 1";

      $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

      <?php foreach ($subMenu as $sm) : ?>
         <?php if ($title == $sm['title']) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>

            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
               <i class="<?= $sm['icon']; ?>"></i>
               <span><?= $sm['title']; ?></span></a>
            </li>

         <?php endforeach; ?>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

      <?php endforeach; ?>

      <!-- Nav Item - Logout -->
      <li class="nav-item">
         <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
<!-- End of Sidebar -->
