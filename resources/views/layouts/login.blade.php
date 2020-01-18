<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>{{ config('app.name', 'Element') }}</title>

    <!-- Icons -->
    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/simple-line-icons.min.css') !!}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">

                @yield('content')

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('vendors/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/js/popper.min.js') }}"></script>
<script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>


</body>

</html>