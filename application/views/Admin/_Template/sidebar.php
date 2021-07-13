<?php
  $getGrup = $this->session->userdata('session_grup');
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url();?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-hand-holding-usd"></i>
    </div>
    <div class="sidebar-brand-text mx-2">e-finance</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= uri_string() == '' ? 'active':'' ?>">
    <a class="nav-link" href="<?=base_url();?>">
      <i class="fas fa-fw fa-tachometer-alt" style="font-size: 20px;"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi
  </div>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item <?= uri_string() == 'h/pendapatan' ? 'active':'' ?>">
    <a class="nav-link collapsed" href="<?=base_url('h/pendapatan');?>">
      <i class="fas fa-plus-circle" style="font-size: 20px;"></i>
      <span>Pendapatan</span>
    </a>
  </li>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item <?= uri_string() == 'h/pengeluaran' ? 'active':'' ?>">
    <a class="nav-link collapsed" href="<?=base_url('h/pengeluaran');?>" >
      <i class="fas fa-minus-circle" style="font-size: 20px;"></i>
      <span>Pengeluaran</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Hasil
  </div>
  
  <!-- Nav Item - Tables -->
  <li class="nav-item <?= uri_string() == 'h/laporan' ? 'active':'' ?>">
    <a class="nav-link" href="<?=base_url('h/laporan');?>">
      <i class="fas fa-fw fa-table" style="font-size: 20px;"></i>
      <span>Laporan</span>
    </a>
  </li>

  <?php if ($getGrup == "Admin"): ?>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Admin
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item <?= uri_string() == 'h/dataUsers' ? 'active':'' ?>">
      <a class="nav-link" href="<?=base_url('h/dataUsers');?>">
        <i class="fas fa-fw fa-users" style="font-size: 20px;"></i>
        <span>Data User</span>
      </a>
    </li>
    <li class="nav-item <?= uri_string() == 'h/laporanUser' ? 'active':'' ?>">
      <a class="nav-link" href="<?=base_url('h/laporanUser');?>">
        <i class="fas fa-fw fa-exclamation-triangle" style="font-size: 20px;"></i>
        <span>Laporan User</span>
      </a>
    </li>
  <?php endif ?>
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->