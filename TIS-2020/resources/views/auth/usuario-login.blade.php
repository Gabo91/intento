@extends('layouts.appHome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USUARIO Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('usuario.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cod_sis') ? ' has-error' : '' }}">
                            <label for="cod_sis" class="col-md-4 control-label">Codigo SIS</label>

                            <div class="col-md-6">
                                <input id="cod_sis" type="cod_sis" class="form-control" name="cod_sis" value="{{ old('cod_sis') }}" pattern="[0-9]{1,255}" title ="Solo se admiten numeros" required autofocus>

                                @if ($errors->has('cod_sis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cod_sis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿olvidaste tu contraseña?
                                </a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
