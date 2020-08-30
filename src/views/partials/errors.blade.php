@if(\Session::has('success'))
    @component('admin.components.alert.ui_alert', ['type' => "success"])
        {{\Session::get('success')}}
    @endcomponent
@endisset

@if($errors->any())
    @foreach ($errors->all() as $error)
        @component('admin.components.alert.ui_alert', ['type' => "danger"])
            {{$error}}
        @endcomponent
    @endforeach
@endif

{{--
@isset($error)
    @component('admin.components.alert.ui_alert', ['type' => "danger"])
        {{\Session::get('error')}}
    @endcomponent
@endisset
--}}
