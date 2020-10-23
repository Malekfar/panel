@extends('panel.master')

@php
    $breadcrumbs = ["دسترسی ها"];
    $pageName = " دسترسی های نقش "."<span class='text-danger'>{$role->name}</span>";
    $description = "در این بخش شما دسترسی های نقش را میتوانید ویرایش کنید.";
    $title = "دسترسی ها";
    $icon = "lock";
@endphp

@section('content')
    <form class="" id="update-form" action="{{route('roles.update', ['role' => $role->id])}}" method="POST">
        <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        نقش
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container " style="">

                    <div class="panel-content">


                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="form-label" for="title">نقش</label>
                            <input type="text" value="{{$role->name}}" name="title" class="form-control" id="title" required="" placeholder="نام نقش خود را وارد نمایید...">
                        </div>
                    </div>

                </div>
            </div>
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


                        @csrf
                        @method('PATCH')
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-3">
                                    <div class="custom-control custom-checkbox mt-2 ">
                                        <input type="checkbox" class="custom-control-input persian-price" id="check-{{$permission->id}}" value="{{ $permission->id }}" name="permissions[]" @if($role->hasPermissionTo($permission)) checked @endif>
                                        <label class="custom-control-label cursor-pointer" for="check-{{$permission->id}}"> {{$permission->display_name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                </div>
                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button form="update-form" class="btn btn-primary mr-auto waves-effect waves-themed" type="submit">ذخیره سازی دسترسی ها</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('roles.index')}}">لیست نقش ها</a>
@endsection
