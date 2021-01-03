@extends('layouts.appHome')
@if(Session::has('messagePass0'))
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('messagePass0')}}
        </div>
@endif
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);
});
</script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('cambiar.password.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre Completo:</label>

                            <div class="col-md-6">
                                <label for="name" class="control-label">{{ Auth::user()->nombre }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cod_sis" class="col-md-4 control-label">Codigo SIS: </label>

                            <div class="col-md-6">
                                <label for="cod_sis" class="control-label">{{ Auth::user()->cod_sis }}</label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nuevo Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" pattern="[A-Za-z0-9!?-]{6,100}" 
                                title="Minimo de 6 caracteres" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" pattern="[A-Za-z0-9!?-]{6,100}" 
                                title="Minimo de 6 caracteres" required>
                            </div>
                        </div>
                        <input type="hidden" id="cod_sis" name="cod_sis" value="{{ Auth::user()->cod_sis }}">
                        <input type="hidden" id="cargo" name="cargo" value="{{ Auth::user()->cargo }}"> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
