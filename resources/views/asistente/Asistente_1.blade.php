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
                            <i class="fa fa-dashboard"></i> <span>Gestión de matrícula</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=" {{ route('asistente.dashboard') }} "><i class="fa fa-circle-o"></i>Gestion de Recursos Disponibles</a></li>
                            <li><a href="{{ route('asistente.dashboard_2') }}"><i class="fa fa-circle-o"></i>Gestion de Recursos Sobrantes</a></li>
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
                                <button type="button"  onclick="Insertar();" class="btn btn-block btn-primary">Insertar <span class="fa fa-plus"> </span></button>
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

                                        @forelse ($recursos as $recurso)
                                        <tr>
                                            <!-- Datos del recurso ... -->
                                            <td>{{ $recurso->id }}</td>
                                            <td>{{ $recurso->categoria }}</td>
                                            <td>{{ $recurso->cantidad }}</td>
                                            <td>{{ $recurso->disponibilidad }}</td>
                                            <td class="border px-4 py-2 ">
                                                <button class="" onclick="Eliminar({{ $recurso->id }})" >Eliminar</button>
                                                <button class="" onclick="Modificar(this)" >Modificar</button>
                                                @if($recurso->disponibilidad > 0)
                                                    <button class="" onclick="Utilizar(this)" >Utilizar</button>
                                                @endif
                                            </td>
                                        </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No hay recursos.</td>
                                                </tr>
                                        @endforelse
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

    </div>
    <!-- ./wrapper -->

    <script>

        //-----------------------------------------------------
        // Función para mostrar la ventana emergente de modificar

        function Modificar(id) {
          // Crear un formulario HTML con campos para categoría, cantidad y disponibilidad
          var filaSeleccionada =  id.parentNode.parentNode;
          var form = `
            <form id="productForm" action="{{route('asistente.update')}}" method="POST">
                @csrf
              <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" class="form-control" id="categoria" value="${filaSeleccionada.children[1].innerText}" required>
              </div>
              <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" value="${filaSeleccionada.children[2].innerText}" required>
              </div>
              <div>
            <input type="text" class="form-control" name="id" value="${filaSeleccionada.children[0].innerText}" style="display:none;">
                </div>
              <div class="form-group">
                <label for="disponibilidad">Disponibilidad:</label>
                <input type="number" class="form-control" name="disponibilidad" id="disponibilidad" min="0" value="${filaSeleccionada.children[3].innerText}" max="${filaSeleccionada.children[2].innerText}"  required>
              </div>
            </form>
          `;
          // Mostrar SweetAlert con el formulario
          Swal.fire({
            title:'Modificar Producto',
            html: form,
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            cancelButtonText: 'Cancelar',
            preConfirm: function() {
              // Obtener los valores de los campos del formulario
              var categoria = document.getElementById('categoria').value;
              var cantidad = document.getElementById('cantidad').value;
              var disponibilidad = document.getElementById('disponibilidad').value;
              // Validar que los campos no estén vacíos
              if (categoria.trim() === '' || cantidad.trim() === '' || disponibilidad.trim() === '') {
                Swal.showValidationMessage('Todos los campos son obligatorios.');
                return false;
              }
              // Validar que la categoría no tenga caracteres especiales, excepto tildes
              if (!/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s.,]+$/u.test(categoria)) {
                Swal.showValidationMessage('La categoría no puede tener caracteres especiales');
                return false;
              }
              // Enviarlos al servidor
              document.getElementById('productForm').submit();
            }
          });
        }

        //-----------------------------------------------------
        // Funcion para mostrar el mensaje de pasar los recursos para sobrantes

        function Utilizar(id) {
            var filaSeleccionada =  id.parentNode.parentNode;
            var form = `
            <form id="productForm" action="{{route('asistente.utilizar')}}" method="POST">
                @csrf
            <label for="descuento">Descuento de Disponibilidad de ${filaSeleccionada.children[1].innerText}:</label>
            <input type="number" name="descuento" class="form-control" min="1" max="${filaSeleccionada.children[3].innerText}" value="${filaSeleccionada.children[3].innerText}" required>
                <div>
            <input type="text" class="form-control" name="id" value="${filaSeleccionada.children[0].innerText}" style="display:none;">
                </div>
            </form>
          `;
          // Mostrar SweetAlert con el formulario
          Swal.fire({
            title:'Utilizar Recurso',
            html: form,
            showCancelButton: true,
            confirmButtonText: 'Utilizar',
            cancelButtonText: 'Cancelar',
            preConfirm: function() {
              // Enviar datos al servidor
              document.getElementById('productForm').submit();
            }
          });
        }

        //-----------------------------------------------------
        // Función para mostrar la ventana emergente Insertar

        function Insertar() {
          var form = `
          <form id="productForm" action="{{route('asistente.create')}}" method="POST">
                @csrf
              <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" class="form-control" name="categoria" id="categoria" required>
              </div>
              <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
              </div>
              <div class="form-group">
                <label for="disponibilidad">Disponibilidad:</label>
                <input type="number" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Máxima" disabled required>
              </div>
            </form>
          `;
          // Mostrar SweetAlert con el formulario
          Swal.fire({
            title: 'Añadir elemento',
            html: form,
            showCancelButton: true,
            confirmButtonText: 'Añadir',
            cancelButtonText: 'Cancelar',
            preConfirm: function() {
              // Obtener los valores de los campos del formulario
              var categoria = document.getElementById('categoria').value;
              var cantidad = document.getElementById('cantidad').value;
              document.getElementById('disponibilidad').value = cantidad;
              document.getElementById('disponibilidad').disabled = false;
              // Validar que los campos no estén vacíos
            if (categoria.trim() === '' || cantidad.trim() === '') {
            Swal.showValidationMessage('Todos los campos son obligatorios.');
            return false;
            }
              // Validar que la categoría no contenga caracteres especiales, excepto tildes
            if (!/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/.test(categoria)) {
            Swal.showValidationMessage('La categoría no puede contener caracteres especiales, excepto tildes.');
            return false;
            }
            // Validar que cantidad y disponibilidad sean valores numéricos
            if (isNaN(cantidad)) {
            Swal.showValidationMessage('La cantidad y la disponibilidad deben ser valores numéricos.');
            return false;
            }
              // Enviar datos al servidor
              document.getElementById('productForm').submit();
            }
          });
        }
        
        //-----------------------------------------------------
        //   Mensaje para confirmar la eliminacion de un recurso
    
        function Eliminar(id) {
            Swal.fire({ title: '¿Estás seguro?',
              text: 'Esta acción no se puede deshacer',  icon: 'warning',
              showCancelButton: true, confirmButtonText: 'Sí, eliminar',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                // Ruta para eliminar
                window.location.href = "{{ url('/asistente') }}/" + id + "/delete";
                }
            });
        };

      </script>
</body>

@endsection