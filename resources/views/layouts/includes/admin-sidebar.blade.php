
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link  {{Route::currentRouteName() == 'dashboard' ? 'active' : ''}}"   href="{{ route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- CATEGRIAS --}}
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link {{ Route::currentRouteName() == 'categoria.index' || Route::currentRouteName() == 'categoria.create' ? 'collapsed active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categorias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::currentRouteName() == 'categoria.index'  || Route::currentRouteName() == 'categoria.create' ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Route::currentRouteName() == 'categoria.index' ? 'active' : ''}}" href="{{route('categoria.index')}}">Categorias</a>
                        <a class="nav-link {{Route::currentRouteName() == 'categoria.create' ? 'active' : ''}}" href="{{route('categoria.create')}}">Adicionar Categoria</a>
                    </nav>
                </div>

                {{-- POSTS --}}

                <a class="nav-link {{ Route::currentRouteName() == 'posts.index'  || Route::currentRouteName() == 'posts.create' ? 'collapsed active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::currentRouteName() == 'posts.index'  || Route::currentRouteName() == 'posts.create' ? 'show' : '' }}" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Route::currentRouteName() == 'posts.index' ? 'active' : ''}}" href="{{route('posts.index')}}">Posts</a>
                        <a class="nav-link {{Route::currentRouteName() == 'posts.create' ? 'active' : ''}}" href="{{route('posts.create')}}">Adicionar Post</a>
                    </nav>
                </div>

                {{-- USERS --}}

                {{-- <a class="nav-link"  {{Request::is('admin/users*') ? 'active' : ''}} href="{{ route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuários
                </a> --}}

                <a class="nav-link {{Route::currentRouteName() == 'users.index' ? 'active' : ''}}" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuários
                </a>
                

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
