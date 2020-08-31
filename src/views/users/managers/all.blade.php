@extends('panel.master')

@php
    $breadcrumbs = ["مدیران"];
    $pageName = "لیست مدیران";
    $description = "در این بخش شما لیست مدیران را مشاهده میکنید";
    $title = " لیست مدیران";
    $icon = "user";
@endphp

@push('styles')
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
@endpush

@section('content')
    <div id="panel-1" class="panel">
        <div class="panel-hdr">
            <h2>
                لیست <span class="fw-300"><i> مدیران سامانه</i></span>
            </h2>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <!-- datatable start -->
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\User::where('level', '<', 4)->get() as $user)
                        <tr id="table-user-{{$user->id}}">
                            <td>{{makePersionNumber($loop->index+1)}}</td>
                            <td>{{makePersionNumber($user->name)}}</td>
                            <td>
                                <button  class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 waves-effect waves-themed" title="نمایش دادن" onclick="showUser(`{{$user->id}}`)"><i class="fal fa-eye"></i></button>
                                <a href="{{route('users.permissions', ['user' => $user->id])}}" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 waves-effect waves-themed" title="دسترسی ها"><i class="fal fa-lock"></i></a>
                                {{--<a href="{{route('reject.colleague', ['user' => $user->id])}}" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed" title="رد همکاری"><i class="fal fa-ban"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- datatable end -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */

        $(document).ready(function()
        {
            let table = $('#dt-basic-example').DataTable({
                responsive: true
            });

        });


    </script>
@endpush

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('panel.users.create')}}">ایجاد مدیر</a>
@endsection
