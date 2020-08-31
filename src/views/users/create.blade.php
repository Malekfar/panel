@extends('panel.master')

@php
    $breadcrumbs = ["کاربران"];
    $pageName = " ایجاد کاربر "."<span class='text-danger'></span>";
    $description = "در این بخش شما میتوانید کاربر جدید ایجاد کنید.";
    $title = "کاربران";
    $icon = "user";
@endphp

@section('content')
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
            <h2>
                ایجاد مدیر
            </h2>
            <div class="panel-toolbar">
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
            </div>
        </div>
        <div class="panel-container " style="">
            <div class="panel-content">
                <form class="" id="update-form" action="{{route('panel.users.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-label" for="simpleinputInvalid2">نام</label>
                        <input type="text" name="name" class="form-control" id="" required="" placeholder="نام مدیر وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinputInvalid2">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="" required="" placeholder="ایمیل مدیر را وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="simpleinputInvalid2">رمز عبور</label>
                        <input type="text" name="password" class="form-control" id="" required="" placeholder="رمزعبور مدیر را وارد نمایید...">
                    </div>
                </form>
            </div>
            <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                <button form="update-form" class="btn btn-primary mr-auto waves-effect waves-themed" type="submit">ذخیره سازی مدیر</button>
            </div>
        </div>
    </div>
@endsection

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('panel.managers')}}">لیست مدیران</a>
@endsection
