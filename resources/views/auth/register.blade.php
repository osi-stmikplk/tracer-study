@extends('layout.no-wrapper')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>TracerStudy</b><br>STMIK Palangkaraya</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan isikan data alumni untuk login</p>

            <form method="post" role="form">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Nomor Induk Mahasiswa">
                    </div>
                </div>
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
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Tulis Ulang Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-offset-8 col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Mendaftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </form>
            <a href="/auth/login"">Saya sudah terdaftar</a>

        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('late-script')
<script>
$('body').addClass('login-page');
</script>
@stop