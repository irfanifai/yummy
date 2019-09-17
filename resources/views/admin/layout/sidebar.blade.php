<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yummy</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-home"></i>
        <span>Halaman Dashboard</span></a>
    </li>

    <!-- Nav Item User Admin-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userAdmin" aria-expanded="true" aria-controls="userAdmin">
        <i class="far fa-fw fa-user"></i>
        <span>User Admin</span>
        </a>
        <div id="userAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('useradmin.index') }}">Daftar User Admin</a>
            <a class="collapse-item" href="{{ route('useradmin.create') }}">Buat User Admin Baru</a>
        </div>
        </div>
    </li>

    <!-- Nav Item User Website-->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-user-circle"></i>
        <span>User Web</span></a>
    </li>

    <!-- Nav Item Artikel-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#article" aria-expanded="true" aria-controls="article">
        <i class="far fa-fw fa-edit"></i>
        <span>Artikel Blog</span>
        </a>
        <div id="article" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Semua Artikel</a>
            <a class="collapse-item" href="#">Buat Artikel</a>
            <a class="collapse-item" href="{{ route('kategori.index') }}">Kategori Artikel</a>
        </div>
        </div>
    </li>

    <!-- Nav Item Komentar-->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="far fa-fw fa-comment-alt"></i>
        <span>Komentar</span></a>
    </li>

    <!-- Nav Tentang Kami-->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-info"></i>
        <span>Tentang Kami</span></a>
    </li>

    <!-- Nav Pesan-->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Pesan</span></a>
    </li>

    <!-- Nav Pesan-->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pesan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
