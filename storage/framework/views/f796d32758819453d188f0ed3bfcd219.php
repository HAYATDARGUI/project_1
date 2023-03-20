<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('clients')); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Client</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('produits')); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Produit</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('receptions')); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Reception</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>
<?php /**PATH C:\Users\hp\laravelapp\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>