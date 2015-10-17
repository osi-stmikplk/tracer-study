@extends($layout)
@section('content-header')
    <h1>Profile Alumni<small>pastikan anda mengisi data termutakhir</small></h1>
@endsection
@section('content')
<div class="box">
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab-detail" data-toggle="tab"
                       ic-indicator="#formindic" ic-src="{{ route('alumni.onlyProfile') }}" ic-target="#tab-detail">Profile</a>
                </li>
                <li>
                    <a href="#tab-form" data-toggle="tab" ic-indicator="#formindic" ic-src="{{ $route_src }}" ic-target="#tab-form">
                        Pengisian Data&nbsp;<i id="formindic" class="fa fa-spin fa-spinner" style="display: none"></i></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active table-responsive" id="tab-detail">
                    @include("alumni.onlyProfile")
                </div>
                <div class="tab-pane" id="tab-form">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("late-script")
<script>
formLoaded = false;
$("a[href='#tab-form']").on('shown.bs.tab',function(e){
    if(!formLoaded) {
        Intercooler.triggerRequest($(this));
        formLoaded = true;
    }
});
function updateDetailProfile()
{
    Intercooler.triggerRequest($("a[href='#tab-detail']"));
}
</script>
@endsection