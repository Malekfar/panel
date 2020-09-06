@extends('panel.master')

@php
    $breadcrumbs = [];
    $pageName = "منو";
    $description = "";
    $title = "اطلاعات سامانه";
    $icon = "bars";
@endphp

@section('content')
    <div class="row">
    @foreach(\Harimayco\Menu\Models\Menus::all() as $menu)
        <div class="col-md-6">
            <div id="files-panel-{{$menu->id}}" class="panel panel-collapsed">
                <div class="panel-hdr">
                    <h2>
                        مدیریت منوها
                    </h2>

                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-toolbar-master waves-effect waves-themed" data-toggle="dropdown">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: top, left; top: 48px; left: 576px;">
                            <button class="dropdown-item" data-toggle="modal" data-target="#modal-menu-create{{$menu->id}}">
                                افزودن آیتم منو
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-container" style="">
                    <div class="panel-content">
                        <div class="panel-tag">
                            در این قسمت میتوانید منوهای مربوط به <span class="text-danger">{{$menu->name}}</span> را مدیریت نمایید.
                        </div>
                        <div class="frame-wrap">
                            <div class="dd dd-{{$menu->id}}" id="{{$menu->id}}" name="{{$menu->name}}">
                                @if(\Harimayco\Menu\WMenu::get($menu->id))
                                    {!! panelTree(\Harimayco\Menu\WMenu::get($menu->id))  !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                        <div class="success-checkmark">
                            <div class="check-icon" id="check-{{$menu->id}}">
                                <span class="icon-line line-tip"></span>
                                <span class="icon-line line-long"></span>
                                <div class="icon-circle"></div>
                                <div class="icon-fix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <div class="modal fade example-modal-right-transparent" id="modal-menu-create{{$menu->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-right modal-sm modal-transparent">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h4 text-white">ایجاد منو</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-create-{{$menu->id}}" data-select2-id="edit-category-parent_id">
                                <input type="text" name="id" value="{{$menu->id}}" style="display: none">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label text-white">لینک منو</label>
                                            <input type="text" name="link" required="" value="" class="form-control" placeholder="لینک مورد ...">
                                            <div class="invalid-feedback">
                                                وارد کردن این فیلد ضروری است
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label text-white">عنوان منو</label>
                                            <input type="text" name="label" required="" class="form-control" value="" placeholder="عنوان مورد ...">
                                            <div class="invalid-feedback">
                                                وارد کردن این فیلد ضروری است
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label text-white">آیکون منو</label>
                                            <input type="text" name="icon" required="" class="form-control" value="" placeholder="آیکون منو ...">
                                            <div class="invalid-feedback">
                                                وارد کردن این فیلد ضروری است
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="direction: ltr">
                            <button type="submit" form="form-create-{{$menu->id}}" class="btn btn-primary waves-effect waves-themed">افزودن منو</button>
                            <button type="button" class="btn btn-secondary waves-effect waves-themed mr-2" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
    @foreach(\Harimayco\Menu\Models\MenuItems::all() as $item)
        <!-- Modal Left Transparent-->
        <div class="modal fade example-modal-right-transparent" id="modal-menu-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right modal-sm modal-transparent">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4 text-white">ویرایش مورد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="update-menu-form" id="form-{{$item->id}}" data-select2-id="edit-category-parent_id">
                            <input type="text" name="id" required="" value="{{$item->id}}" class="form-control hidden" style="display: none" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label text-white">لینک منو</label>
                                        <input type="text" name="link" required="" value="{{$item->link}}" class="form-control" placeholder="لینک مورد ...">
                                        <div class="invalid-feedback">
                                            وارد کردن این فیلد ضروری است
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label text-white">عنوان منو</label>
                                        <input type="text" name="label" required="" class="form-control" value="{{$item->label}}" placeholder="عنوان مورد ...">
                                        <div class="invalid-feedback">
                                            وارد کردن این فیلد ضروری است
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label text-white">آیکون منو</label>
                                        <input type="text" name="icon" required="" class="form-control" value="{{$item->icon}}" placeholder="آیکون منو ...">
                                        <div class="invalid-feedback">
                                            وارد کردن این فیلد ضروری است
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="direction: ltr">
                        <button type="submit" form="form-{{$item->id}}" class="btn btn-primary waves-effect waves-themed">ویرایش منو</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-themed mr-2" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Left Transparent-->
@endsection

@push('scripts')
    <script src="/admin/js/jquery.nestable.js"></script>
    <script>
        var addcustommenur= '/harimayco//addcustommenu';
        var updateitemr= '/harimayco//updateitem';
        let deleteitemmenur = '/harimayco//deleteitemmenu';
        let generatemenucontrolr= '/harimayco//generatemenucontrol';
        window.nested = "";

        $("body").on('mousedown', ".edit-menu", function (e) {
            let id = $(this).attr("edit_id");
            $("#modal-menu-"+id).modal('toggle');
        })
        @foreach(\Harimayco\Menu\Models\Menus::all() as $menu)
        $("body").on('submit', "#form-create-{{$menu->id}}", function (e) {
            e.preventDefault();
            const formData = new FormData()
            let id = $("#"+$(this).attr('id')+" input[name=id]").val();
            let label = $("#"+$(this).attr('id')+" input[name=label]").val();
            let icon = $("#"+$(this).attr('id')+" input[name=icon]").val();
            let link = $("#"+$(this).attr('id')+" input[name=link]").val();
            formData.append('labelmenu', label);
            formData.append('linkmenu', link);
            formData.append('iconmenu', icon);
            formData.append('idmenu', id);
            console.log(label);
            axios({
                method: 'post',
                url: addcustommenur,
                data: formData,
            }).then(function(){
                $("#"+$(this).attr('id')+" input[name=label]").val("");
                $("#"+$(this).attr('id')+" input[name=icon]").val("");
                $("#"+$(this).attr('id')+" input[name=link]").val("");
                location.reload();
            }).catch(() => {

            });
        })
        $('.dd-{{$menu->id}}').nestable({
            maxDepth: 10,
            beforeDragStop: function(l,e, p){
                setTimeout(() => {
                    if(!compare(window.nested, $('.dd-{{$menu->id}}').nestable('toArray')))
                        arrangeMenu(l.attr('id'), l.attr('name'));
                }, 10)
                // l is the main container
                // e is the element that was moved
                // p is the place where element was moved.
            },
            onDragStart: function(){
                window.nested = $('.dd-{{$menu->id}}').nestable('toArray');
            }
        });
        @endforeach
        $("body").on('submit', ".update-menu-form", function (e) {
            e.preventDefault();
            const formData = new FormData()
            let id = $("#"+$(this).attr('id')+" input[name=id]").val();
            let label = $("#"+$(this).attr('id')+" input[name=label]").val();
            let icon = $("#"+$(this).attr('id')+" input[name=icon]").val();
            let link = $("#"+$(this).attr('id')+" input[name=link]").val();
            formData.append('id', id);
            formData.append('label', label);
            formData.append('icon', icon);
            formData.append('url', link);
            axios({
                method: 'post',
                url: updateitemr,
                data: formData,
            }).then(function(){
                let parent = $(`li[data-id='${id}']>div`);
                $(`li[data-id='${id}']>div>i`).remove();
                $(`li[data-id='${id}']>div>span.label`).html(label);
                parent.prepend(`<i class="fal ${icon} mr-2"></i>`);
            }).catch(() => {

            });
            console.log(id);
        })
        $("body").on('mousedown', ".remove-menu", function (e) {
            let id = $(this).attr("remove_id");
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
                .then(function(result) {
                        if (result.value) {
                            axios({
                                method: 'post',
                                url: deleteitemmenur,
                                data: {id: id},
                            }).then(function(){
                                $('.dd').nestable('remove', id);
                                toastr.success("حذف با موفقیت انجام شد");
                            }).catch(() => {

                            });
                        }
                    }
                );
        })

        function arrangeMenu(id, name)
        {
            console.log(id)
            let array = $(`.dd-${id}`).nestable('toArray');
            let newArray = [];
            let number = 0;
            let parent = undefined;
            let arraySort = [];
            const formData = new FormData()
            array.forEach(function(item, index){
                parent = item['parent_id'];
                if(!(parent in arraySort))
                    arraySort[parent] = -1;
                arraySort[parent]++;
                newArray[number] = [];

                formData.append(`arraydata[${number}][id]`, item['id']);
                formData.append(`arraydata[${number}][depth]`, item['depth']-1);
                formData.append(`arraydata[${number}][parent]`, parent == undefined ? 0 : parent);
                formData.append(`arraydata[${number}][sort]`, arraySort[parent]);


                newArray[number]['id'] = item['id'];
                newArray[number]['depth'] = item['depth']-1;
                newArray[number]['parent'] = parent == undefined ? 0 : parent;
                newArray[number]['sort'] = arraySort[parent];
                number++;
            });
            formData.append('idmenu', id);
            formData.append('menuname', name);
            axios({
                method: 'post',
                url: generatemenucontrolr,
                data: formData,
            }).then(function(){
                $(`#check-${id}`).hide();
                setTimeout(function () {
                    $(`#check-${id}`).show();
                }, 10);
            }).catch(() => {

            });
        }
        function compare(arr1, arr2) {
            if(JSON.stringify(arr1) == JSON.stringify(arr2)){
                return true;
            }
            else
                return false;
        }
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" media="screen, print" href="/admin/css/jquery.nestable.css">
    <style>
        /** * Extracted from: SweetAlert * Modified by: Istiak Tridip */
        .success-checkmark {
            width: 80px;
            height: 85px;
            margin: 0 auto;
        }
        .success-checkmark .check-icon {
            width: 80px;
            height: 80px;
            position: relative;
            border-radius: 50%;
            box-sizing: content-box;
            border: 4px solid #4caf50;
        }
        .success-checkmark .check-icon::before {
            top: 3px;
            left: -2px;
            width: 30px;
            transform-origin: 100% 50%;
            border-radius: 100px 0 0 100px;
        }
        .success-checkmark .check-icon::after {
            top: 0;
            left: 30px;
            width: 60px;
            transform-origin: 0 50%;
            border-radius: 0 100px 100px 0;
            animation: rotate-circle 4.25s ease-in;
        }
        .success-checkmark .check-icon::before, .success-checkmark .check-icon::after {
            content: '';
            height: 100px;
            position: absolute;
            background: #fff;
            transform: rotate(-45deg);
        }
        .success-checkmark .check-icon .icon-line {
            height: 5px;
            background-color: #4caf50;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
        }
        .success-checkmark .check-icon .icon-line.line-tip {
            top: 46px;
            left: 14px;
            width: 25px;
            transform: rotate(45deg);
            animation: icon-line-tip 0.75s;
        }
        .success-checkmark .check-icon .icon-line.line-long {
            top: 38px;
            right: 8px;
            width: 47px;
            transform: rotate(-45deg);
            animation: icon-line-long 0.75s;
        }
        .success-checkmark .check-icon .icon-circle {
            top: -4px;
            left: -4px;
            z-index: 10;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            position: absolute;
            box-sizing: content-box;
            border: 4px solid rgba(76, 175, 80, .5);
        }
        .success-checkmark .check-icon .icon-fix {
            top: 8px;
            width: 5px;
            left: 26px;
            z-index: 1;
            height: 85px;
            position: absolute;
            transform: rotate(-45deg);
            background-color: #fff;
        }
        @keyframes rotate-circle {
            0% {
                transform: rotate(-45deg);
            }
            5% {
                transform: rotate(-45deg);
            }
            12% {
                transform: rotate(-405deg);
            }
            100% {
                transform: rotate(-405deg);
            }
        }
        @keyframes icon-line-tip {
            0% {
                width: 0;
                left: 1px;
                top: 19px;
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px;
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px;
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px;
            }
            100% {
                width: 25px;
                left: 14px;
                top: 45px;
            }
        }
        @keyframes icon-line-long {
            0% {
                width: 0;
                right: 46px;
                top: 54px;
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px;
            }
            84% {
                width: 55px;
                right: 0px;
                top: 35px;
            }
            100% {
                width: 47px;
                right: 8px;
                top: 38px;
            }
        }
    </style>
@endpush
