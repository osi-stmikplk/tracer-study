@extends('layout.no-wrapper')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>TracerStudy</b><br>STMIK Palangkaraya</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan login terlebih dahulu</p>

            <form method="post" role="form">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-offset-1 col-xs-7">
                            <div class="checkbox icheck">
                                <label>
                                    <input name="remember" type="checkbox"> Ingat saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </form>

            <a href="#">Saya lupa password saya</a><br>
            <a href="/auth/register"">Mendaftarkan diri sebagai alumni</a>

        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('late-script')
<script>
$('body').addClass('login-page');
</script>
@stop