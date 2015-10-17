<form id="frmProfile" class="form-horizontal" role="form"
    {{ $method=='post'?"ic-post-to":"ic-put-to" }}="{{ $action }}" ic-indicator="#js-indic">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="{{ $method }}">
    <div id="alerter-success" class="form-group" style="display: none;">
        <div class="col-md-12">
            <div class="alert alert-success">
                <span id="message-success"></span>
            </div>
        </div>
    </div>
    <div id="alerter-error" class="form-group" style="display: none;">
        <div class="col-md-12">
            <div class="alert alert-error">
                <span id="message-error"></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="NIM" class="col-md-3 control-label">Nomor Induk Mahasiswa</label>
        <div class="col-md-5">
            <input type="text" id="NIM" class="form-control" name="NIM"
                   value="{{ load_input_value($data, "NIM") }}" maxlength="30">
            <div id="error-NIM" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="nama_lengkap" class="col-md-3 control-label">Nama Lengkap</label>
        <div class="col-md-9">
            <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap"
                   value="{{ load_input_value($data, "nama_lengkap") }}" maxlength="255">
            <div id="error-nama_lengkap" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="gelar_depan" class="col-md-3 control-label">Gelar Depan</label>
        <div class="col-md-5">
            <input type="text" id="gelar_depan" class="form-control" name="gelar_depan"
                   value="{{ load_input_value($data, "gelar_depan") }}" maxlength="50">
            <div id="error-gelar_depan" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="gelar_belakang" class="col-md-3 control-label">Gelar Belakang</label>
        <div class="col-md-5">
            <input type="text" id="gelar_belakang" class="form-control" name="gelar_belakang"
                   value="{{ load_input_value($data, "gelar_belakang") }}" maxlength="50">
            <div id="error-gelar_belakang" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="tempat_lahir" class="col-md-3 control-label">Tempat Lahir</label>
        <div class="col-md-9">
            <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                   value="{{ load_input_value($data, "tempat_lahir") }}" maxlength="100">
            <div id="error-tempat_lahir" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="tgl_lahir" class="col-md-3 control-label">Tanggal Lahir</label>
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" id="tgl_lahir" class="form-control" name="tgl_lahir" placeholder="dd-mm-yyyy"
                       value="{{ load_input_value($data, "tgl_lahir") }}">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
            <div id="error-tgl_lahir" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="alamat_rumah" class="col-md-3 control-label">Alamat Rumah</label>
        <div class="col-md-9">
            <input type="text" id="alamat_rumah" class="form-control" name="alamat_rumah"
                   value="{{ load_input_value($data, "alamat_rumah") }}" maxlength="500">
            <div id="error-alamat_rumah" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="provinsi" class="col-md-3 control-label">Provinsi</label>
        <div class="col-md-9">
            <input type="text" id="provinsi" class="form-control" name="provinsi"
                   value="{{ load_input_value($data, "provinsi") }}" maxlength="255">
            <div id="error-provinsi" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="nomor_hp" class="col-md-3 control-label">Nomor Handpone</label>
        <div class="col-md-5">
            <input type="text" id="nomor_hp" class="form-control" name="nomor_hp"
                   value="{{ load_input_value($data, "nomor_hp") }}" maxlength="255">
            <div id="error-nomor_hp" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="pekerjaan" class="col-md-3 control-label">Pekerjaan</label>
        <div class="col-md-9">
            <input type="text" id="pekerjaan" class="form-control" name="pekerjaan"
                   value="{{ load_input_value($data, "pekerjaan") }}" maxlength="255">
            <div id="error-pekerjaan" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="jabatan" class="col-md-3 control-label">Jabatan</label>
        <div class="col-md-9">
            <input type="text" id="jabatan" class="form-control" name="jabatan"
                   value="{{ load_input_value($data, "jabatan") }}" maxlength="255">
            <div id="error-jabatan" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="tempat_bekerja" class="col-md-3 control-label">Tempat Bekerja</label>
        <div class="col-md-9">
            <input type="text" id="tempat_bekerja" class="form-control" name="tempat_bekerja"
                   value="{{ load_input_value($data, "tempat_bekerja") }}" maxlength="255">
            <div id="error-tempat_bekerja" class="error"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">
                <i id="js-indic" class="fa fa-spin fa-spinner" style="display: none"></i> Simpan
            </button>
        </div>
    </div>
</form>

<script type="text/javascript">
function resetM()
{
    TSSTMIK.resetFormErrorMsg('form#frmProfile div.error');
    $('#alerter-error, #alerter-success').hide();
}
$('#frmProfile').on('error.ic', function (evt, elt, stat, str, xhr) {
    resetM();
    if(xhr.status==422) {
        TSSTMIK.showFormErrorMsg(xhr.responseText);
    } else {
        $('#message-error').text(str).closest('div.form-group').show();
    }
}).on('success.ic',function(evt, elt, data, textStatus, xhr, requestId){
    resetM();
    $('#message-success').text('Profile terupdate').closest('div.form-group').show();
});
{{-- bila ada pesan sukses di session --}}
@if(session('message-success',null)!==null)
    resetM();
    $('#message-success').text('{{ session('message-success') }}').closest('div.form-group').show();
    {{--load profile terbaru --}}
    if(typeof(updateDetailProfile)==="function") updateDetailProfile();
@endif
</script>