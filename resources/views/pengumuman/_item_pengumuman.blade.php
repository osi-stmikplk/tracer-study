{{-- detail untuk sebuah item pengumuman --}}
<div id="holder-{{ $p->id }}" class="box box-widget" data-backup="" ic-indicator="#peng-indic-{{ $p->id }}">
    <div class="box-header with-border">
        <div class="user-block">
            <img class="img-circle" src="{{ asset('lte2.3/img/avatar5.png') }}">
            <span class="username"><a href="#">{{ $p->judul }}</a></span>
            <span class="description">{{ $p->created_at }}</span>
        </div>
    </div>
    <div id="detail-{{ $p->id }}" class="box-body"
         ic-confirm="Yakin untuk ini?">
        <dl class="dl-horizontal">
            {{--<dt>Judul Pengumuman</dt>--}}
            {{--<dd>{{ $p->judul }}</dd>--}}
            <dt>Isi Pengumuman</dt>
            <dd>{{ $p->isi }}</dd>
            <dt>Tanggal Tayang</dt>
            <dd>{{ $p->owner->tgl_tayang }}</dd>
            <dt>Tanggal Expired</dt>
            <dd>{{ $p->owner->tgl_expired }}</dd>
        </dl>
        <div class="btn btn-group pull-right">
            <a class="btn btn-info btn-xs"
               ic-get-from="{{ route('pengumuman.edit', ['id'=>$p->id, 'icTargetSuccess'=>"holder-{$p->id}"]) }}"
               ic-target="#detail-{{ $p->id }}"
               ic-on-success="onEditClick({{$p->id}})">edit</a>
            <a class="btn btn-danger btn-xs"
               ic-delete-from="{{ route('pengumuman.destroy',['id'=>$p->id]) }}"
               ic-target="closest div.box-widget"
                    >delete</a>
        </div>
    </div>
    <div id="peng-indic-{{ $p->id }}" class="overlay ic-indicator" style="display: none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>