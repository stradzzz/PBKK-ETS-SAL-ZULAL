<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Skripsi OKE</div>
    </a>

    <!-- Divider -->

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "  SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU  -->
    <?php foreach ($menu as $m) : ?>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        <?= $m['menu'] ?>
    </div>

    <!-- LOOPING SUBMENU  -->
    <?php
    $menuId = $m['id'];
    $querySubMenu = "   SELECT *
                            FROM `user_sub_menu` 
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                    ";

    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>



    <?php foreach ($subMenu as $sm) : ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
            <i class="<?= ($sm['icon']); ?>"></i>
            <span><?= ($sm['title']); ?></span></a>
    </li>
    <?php endforeach; ?>

    <?php endforeach; ?>


    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Pengajuan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Pengajuan:</h6>
                <a class="collapse-item" href="<?= base_url('pengajuan/judul'); ?>">Judul Skripsi</a>
                <!--            <a class="collapse-item" href="<?= base_url('pengajuan/sempro'); ?>">Seminar Proposal</a>
                <a class="collapse-item" href="<?= base_url('pengajuan/sidang'); ?>">Sidang Skripsi</a>
     -->
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            <span>Log out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar --> 