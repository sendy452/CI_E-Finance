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
  <li class="nav-item active">
    <a class="nav-link" href="<?=base_url();?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
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
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?=base_url('h/pendapatan');?>">
      <i class="fas fa-fw fa-arrow-up"></i>
      <span>Pendapatan</span>
    </a>
  </li>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?=base_url('h/pengeluaran');?>" >
      <i class="fas fa-fw fa-arrow-down"></i>
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
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('h/laporan');?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Laporan</span>
    </a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->