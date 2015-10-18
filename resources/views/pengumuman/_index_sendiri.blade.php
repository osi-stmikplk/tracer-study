{{-- tampilkan daftar pengumuman yang dibuat sendiri oleh user yang login --}}
@inject('postF', 'STMIKPLK\Factories\PostFactory')
@runX($author_id=isset($author_id)?$author_id:Auth::user()->id)
<div class="row">
    <div class="col-md-12">
        @if($postF->getCountByAuthor($author_id, 'STMIKPLK\\Pengumuman')>0)
            @foreach($postF->getByAuthor($author_id, 'STMIKPLK\\Pengumuman') as $p)
                @include("pengumuman._item_pengumuman")
            @endforeach
        @endif
        <script type="text/javascript">
            function onEditClick(id) {
                // simpan di backup
                $('#holder-'+id).data('backup',$('#detail-'+id).html());
            }
            function onBatalClick(id) {
                // load kembali dari backup
                d = $('#detail-'+id);
                d.html($('#holder-'+id).data('backup'));
                $('#detail-'+id+ ' a.btn').removeClass('disabled');
                Intercooler.processNodes(d);
            }
        </script>
    </div>
</div>