@extends('layouts.base')

@section('title', 'Restablecer contraseña | GESTIÓN DEL MÓDULO DOCENTE FACULTAD 4')

@section('content')

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div>
                <svg style="width: 60px;height: 60px;" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M7 8H41V40H7V8Z" fill="#F3F4FA"/>
                 <path d="M7 8H41V40H7V8Z" stroke="#6875F5" stroke-width="3"/>
                 <path d="M11 18H37V20H11V18ZM11 24H37V26H11V24ZM11 30H37V32H11V30ZM11 36H37V38H11V36Z" fill="#6875F5"/>
                 <path d="M16 12L22.5 19L31 9" stroke="#6875F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <a href="#"><b>GESTIÓN DEL MÓDULO DOCENTE </b>"FACULTAD 4"</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Restablecer contraseña mediante enlace de restablecimiento <br> </p>

            <form action="Log in.html" method="post" onsubmit="return validarFormulario()">
                <div class="form-group has-feedback">
                    <input type="email" id="email" class="form-control" placeholder="Introduzca su correo...">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="col-md-8"></div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="./Archivos/css/jQuery-2.1.4.min.js.download"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="./Archivos/css/bootstrap.min.js.download"></script>
    <!-- iCheck -->
    <script src="./Archivos/css/icheck.min.js.download"></script>


<script>
    function validarFormulario() {
        var email = document.getElementById('email').value;

        // Validar formato de email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, introduce un email válido.',
            });
            return false;
        }
    }
</script>


</body>
@endsection