<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Înregistrare | RoConnect</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="/assets/theme/css/themes/lite-purple.min.css" rel="stylesheet">
    <link href="/assets/theme/css/plugins/toastr.css" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url(/assets/images/background-auth/background-auth-<?= mt_rand(1, 7); ?>.jpg);background-position: center; background-size: cover;">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(/assets/theme/images/photo-long-3.jpg)">
                    <div class="pl-3 auth-right">
                        <div class="auth-logo text-center mt-4">
                            <a href="/">
                                <img src="/assets/images/RoConnect.png" alt="" style="width:100%">
                            </a>
                        </div>
                        <div class="flex-grow-1"></div>
                        <div class="w-100 mb-4">
                            <a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="/auth/login">
                                <i class="i-Mail-with-At-Sign"></i>
                                Conectează-te folosind email-ul
                            </a>
                            <a class="btn btn-outline-google btn-block btn-icon-text btn-rounded">
                                <i class="i-Google-Plus"></i>
                                Conectează-te cu Google
                            </a>
                            <a class="btn btn-outline-facebook btn-block btn-icon-text btn-rounded">
                                <i class="i-Facebook-2"></i>
                                Conectează-te cu Facebook
                            </a>
                        </div>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4">
                        <h1 class="mb-3 text-18">Înregistrare</h1>
                        <form id="register-form">
                            <div class="form-group">
                                <label for="username">Numele tău</label>
                                <input class="form-control form-control-rounded" id="username" type="text">
                            </div>
                            <div class="form-group">
                                <label for="email">Adresa de e-mail</label>
                                <input class="form-control form-control-rounded" id="email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Parola</label>
                                <input class="form-control form-control-rounded" id="password" type="password">
                            </div>
                            <div class="form-group">
                                <label for="repassword">Repetă parola</label>
                                <input class="form-control form-control-rounded" id="repassword" type="password">
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3">Înregistrează-te</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/theme/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/assets/theme/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/assets/theme/js/plugins/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#register-form').submit(function(e) {
            e.preventDefault();

            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var repassword = $('#repassword').val();

            if (username == '' || email == '' || password == '' || repassword == '') {
                toastr.error('Toate câmpurile sunt obligatorii');
                return;
            }

            if (password != repassword) {
                toastr.error('Parolele nu se potrivesc');
                return;
            }

            $.ajax({
                url: '/auth/register',
                type: 'POST',
                data: {
                    username: username,
                    email: email,
                    password: password
                },
                success: function(response) {
                    if (response.error == false) {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = '/auth/login';
                        }, 1000);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    });
</script>