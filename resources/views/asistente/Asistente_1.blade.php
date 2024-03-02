@extends('layouts.base')

@section('title', 'Gestión de matrícula | SISTEMA DE GESTIÓN DE MATRÍCULA')

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
                    <span class="sr-only">Toggle navigation</span>
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
                                        Asistente {{ Auth::user()->name }}
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="configurar_perfil.html" class="btn btn-default btn-flat">Perfil</a>
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
                            <i class="fa fa-dashboard"></i> <span>Gestión de matrícula</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="Asistente_1.html"><i class="fa fa-circle-o"></i>Gestion de Recursos Disponibles</a></li>
                            <li><a href="Asistente_2.html"><i class="fa fa-circle-o"></i>Gestion de Recursos Sobrantes</a></li>
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
                    Gestion de Recursos Disponibles
                    <small></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Block buttons -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Operaciones</h3>
                            </div>
                            <div class="box-body">
                                <button type="button" class="btn btn-block btn-primary">Insertar <span class="fa fa-plus"> </span></button>
                                <button type="button" class="btn btn-block btn-success">Exportar registro <i class="fa fa-download"></i></button>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Registro de recursos disponibles en el sistema</h3>

                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar...">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Disponibilidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2 ">1</td>
                                        <td class="border px-4 py-2 ">Mtrícula 1</td>
                                        <td class="border px-4 py-2 ">55</td>
                                        <td class="border px-4 py-2 ">0%</td>
                                        <td class="border px-4 py-2 ">
                                            <button wire:click="borrar(2)" class="eliminar-btn" onclick="Eliminar()" >Eliminar</button>
                                            <button wire:click="borrar(2)" class="">Modificar</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
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

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="./Archivos/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="./Archivos/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="./Archivos/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="./Archivos/dist/js/app.min.js"></script>
    <script src="./Archivos/dist/js/demo.js"></script>


    <!-- Mensaje para confirmar la eliminacion -->
    
    <script>
        function Eliminar() {
           // const itemId = this.getAttribute('data-id');
            // Muestra un mensaje de confirmación con SweetAlert
            Swal.fire({ title: '¿Estás seguro?',
              text: 'Esta acción no se puede deshacer',  icon: 'warning',
              showCancelButton: true, confirmButtonText: 'Sí, eliminar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                // logica de eliminar
                Swal.fire('Eliminado', 'El elemento ha sido eliminado', 'success');
              }
            });
        };
      </script>


</body>

@endsection