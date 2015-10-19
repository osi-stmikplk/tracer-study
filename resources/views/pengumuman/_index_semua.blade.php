{{-- tampilkan daftar pengumuman semua --}}
@inject('postF', 'STMIKPLK\Factories\PostFactory')
<div class="row">
    <div class="col-md-12">
        @if($postF->getCountByAuthor(null, 'STMIKPLK\\Pengumuman')>0)
            @foreach($postF->getByAuthor(null, 'STMIKPLK\\Pengumuman') as $p)
                {{-- detail untuk sebuah item pengumuman --}}
                <div id="holder-{{ $p->id }}" class="box box-widget" data-backup="" ic-indicator="#peng-indic-{{ $p->id }}">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('lte2.3/img/avatar5.png') }}">
                            <span class="username"><a href="#">{{ $p->judul }}</a></span>
                            <span class="description">{{ $p->created_at }}</span>
                        </div>
                    </div>
                    <div id="detail-{{ $p->id }}" class="box-body">
                        {{ $p->isi }}
                        <br><br>
                        <span class="text-aqua">Tayang: {{ $p->owner->tgl_tayang }}</span>&nbsp;&nbsp;<span class="text-warning">Expired: {{ $p->owner->tgl_expired }}</span>
                    </div>
                    <div id="peng-indic-{{ $p->id }}" class="overlay ic-indicator" style="display: none;">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>