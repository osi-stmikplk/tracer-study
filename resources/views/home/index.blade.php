@extends($layout)
@section('content-header')
    <h1>Selamat Datang di Tracer Study STMIK Palangkaraya<small>jangan berhenti untuk saling menyapa</small></h1>
@endsection
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-bullhorn"></i>
            <h3 class="box-title">Perhatian</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="callout callout-danger">
                <h4>Sekedar pemberitahuan</h4>
                <p>Bahwa versi yang saat ini Anda gunakan masih dalam tahap testing, setiap saat data akan direfresh.
                Versi untuk saat ini hanya digunakan untuk kebutuhan testing aplikasi, hingga saatnya nanti akan diberitahukan
                saat aplikasi telah siap untuk alumni bisa gunakan sepenuhnya.</p>
                <p>Namun adapun demikian, kami harapkan untuk mendapatkan feedback dari rekan sekalian untuk melakukan
                testing terhadap aplikasi ini dan memberikan feedback ke account github kami
                Group Open Source Intiative STMIK Palangkaraya di <a href="https://github.com/osi-stmikplk/tracer-study">OSI-STMIK Palangkaraya</a>.
                </p>
                <p>Kami mengharapkan inputan, push request nya atau dokumentasi dan hal lainnya demi perkembangan STMIK Palangkaraya ke depannya.</p>
            </div>
        </div><!-- /.box-body -->
    </div>
@endsection