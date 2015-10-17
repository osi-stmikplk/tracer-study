{{-- tampilkan hanya profile saja --}}
@if($data!=null)
    <table class="table table-hover table-stripped">
        <tbody>
        <tr>
            <td class="caption" width="col-xs-2">Nomor Induk Mahasiswa</td>
            <td>{{ $data->NIM }}</td>
        </tr>
        <tr>
            <td class="caption">Nama Lengkap</td>
            <td>{{ $data->gelar_depan }} {{ $data->nama_lengkap }} {{ $data->gelar_belakang }}</td>
        </tr>
        <tr>
            <td class="caption">Tempat Lahir</td>
            <td>{{ $data->tempat_lahir }}</td>
        </tr>
        <tr>
            <td class="caption">Tanggal Lahir</td>
            <td>{{ $data->tgl_lahir }}</td>
        </tr>
        <tr>
            <td class="caption">Alamat Rumah</td>
            <td>{{ $data->alamat_rumah }}</td>
        </tr>
        <tr>
            <td class="caption">Provinsi</td>
            <td>{{ $data->provinsi }}</td>
        </tr>
        <tr>
            <td class="caption">Nomor Hp</td>
            <td>{{ $data->nomor_hp }}</td>
        </tr>
        <tr>
            <td class="caption">Pekerjaan</td>
            <td>{{ $data->pekerjaan }}</td>
        </tr>
        <tr>
            <td class="caption">Jabatan</td>
            <td>{{ $data->jabatan }}</td>
        </tr>
        <tr>
            <td class="caption">Tempat Bekerja</td>
            <td>{{ $data->tempat_bekerja }}</td>
        </tr>
        <tr>
            <td class="caption">Profile Dibuat</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        <tr>
            <td class="caption">Profile Diupdate</td>
            <td>{{ $data->updated_at }}</td>
        </tr>
        </tbody>
    </table>
@else
    <h3>Ups profile belum terisi ...</h3>
@endif