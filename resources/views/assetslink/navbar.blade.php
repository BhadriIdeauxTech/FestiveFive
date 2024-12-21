<div class="main-sidebar sidebar-style-2" style="background: linear-gradient(to bottom,#370d92 ,#6d3cdc);">
    <aside id="sidebar-wrapper" >
        <div class="sidebar-brand" style="background-color: #fff;" >
        <a href="{{ route('admin.home') }}" >
        <img src="{{ asset('logo/logo..png') }}" alt="logo" width="100%" height="150px" style="margin-top: -45px;">
</a>

        </div>
        <div class="sidebar-brand sidebar-brand-sm" style="background-color: #fff;color:#6d3cdc;">
            <a href="{{ route('admin.home') }}"  style="color:#6d3cdc;">
            <img src="{{ asset('logo/slogo..png') }}" alt="logo" width="90%" height="40px" >        
        </a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header"></li>

            {{-- <li>
                <a class="nav-link" href="{{ url('admin/dashboard') }}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li> --}}
            <li class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admincatalog.index') || request()->routeIs('admincatalog.edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admincatalog.index') }}">
                    <i class="far fa-square"></i>
                    <span>Catalog</span>
                </a>
            </li>            
      
            <li class="{{ request()->routeIs('admincategories.index') || request()->routeIs('admincategories.edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admincategories.index') }}"><i class="fas fa-columns"></i>
                    <span>Category</span></a>
            </li>
            <li class="{{ request()->routeIs('adminproduct.index') || request()->routeIs('adminproduct.create') || request()->routeIs('adminproduct.edit')  ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('adminproduct.index') }}"><i class="fas fa-th-large"></i>
                    <span>Product</span></a>
            </li>
         
            <li class="{{ request()->routeIs('enquiry.detail') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('enquiry.detail') }}"><i class="fas fa-newspaper"></i>
                    <span>Enquirys</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.quote') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.quote') }}"><i class="fas fa-newspaper"></i>
                    <span>Requested Quote</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            {{-- <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a> --}}

            <a class="btn btn-logout  btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </aside>
</div>
