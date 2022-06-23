  <!-- Main Sidebar Container -->


  @if(App::isLocale('en'))
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="text-align: left;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin LTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               {{__('sidebar.dashboard')}}
              </p>
            </a>

          </li>


        
          <li class="nav-item has-treeview {{ request()->routeIs('backend.users.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">

              <p>
              {{__('sidebar.users')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('backend.users.index') ? 'menu-open active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>  {{__('sidebar.users')}}</p>
                </a>
              </li>

            </ul>
          </li>
        

          <li class="nav-item has-treeview {{ request()->routeIs('admin.categories.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">

              <p>
              {{__('sidebar.categories')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" id="show-page" class="nav-link {{ request()->routeIs('admin.categories.index') ? 'menu-open active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>    {{__('sidebar.categories')}} </p>
                </a>
              </li>

            </ul>
          </li>
   

         
   
         

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @else  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{asset('backend-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin LTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               {{__('sidebar.dashboard')}}
              </p>
            </a>

          </li>


        
          <li class="nav-item has-treeview {{ request()->routeIs('admin.users.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">

              <p>
              {{__('sidebar.users')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" id="show-page" class="nav-link {{ request()->routeIs('admin.users.index') ? 'menu-open active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>  {{__('sidebar.users')}}</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview {{ request()->routeIs('admin.roles.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">

              <p>
              {{__('sidebar.roles')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.roles.index')}}" id="show-page" class="nav-link {{ request()->routeIs('admin.roles.index') ? 'menu-open active' : '' }}">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>  {{__('sidebar.roles')}}</p>
                </a>
              </li>

            </ul>
          </li>
        

        

          <li class="nav-item has-treeview {{ request()->routeIs('admin.categories.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">

              <p>
              {{__('sidebar.categories')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.categories.index')}}" class="nav-link {{ request()->routeIs('admin.categories.index') ? 'menu-open active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>    {{__('sidebar.categories')}} </p>
                </a>
              </li>

            </ul>
          </li>
   

         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endif