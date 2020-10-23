@extends('panel.master')

@php
    $breadcrumbs = ["کاربران میهمان"];
    $pageName = " ایجاد کاربر میهمان "."<span class='text-danger'></span>";
    $description = "در این بخش شما میتوانید کاربر جدید ایجاد کنید.";
    $title = "کاربران میهمان";
    $icon = "user";
@endphp

@section('content')
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
            <h2>
                ایجاد کاربر میهمان
            </h2>
            <div class="panel-toolbar">
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
            </div>
        </div>
        <div class="panel-container">
            <div class="panel-content">
                <form class="" id="update-form" action="{{route('panel.guest.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">نام</label>
                        <input type="text" name="name" class="form-control" id="name" required="" placeholder="نام کاربر وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="email" required="" placeholder="ایمیل کاربر را وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">رمز عبور</label>
                        <input type="password" name="password" class="form-control" id="password" required="" placeholder="رمزعبور کاربر را وارد نمایید...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">تکرار رمز عبور</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required="" placeholder="رمزعبور کاربر را دوبارهs نمایید...">
                    </div>
                </form>
            </div>
            <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                <button form="update-form" class="btn btn-primary mr-auto waves-effect waves-themed" type="submit">افزودن کاربر</button>
            </div>
        </div>
    </div>
@endsection

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('panel.guest.index')}}">لیست کاربران</a>
@endsection
