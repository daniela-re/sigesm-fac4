@extends('layouts.base')

@section('title', 'Configurar perfil | SISTEMA DE GESTIÓN DE MATRÍCULA')

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
                                        {{ Auth::user()->name }}
                                        <small>{{ Auth::user()->rol }}</small>
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
                    <li class="header">Configurar perfil</li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Configuración del perfil de usuario
                    <small></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Información del perfil</a></li>
                                <li><a href="#timeline" data-toggle="tab">Contraseña</a></li>
                                <li><a href="#settings" data-toggle="tab">Configuración</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ asset('Archivos/dist/img/user2-160x160.jpg') }}" alt="user image">
                                            <span class="username">
                                    <a href="#">$Nombre</a>
                                    <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                  </span>
                                            <span class="description">Foto subida el xx-xx-2024</span>
                                        </div>
                                        <!-- /.user-block -->

                                        <form class="form-horizontal" onsubmit="return validarFormularioA();">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                                                <div class="col-sm-10">
                                                    <input type="text" id="nombre" class="form-control" id="inputName" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Cambiar</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <!-- /.post -->
                                </div>

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">

                                    <form class="form-horizontal" onsubmit="return validarFormularioB();">
                                        <div class="form-group">
                                            <label for="inputName"  class="col-sm-2 control-label">Contraseña actual</label>

                                            <div class="col-sm-10">
                                                <input type="password" id="password" class="form-control" id="inputName" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Contraseña nueva</label>

                                            <div class="col-sm-10">
                                                <input type="password" id="new_password" class="form-control" id="inputName" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Repetir contraseña</label>

                                            <div class="col-sm-10">
                                                <input type="password" id="new_password_b" class="form-control" id="inputEmail" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Cambiar</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <h3 class="box-title">Autenticación de dos factores</h3>
                                                <span>
                                                    Cuando la autenticación de dos factores está habilitada, se le solicitará un token seguro
                                                     y aleatorio durante la autenticación. Puede recuperar este token de la aplicación Google
                                                      Authenticator de su teléfono.
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Activar</button>
                                            </div>
                                        </div>
                                    </form>

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <h3 class="box-title">Sesiones del navegador</h3>
                                                <span>
                                                    Si es necesario, puede cerrar sesión en todas sus otras sesiones de navegador
                                                     en todos sus dispositivos. Algunas de sus sesiones recientes se enumeran a continuación;
                                                      sin embargo, esta lista puede no ser exhaustiva. Si cree que su cuenta se ha visto
                                                       comprometida, también debe actualizar su contraseña.

                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Cerrar otras sesiones</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">

                                                <h3 class="box-title">Eliminar cuenta</h3>
                                                <span>
                                                    Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán de forma permanente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.

                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" id="eliminar_cuenta" class="btn btn-danger">Eliminar cuenta</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
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

    <!-- jQuery 2.1.4 -->
    <script src="./Archivos/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="./Archivos/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="./Archivos/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./Archivos/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="./Archivos/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./Archivos/dist/js/demo.js"></script>

    <!-- Función de pregunta para la elimianción de la cuenta, mediante eventos del click  -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('eliminar_cuenta').addEventListener('click', function () {
                Swal.fire({  title: '¿Estás seguro?',
                  text: 'Esta acción eliminará permanentemente tu cuenta.',
                  icon: 'warning',   showCancelButton: true,
                  confirmButtonText: 'Sí, eliminar cuenta',
                  cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        //  Petición de elimiar cuenta

                        Swal.fire('Cuenta eliminada', 'Tu cuenta ha sido eliminada correctamente.', 'success');
                    }
                });
            });
        });
    </script>


    <!-- Validar formularios -->

    <script>
        function validarFormularioA() {
            var email = document.getElementById('email').value;

            // Validar formato de email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                Swal.fire({ icon: 'error',  title: 'Error',
                    text: 'Por favor, introduce un email válido',
                });
                return false; }
        }

        function validarFormularioB() {
            var password = document.getElementById('password').value;
            var new_password = document.getElementById('new_password').value;
            var new_password_b = document.getElementById('new_password_b').value;

        // Validar longitud de la contraseña e igualdad de las nuevas
            if (password.length < 8 || new_password.length < 8 || new_password_b.length < 8 ) {
            Swal.fire({  icon: 'error',  title: 'Error',
             text: 'Las contraseñas deben tener al menos 8 caracteres',
            });
            return false;  }

            if (new_password != new_password_b ) {
            Swal.fire({  icon: 'error',  title: 'Error', 
             text: 'Las contraseñas nuevas deben ser iguales',
            });
            return false;  }
        }
    </script>

</body>


@endsection