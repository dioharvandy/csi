<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>{{ config('app.name', 'Element') }}</title>

    <!-- Icons -->
    <link href="{!! asset('vendors/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/css/simple-line-icons.min.css') !!}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet" >

</head>

<body class="app flex-row align-items-center">

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('errors.validation')
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">

                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                        <!-- <h2>{{ config('app.name') }}</h2> -->
                            <img src="{{ asset('/img/logo-unand.png')}}" alt="" width="50%"/>
                        </div>
                    </div>
                </div>


                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>

                        <p class="text-muted">Masuk ke akun Anda</p>

                        <form class="form-horizontal" method="POST" action="{{ route('postlogin') }}">
                            {{ csrf_field() }}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input type="text" name="username" id="username"
                                       class="form-control {{ $errors->has('username')? " is-invalid": "" }}"
                                       value="{{ old("username") }}" placeholder="Username"/>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                </div>
                                <input type="password" name="password" id="password"
                                       class="form-control {{ $errors->has('name')? " is-invalid": "" }}" required
                                       placeholder="password"/>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}" class="btn btn-link px-0">Lupa
                                        Password?</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
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
