@extends($layout)
@section('content-header')
    <h1>Pengumuman TracerStudy<small>pengumuman untuk alumni</small></h1>
@endsection

@section('content')
{{--<div class="box">--}}
    {{--<div class="box-body">--}}
        <div class="nav-tabs-custom" ic-indicator="#formindic">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab-index" data-toggle="tab"
                       ic-src="{{ route('alumni.onlyProfile') }}" ic-target="#tab-detail">
                        <i id="formindic" class="fa fa-spin fa-spinner" style="display: none;"></i>&nbsp;Daftar Pengumuman
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab-post-anda" role="menuitem" tabindex="-1">Posting Anda</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active table-responsive" id="tab-index">
                    <h3>Daftar Pengumuman</h3>
                </div>
                <div class="tab-pane" id="tab-post-anda">
                    @include("pengumuman._tambah")
                    <div id="index-pengumuman-sendiri"
                         ic-src="{{ route('pengumuman.getDaftar') }}" ic-target="#index-pengumuman-sendiri">
                        @include("pengumuman._index_sendiri")
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}
{{--</div>--}}
<script type="text/javascript">
$('#tab-post-anda').on('pengumuman/refreshPengumumanSendiri', function () {
    Intercooler.triggerRequest($('#index-pengumuman-sendiri'));
}).on('pengumuman/refreshItemSendiri', function (id) {

})
</script>
@endsection