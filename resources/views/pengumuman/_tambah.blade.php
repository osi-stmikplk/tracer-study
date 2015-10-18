{{-- Tampilkan bagian untuk menambahkan pengumuman baru --}}
<div class="row">
    <div class="col-md-12">
        @if(isset($pesan_awal))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ $pesan_awal }}
            </div>
        @endif
        {{-- pada saat request berhasil buat hidden tombol tambah ini --}}
        <a id="btnTambahPeng" class="btn btn-primary pull-right"
           ic-get-from="{{ route('pengumuman.create') }}"
           ic-target="#holder-frmPengumuman" ic-on-success="$('#btnTambahPeng').hide();">
            <i class="fa fa-plus-circle"></i> Tambah Pengumuman
        </a>
        <div id="holder-frmPengumuman" class="col-md-12"></div>
    </div>
</div>
<script>
{{-- Saat tombol batal di klik hilangkan form yang ada di holder-frmPengumuman dan tampilkan lagi tombol tambah --}}
function btnBatalPengumumanClick()
{
    $('#holder-frmPengumuman').empty();
    $('#btnTambahPeng').show();
}
</script>