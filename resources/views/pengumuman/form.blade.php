@runX($icTargetSuccess=(isset($icTargetSuccess)&&!is_null($icTargetSuccess)?$icTargetSuccess:null))
<div class="box box-solid">
    <div id="frmPengumumanIndic" class="overlay" style="display: none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="box-body">
        <form id="frmPengumuman" class="form-horizontal" role="form" ic-indicator="#frmPengumumanIndic"
            {!! !is_null($icTargetSuccess)?"ic-target=\"#$icTargetSuccess\"":"" !!}
            {{ $method=='post'?"ic-post-to":"ic-put-to" }}="{{ $action }}">
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
            {{-- tambahkan inputan dari post --}}
            @runX($post = is_null($data)? null: $data->post)
            @include("post._form", [ 'post'=>$post, 'judul_label'=>'Judul Pengumuman', 'isi_label'=>'Bunyi Pengumuman'])
            <div class="form-group">
                <label for="tgl_tayang" class="col-md-3 control-label">Tanggal Tayang</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="tgl_tayang" class="form-control" name="tgl_tayang" placeholder="dd-mm-yyyy"
                               value="{{ load_input_value($data, "tgl_tayang") }}">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div id="error-tgl_tayang" class="error"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="tgl_expired" class="col-md-3 control-label">Tanggal Expired</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="tgl_expired" class="form-control" name="tgl_expired" placeholder="dd-mm-yyyy"
                               value="{{ load_input_value($data, "tgl_expired") }}">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    <div id="error-tgl_expired" class="error"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        <i id="js-indic" class="fa fa-spin fa-spinner" style="display: none"></i> Simpan
                    </button>
                    {{-- untuk klik batal dibuat custom sesuai dgn id target intercooler--}}
                    @if(!isset($icTargetId))
                    @elseif($icTargetId=='holder-frmPengumuman')
                        {{-- request untuk penambahan form pengumuman --}}
                        <button type="button" class="btn btn-warning" onclick="btnBatalPengumumanClick(event);">
                            Batal
                        </button>
                    @elseif(strcasecmp($icTargetId,"detail-{$data->id}")==0)
                        <button type="button" class="btn btn-warning" onclick="onBatalClick({{$data->id}})">
                            Batal
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
function resetM()
{
    TSSTMIK.resetFormErrorMsg('form#frmPengumuman div.error');
    $('#alerter-error, #alerter-success').hide();
}
$('#frmPengumuman').on('error.ic', function (evt, elt, stat, str, xhr) {
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
</script>