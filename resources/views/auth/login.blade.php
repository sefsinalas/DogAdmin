@extends('layouts.basic')

@section('page_title')
    Iniciar sesión
@endsection

@section('content')
<body class="login-page">
    <div class="login-box">
        @include('partials.login_logo')

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>oh!</strong> Hay algunos problemas con los datos ingresados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Ingresa tus datos de usuario</p>
            <form action="{{ url('/login') }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Recuerdame
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/password/email') }}">Olvide mi contraseña</a><br>
            @if (env('ALLOW_REGISTER'))
    			<a href="{{ url('/register') }}" class="text-center">Registrar nuevo usuario</a>
			@endif
        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('partials.auth_scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
