<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Accueil</a>
        </li> --}}
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        @can('sale_create')
        <li class="nav-item dropdown">
            <a class="nav-link btn bg-gradient-primary text-white" href="{{route('backend.admin.cart.index')}}">
                <i class="fas fa-cart-plus"></i> Panier
            </a>
        </li>
        @endcan

        <!-- Fullscreen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- User menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i>
                <i class="fas fa-angle-double-down"></i>
            </a>

            <div class="dropdown-menu">
                <a href="{{ route('backend.admin.profile') }}" class="dropdown-item dropdown-footer">
                    <i class="fas fa-address-card"></i>
                    Profil
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer">
                    <i class="fas fa-sign-out-alt"></i>
                    Déconnexion
                </a>
            </div>
        </li>
    </ul>
</nav>
