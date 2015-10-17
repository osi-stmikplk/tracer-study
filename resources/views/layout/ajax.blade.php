{{-- Content Header (Page header) --}}
<section class="content-header">
    @yield('content-header')
</section>
{{-- Main content --}}
<section class="content">
    @yield('content')
</section>
{{-- /.content --}}
@yield('late-script')