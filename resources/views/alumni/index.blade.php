@extends($layout)
@section('content-header')
    <h1>Data Alumni Tracer Study STMIK Palangkaraya<small>pastikan anda terdata</small></h1>
@endsection

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Tabulasi Data Alumni</h3>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table id="data-alumni" class="table"
               data-toolbar="#dt-toolbar"
               data-url="{{ route('alumni.getData') }}"
               data-pagination="true"
               data-classes="table table-hover table-condensed"
               data-striped="true"
               data-side-pagination="server"
               data-page-list="[5, 10, 20, 50, 100, 200]"
               data-search="true"
               data-show-toggle="true"
               data-mobile-responsive="true">
            <thead>
            <tr>
                <th data-field="id" data-visible="false">ID</th>
                <th data-field="NIM" data-sortable="true">NIM Alumni</th>
                <th data-field="nama_lengkap" data-sortable="true">Nama Lengkap</th>
                <th data-field="pekerjaan" data-sortable="true">Pekerjaan</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="box-footer"></div>
</div>
@endsection
@section('late-script')
<script>
TSSTMIK.loadBootstrapTableScript(function(){
    $('#data-alumni').bootstrapTable();
});
</script>
@endsection