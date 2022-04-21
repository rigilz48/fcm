<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url(); ?>" class="brand-link text-center">
    <span class="brand-text font-weight-light"><?= APP_NAMESPACE; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url(); ?>/dist/img/<?= user()->user_image; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url(); ?>/profile" class="d-block"><?php if (user()->fullname == null) : echo user()->username;
                                                              else : echo user()->fullname;
                                                              endif; ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url(); ?>/admin" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Beranda</p>
          </a>
        </li>
        <?php if (in_groups('admin') && has_permission('blog') or in_groups('user') && has_permission('blog')) : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/admin/blog" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>Blog</p>
            </a>
          </li>
        <?php endif ?>
        <?php if (in_groups('admin') && has_permission('category-blog') or in_groups('user') && has_permission('category-blog')) : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/admin/categoryblog" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Kategori Blog</p>
            </a>
          </li>
        <?php endif ?>
        <?php if (in_groups('admin') && has_permission('contact') or in_groups('user') && has_permission('contact')) : ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/admin/contact" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Kontak</p>
            </a>
          </li>
        <?php endif ?>
        <?php if (in_groups('admin') or in_groups('user')) : ?>
          <li class="nav-header">PENGATURAN</li>
          <?php if (in_groups('admin') && has_permission('profile') or in_groups('user') && has_permission('profile')) : ?>
            <li class="nav-item">
              <a href="<?= base_url(); ?>/admin/profile" class="nav-link">
                <i class="nav-icon far fa-address-card"></i>
                <p>Profil</p>
              </a>
            </li>
          <?php endif ?>
          <?php if (has_permission('management-user') or has_permission('management-menuaccess')) : ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Management<i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php if (in_groups('admin') && has_permission('management-user') or in_groups('user') && has_permission('management-user')) : ?>
                  <li class="nav-item">
                    <a href="<?= base_url(); ?>/admin/management/user" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User</p>
                    </a>
                  </li>
                <?php endif ?>
                <?php if (in_groups('admin') && has_permission('management-menuaccess') or in_groups('user') && has_permission('management-menuaccess')) : ?>
                  <li class="nav-item">
                    <a href="<?= base_url(); ?>/admin/management/website" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Website</p>
                    </a>
                  </li>
                <?php endif ?>
              </ul>
            </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>Logout</p>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>