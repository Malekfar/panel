<!DOCTYPE html>
<html lang="en">
<head>
    @include('malekfar.panel.partials.head')
    @yield('styles')
    @stack('styles')
</head>
<body class="mod-bg-1 ">
<!-- DOC: script to save and load page settings -->
@include('malekfar.panel.partials.scriptSetting')
<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">
    <div class="page-inner">
        <!-- BEGIN Left Aside -->
    @include('malekfar.panel.partials.sidebar')
    <!-- END Left Aside -->
        <div class="page-content-wrapper">
            <!-- BEGIN Page Header -->
        @include('malekfar.panel.partials.header')
        <!-- END Page Header -->
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
            <main id="js-page-content" role="main" class="page-content">
                @include('malekfar.panel.partials.breadcrumb')
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-{{$icon}}'></i> {!! $pageName !!}
                        <small>
                            {{$description}}
                        </small>
                    </h1>
                    <div class="subheader-block">
                        @yield('left-header')
                    </div>
                </div>
                <div id="content-loader" class="bootbox modal fade bootbox-alert" style="padding-right: 17px;position: absolute;background-color: #80808030;z-index: 100000000000000000">
                    <div class="spinner-grow" style="width: 3rem; height: 3rem;position: relative;top: 46%;left: -45%;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                @include('malekfar.panel.partials.errors')
                @yield('content')
            </main>
            <!-- this overlay is activated only when mobile menu is triggered -->
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
        </div>
    </div>
</div>

<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
@include('malekfar.panel.partials.shortcutMenu')
<!-- END Quick Menu -->
<!-- BEGIN Messenger -->
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
@include('malekfar.panel.partials.settings')
<!-- END Page Settings -->
<script src="/admin/js/app.js"></script>
<script>
    let loader = $("#content-loader");
</script>
@yield('scripts')
@stack('scripts')
<script>
    @if(session()->has('closeTicket'))
    toastr.success(`{{session()->get('closeTicket')}}`);
    @endif
    $(".menu-active").parents('li').each(function() {
        $(this).addClass('open')
    })
    $(".menu-active").parent('li').removeClass('open');
    $(".menu-active").parent('li').addClass('active');
    $(".menu-active").parents('ul').each(function() {
        $(this).css({display: 'block'})
    })
</script>
</body>
</html>
