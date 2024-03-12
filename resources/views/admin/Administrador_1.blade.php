@extends('layouts.base')

@section('title', 'Resumen | SISTEMA DE GESTIÓN DE MATRÍCULA')

@section('content')

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><svg style="width: 30px;height: 50px;" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 8H41V40H7V8Z" fill="#F3F4FA"/>
                    <path d="M7 8H41V40H7V8Z" stroke="#6875F5" stroke-width="3"/>
                    <path d="M11 18H37V20H11V18ZM11 24H37V26H11V24ZM11 30H37V32H11V30ZM11 36H37V38H11V36Z" fill="#6875F5"/>
                    <path d="M16 12L22.5 19L31 9" stroke="#6875F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SIGESM</b> Facultad 4</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('Archivos/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('Archivos/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                    <p>
                                        Administrador {{ Auth::user()->name }}
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{route('profile')}}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}"   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Desconectarse</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('Archivos/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">Funcionalidades</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=" {{route('admin.dashboard')}} "><i class="fa fa-circle-o"></i>Resumen</a></li>
                            <li><a href=" {{route('admin.dashboard_2')}} "><i class="fa fa-circle-o"></i>Gestión de usuarios</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Resumen
                    <small></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$count}}</h3>

                                <p>Usuarios agregados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$count_recursos}}</h3>

                                <p>Recursos totales</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" class="small-box-footer">Consultar detalles <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Recursos almacenados en el sistema" aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content pd-4">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Disponibilidad</th>
                                    </tr>
                                    
                                    @forelse ($recursos as $recurso)
                                    <tr>
                                        <!-- Datos del recurso ... -->
                                        <td>{{ $recurso->id }}</td>
                                        <td>{{ $recurso->categoria }}</td>
                                        <td>{{ $recurso->cantidad }}</td>
                                        <td>{{ $recurso->disponibilidad }}</td>
                                    </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No hay recursos.</td>
                                            </tr>
                                    @endforelse

                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2024 <a href="">Equipo de Programación Web</a></strong>
        </footer>


        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

</body>
@endsection