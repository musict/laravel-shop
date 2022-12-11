{{--TODO Flash notification--}}
@if(session()->has('message'))
    {{ session('message') }}
@endif
