@extends('panel.master')

@php
    $breadcrumbs = ["کاربران"];
    $pageName = " ایجاد مدیر "."<span class='text-danger'></span>";
    $description = "در این بخش شما میتوانید مدیر جدید ایجاد کنید.";
    $title = "مدیران";
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
                        <label class="form-label" for="name">نام</label>
                        <input type="text" name="name" class="form-control" id="name" required="" placeholder="نام مدیر وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="email" required="" placeholder="ایمیل مدیر را وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">رمز عبور</label>
                        <input type="password" name="password" class="form-control" id="password" required="" placeholder="رمزعبور مدیر را وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">تکرار رمز عبور</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required="" placeholder="رمزعبور مدیر را دوباره نمایید...">
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
