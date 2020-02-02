<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    {{--    Styles--}}
    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet" >
    @stack('after-styles')

    @toastr_css
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Brand options
1. '.brand-minimized'       - Minimized brand (Only symbol)

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas aside-menu-hidden sidebar-lg-show">

@include('backend.layouts.header')

<div class="app-body">

    @include('backend.layouts.sidebar')

<!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            @yield('breadcrumb')

            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    @yield('toolbar')
                </div>
            </li>
        </ol>


        <div class="container-fluid">

{{--            @include('errors.validation')--}}

            <div class="animated fadeIn">
                @yield('content')
            </div>

        </div>
        <!-- /.conainer-fluid -->
    </main>
    @include('backend.layouts.aside')

</div>

@include('backend.layouts.footer')

{{--Scripts--}}
@stack('before-scripts')
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/backend.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
{{-- DataTables --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>


@jquery
@toastr_js
@toastr_render
@stack('after-scripts')

@isset(Auth::user()->id)

@endisset
@yield('javascript')

</body>

</html>
