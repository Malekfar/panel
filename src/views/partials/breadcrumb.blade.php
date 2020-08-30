<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
    @foreach($breadcrumbs as $item)
        <li class="breadcrumb-item">{!! $item !!}</li>
    @endforeach
    <li class="breadcrumb-item active">{{$title}}</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block breadcrumb-date">امروز {{jdateBase("l J S F Y")}}</li>
</ol>
