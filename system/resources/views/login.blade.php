<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('public/admin') }}/login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(public/admin/login/images/wp.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3">
                            <h2 class="heading-section">Login SIJALA</h2>
                            <div class="bungkus" style="height: 47px">
                                <img src="{{ url('public/admin') }}/assets/img/avatars/pblputih.png" id="icon" alt=""style="opacity: .8; height: 100%;"/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="login-wrap p-0">
                                <h3 class="mb-4 text-center">Have an account?</h3>
                                @include('admin.utils.notif')
                                <form action="{{ url('login') }}" class="signin-form" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password-field" type="password" class="form-control"
                                            placeholder="Password" name="password" required>
                                        <span toggle="#password-field"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                                    </div>
                                </form>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50">
                                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                                <input type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                <p class="w-100 text-center">&mdash; Don't have an account? &mdash;</p>
                                <div class="social d-flex text-center">
                                    <a href="{{ url('registrasi') }}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Registrasi Mahasiswa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('public/admin') }}/login/js/jquery.min.js"></script>
    <script src="{{ url('public/admin') }}/login/js/popper.js"></script>
    <script src="{{ url('public/admin') }}/login/js/bootstrap.min.js"></script>
    <script src="{{ url('public/admin') }}/login/js/main.js"></script>

</body>

</html>
