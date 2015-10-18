{{-- detail untuk sebuah item pengumuman --}}
<div id="holder-{{ $p->id }}" class="box box-widget" data-backup="">
    <div class="box-header with-border">
        <div class="user-block">
            <img class="img-circle" src="{{ asset('lte2.3/img/avatar5.png') }}">
            <span class="username"><a href="#">{{ $p->judul }}</a></span>
            <span class="description">{{ $p->created_at }}</span>
        </div>
    </div>
    <div id="detail-{{ $p->id }}" class="box-body">
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
               ic-confirm="Yakin untuk melakukan editing?"
               ic-target="#detail-{{ $p->id }}"
               ic-on-success="onEditClick({{$p->id}})">edit</a>
            <a class="btn btn-danger btn-xs"
               ic-delete-from="{{ route('pengumuman.destroy',['id'=>$p->id]) }}"
               ic-target="closest div.box-widget"
                    >delete</a>
        </div>
    </div>
</div>