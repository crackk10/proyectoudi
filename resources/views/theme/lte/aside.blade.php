<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      {{-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @auth
              {{ auth()->user()->name}}
            @endauth
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navegación</li>
        <li class="treeview">
        <a href="">
            <i class="fa fa-folder-open"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('productos')}}"><i class="fa fa-circle-o"></i>Productos</a></li>
            <li><a href="{{route('vehiculos')}}"><i class="fa fa-circle-o"></i>Vehiculos</a></li>
            <li><a href="{{route('conductores')}}"><i class="fa fa-circle-o"></i>Conductores</a></li>
            <li><a href="{{route('transportadoras')}}"><i class="fa fa-circle-o"></i>Transportadoras</a></li>
          </ul>
        </li>
 
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li> --}}

 
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
