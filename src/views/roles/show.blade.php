@extends('panel.master')

@php
    $breadcrumbs = ["دسترسی ها"];
    $pageName = " دسترسی های نقش "."<span class='text-danger'>{$role->name}</span>";
    $description = "در این بخش شما دسترسی های نقش را میتوانید ویرایش کنید.";
    $title = "دسترسی ها";
    $icon = "lock";
@endphp

@section('content')
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
            <h2>
                دسترسی ها
            </h2>
            <div class="panel-toolbar">
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
            </div>
        </div>
        <div class="panel-container " style="">
            <div class="panel-content">
                <form class="" id="update-form" action="{{route('roles.update', ['role' => $role->id])}}" method="POST">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="row">
                        @foreach(Spatie\Permission\Models\Permission::all() as $permission)
                            <div class="col-3">
                                <div class="custom-control custom-checkbox mt-2 ">
                                    <input type="checkbox" class="custom-control-input persian-price" id="check-{{$permission->id}}" name="{{$permission->id}}" @if($role->hasPermissionTo($permission)) checked @endif>
                                    <label class="custom-control-label cursor-pointer" for="check-{{$permission->id}}"> {{$permission->display_name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                <button form="update-form" class="btn btn-primary mr-auto waves-effect waves-themed" type="submit">ذخیره سازی دسترسی ها</button>
            </div>
        </div>
    </div>
@endsection

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('roles.index')}}">لیست نقش ها</a>
@endsection
