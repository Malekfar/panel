@extends('panel.master')

@php
    $breadcrumbs = ["نقش ها"];
    $pageName = "لیست نقش های سامانه";
    $description = "در این بخش شما لیست نقش های پنل مدیریت را مشاهده خواهید کرد";
    $title = "لیست نقش ها";
    $icon = "tasks";
@endphp

@section('content')
    <div class="frame-wrap">
        <table class="table m-0 text-center">
            <thead>
            <tr>
                <th>#</th>
                <th>نام نقش</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                <tr id="role-{{$role->id}}">
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$role->name}}</td>
                    <td>
                        {{--<a href="#" onclick="deleteRole('{{$role->id}}')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed" title="حذف مورد"><i class="fal fa-times"></i></a>--}}
                        <a href="{{route('roles.show', ['role' => $role->id])}}" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1" title="دسترسی ها"><i class="fal fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteRole(id){
            Swal.mixin(
                {
                    customClass:
                        {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-danger mr-2"
                        },
                    buttonsStyling: false
                }).fire(
                {
                    title: "آیا از حذف این مورد اطمینان دارید؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "آره، پاکش کن",
                    cancelButtonText: "نه فعلا پاک نشه",
                    reverseButtons: true
                })
                .then(function(result)
                    {
                        if (result.value) {
                            var loader = $("#content-loader");
                            loader.addClass('show loader');
                            $.ajax({
                                url: `/panel/roles/${id}`,
                                method: 'delete',
                                async: false,
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: (data) => {
                                    if (data.status){
                                        toastr.success(data.message);
                                        $(`#role-${id}`).remove()
                                    }
                                    loader.removeClass('show loader');
                                }, error () {
                                }
                            });
                        }

                    }
                );
        }
    </script>
@endpush

@section('left-header')
    <a class="btn btn-primary ml-auto waves-effect waves-themed" href="{{route('roles.create')}}">ایجاد نقش</a>
@endsection
