<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navegación</li>

        @if ( auth()->user()->tipo_usuario=="2"&&  auth()->user()->id_estado=="1")
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
        @endif
        
        @if ( auth()->user()->tipo_usuario=="2" ||auth()->user()->tipo_usuario=="1" &&  auth()->user()->id_estado=="1")
        <li >
          <a href="{{route('calendario')}}">
            <i class="fa  fa-calendar"></i> <span>Programacion</span>
          </a>
        </li>
        @endif

 
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
