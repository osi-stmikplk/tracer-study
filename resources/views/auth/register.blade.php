@extends('layout.no-wrapper')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>TracerStudy</b><br>STMIK Palangkaraya</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan isikan data alumni untuk login</p>

            <form id="frmReg" ic-post-to="/auth/register" ic-indicator="#js-reg-indicator"
                  ic-replace-target="false" role="form">
                {!! csrf_field() !!}
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Nomor Induk Mahasiswa Anda">
                    </div>
                    <div id="name-error" class="help-block error"></div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div id="email-error" class="help-block error"></div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div id="password-error" class="help-block error"></div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Tulis Ulang Password">
                    </div>
                    <div id="password_confirmation-error" class="help-block error"></div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-offset-8 col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                <i id="js-login-indicator" class="fa fa-spin fa-spinner" style="display: none"></i> Daftar
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </form>
            <a href="/auth/login">Saya sudah terdaftar</a>

        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('late-script')
<script>
$('body').addClass('login-page');
$('form#frmReg')
        .on('error.ic',function(evt, elt, status, str, xhr){
            if(xhr.status==422) {
                TSSTMIK.resetFormErrorMsg('form#frmReg div.error');
                TSSTMIK.showFormErrorMsg(xhr.responseText);
            } else {

            }
        }).on('success.ic',function(evt, elt, data, textStatus, xhr, requestId){
            window.location.replace("/");
        });
</script>
@stop