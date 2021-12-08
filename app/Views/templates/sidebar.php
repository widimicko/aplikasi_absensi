<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="mt-4 sidebar-brand d-flex align-items-center justify-content-center" href="/">
  <img src="<?= base_url('image/logo_kemenag.png') ?>"  class="img-fluid" alt="Logo" width="75px" height="75px">
  <div class="mt-4 sidebar-brand-text mx-auto">Aplikasi Absensi</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0 mt-4">

<div class="sidebar-heading color-white">
   Absensi
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('absensi') ?>">
    <i class="fas fa-book"></i>
    <span class="color-white">Absensi</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
      aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-database"></i>
      <span>Rekap</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Rekap</h6>
          <a class="collapse-item" href="<?= base_url('rekap') ?>">Semua Data</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/1') ?>">Kelas 1</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/2') ?>">Kelas 2</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/3') ?>">Kelas 3</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/4') ?>">Kelas 4</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/5') ?>">Kelas 5</a>
          <a class="collapse-item" href="<?= base_url('rekap/kelas/6') ?>">Kelas 6</a>
      </div>
  </div>
</li>


<hr class="sidebar-divider my-0 mt-4">

<div class="sidebar-heading color-white">
   Akademik
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
      aria-expanded="true" aria-controls="collapseThree">
      <i class="fas fa-users"></i>
      <span>Data Siswa</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Siswa</h6>
          <a class="collapse-item" href="<?= base_url('siswa') ?>">Semua Data</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/1') ?>">Kelas 1</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/2') ?>">Kelas 2</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/3') ?>">Kelas 3</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/4') ?>">Kelas 4</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/5') ?>">Kelas 5</a>
          <a class="collapse-item" href="<?= base_url('siswa/kelas/6') ?>">Kelas 6</a>
      </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('semester') ?>">
    <i class="fas fa-server"></i>
    <span class="color-white">Data Semester</span>
  </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt"></i>
    <span class="color-white">Keluar</span>
  </a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->