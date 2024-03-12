@extends('layouts.base')

@section('title', 'Iniciar sesión | GESTIÓN DEL MÓDULO DOCENTE FACULTAD 4')

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
        <div class="login-box-body">
            <p class="login-box-msg">Iniciar sesión</p>

            <form action="{{ route('login') }}" method="post" onsubmit="return validarFormulario()">
                @csrf

                <div class="form-group has-feedback">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Introduzca su correo...">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="col-md-8"></div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                    </div>
                </div>

            </form>
            <br>
            <a onclick="document.getElementById('email').value = 'admin@uci.cu'" class="text-center">Registrar un nuevo usuario</a>
        </div>
    </div>
    @section('errorscr')
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El usuario o contraseña son incorrectos.',
        });
    </script>
    @endif
    @endsection
    
    <script>
        function validarFormulario() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Validar formato de email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                Swal.fire({  icon: 'error',   title: 'Error',
                    text: 'Por favor, introduce un email válido.',
                });
                return false;  }

            // Validar longitud de la contraseña
            if (password.length < 8) {
                Swal.fire({  icon: 'error',  title: 'Error',
                    text: 'La contraseña debe tener al menos 8 caracteres.',
                });
                return false;  }
        }
    </script>

</body>

@endsection