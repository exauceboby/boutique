@php
$route = request()->route()->getName();
@endphp
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @can('dashboard_view')
            <li class="nav-item">
                <a href="{{ route('backend.admin.dashboard') }}"
                    class="nav-link {{ $route === 'backend.admin.dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Tableau de Bord</p>
                </a>
            </li>
            @endcan

            @can('sale_create')
            <li class="nav-item">
                <a href="{{ route('backend.admin.cart.index') }}"
                    class="nav-link {{ $route === 'backend.admin.cart.index' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>Panier</p>
                </a>
            </li>
            @endcan

            {{-- PEOPLE = CLIENTS & FOURNISSEURS --}}
            @if (auth()->user()->hasAnyPermission([
                'customer_create','customer_view','customer_update','customer_delete','customer_sales',
                'supplier_create','supplier_view','supplier_update','supplier_delete'
            ]))
            <li class="nav-item {{ request()->routeIs(['backend.admin.customers.index','backend.admin.customers.create','backend.admin.customers.edit','backend.admin.suppliers.index','backend.admin.suppliers.create','backend.admin.suppliers.edit']) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-circle nav-icon"></i>
                    <p>
                        Personnes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    @if (auth()->user()->hasAnyPermission(['customer_create','customer_view','customer_update','customer_delete']))
                    <li class="nav-item">
                        <a href="{{route('backend.admin.customers.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.customers.index','backend.admin.customers.edit','backend.admin.customers.create']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Clients</p>
                        </a>
                    </li>
                    @endif
                </ul>

                <ul class="nav nav-treeview">
                    @if (auth()->user()->hasAnyPermission(['supplier_create','supplier_view','supplier_update','supplier_delete']))
                    <li class="nav-item">
                        <a href="{{route('backend.admin.suppliers.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.suppliers.index','backend.admin.suppliers.edit','backend.admin.suppliers.create']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Fournisseurs</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif


            {{-- PRODUITS --}}
            @if (auth()->user()->hasAnyPermission([
                'product_create','product_view','product_update','product_delete','product_import','product_purchase'
            ]))
            <li class="nav-item {{ request()->routeIs(['backend.admin.products.index','backend.admin.products.create','backend.admin.products.edit','backend.admin.brands.index','backend.admin.brands.create','backend.admin.brands.edit','backend.admin.categories.index','backend.admin.categories.create','backend.admin.categories.edit']) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fas fa-box nav-icon"></i>
                    <p>
                        Produits
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('backend.admin.products.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.products.index','backend.admin.products.edit']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Liste des Produits</p>
                        </a>
                    </li>

                    @can('product_create')
                    <li class="nav-item">
                        <a href="{{route('backend.admin.products.create')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.products.create']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Créer un Produit</p>
                        </a>
                    </li>
                    @endcan

                    @can('product_import')
                    <li class="nav-item">
                        <a href="{{route('backend.admin.products.import')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.products.import']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Importer Produits</p>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{route('backend.admin.brands.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.brands.index','backend.admin.brands.create','backend.admin.brands.edit']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Marques</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.admin.categories.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.categories.index','backend.admin.categories.create','backend.admin.categories.edit']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Catégories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.admin.units.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.units.index','backend.admin.units.create','backend.admin.units.edit']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Unités</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            {{-- VENTES --}}
            @if (auth()->user()->hasAnyPermission(['sale_view']))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>
                        Ventes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('backend.admin.orders.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.orders.index']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Liste des Ventes</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            {{-- ACHATS --}}
            @if (auth()->user()->hasAnyPermission([
                'purchase_create','purchase_view','purchase_update','purchase_delete'
            ]))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-bag nav-icon"></i>
                    <p>
                        Achats
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('backend.admin.purchase.index')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.purchase.index']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Liste des Achats</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.admin.purchase.create')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.purchase.create']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Nouvel Achat</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            {{-- RAPPORTS --}}
            @if (auth()->user()->hasAnyPermission([
                'reports_summary','reports_sales','reports_inventory'
            ]))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-bar nav-icon"></i>
                    <p>
                        Rapports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('backend.admin.sale.summery')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.sale.summery']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Résumé des Ventes</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.admin.sale.report')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.sale.report']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Rapport des Ventes</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('backend.admin.inventory.report')}}"
                            class="nav-link {{ request()->routeIs(['backend.admin.inventory.report']) ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Inventaire</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            {{-- PARAMÈTRES --}}
            @if (auth()->user()->hasAnyPermission([
                'currency_create','currency_view','currency_update','currency_delete',
                'role_create','role_view','role_update','role_delete','permission_view',
                'user_create','user_view','user_update','user_delete','user_suspend',
                'website_settings','contact_settings','socials_settings','style_settings',
                'custom_settings','notification_settings','website_status_settings','invoice_settings'
            ]))

            <li class="nav-header">PARAMÈTRES</li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog nav-icon"></i>
                    <p>
                        Paramètres du Site
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('backend.admin.settings.website.general') }}?active-tab=website-info"
                            class="nav-link {{ $route === 'backend.admin.settings.website.general' ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Paramètres Généraux</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('backend.admin.currencies.index') }}"
                            class="nav-link {{ request()->routeIs(['backend.admin.currencies.index','backend.admin.currencies.create','backend.admin.currencies.edit']) ? 'active' : '' }}">
                            <i class="fas fa-coins nav-icon"></i>
                            <p>Devise</p>
                        </a>
                    </li>

                    {{-- Roles & Permissions --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-chevron-circle-right nav-icon"></i> Rôles & Permissions</span>
                            <i class="fas fa-angle-left right"></i>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('backend.admin.roles') }}"
                                    class="nav-link {{ $route === 'backend.admin.roles' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rôles</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('backend.admin.permissions') }}"
                                    class="nav-link {{ $route === 'backend.admin.permissions' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- User Management --}}
                    <li class="nav-item">
                        <a href="{{ route('backend.admin.users') }}"
                            class="nav-link {{ $route === 'backend.admin.users' ? 'active' : '' }}">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Gestion des Utilisateurs</p>
                        </a>
                    </li>

                </ul>
            </li>

            @endif

        </ul>
    </nav>
</div>

<script>
    // Activation automatique du menu ouvert
    const treeviewElements = document.querySelectorAll('.nav-treeview');

    treeviewElements.forEach(treeviewElement => {
        const navLinkElements = treeviewElement.querySelectorAll('.nav-link.active');

        if (navLinkElements.length > 0) {
            const parentNavItem = treeviewElement.closest('.nav-item');
            if (parentNavItem) parentNavItem.classList.add('menu-open');

            const childNavLink = parentNavItem.querySelector('.nav-link');
            if (childNavLink) childNavLink.classList.add('active');
        }
    });
</script>
