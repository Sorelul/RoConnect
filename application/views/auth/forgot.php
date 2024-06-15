<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperare parolă | RoConnect</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="/assets/theme/css/themes/lite-purple.min.css" rel="stylesheet">
    <!-- import toastr -->
    <link href="/assets/theme/css/plugins/toastr.css" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url(/assets/images/background-auth/background-auth-<?= mt_rand(1, 7); ?>.jpg);background-position: center; background-size: cover;">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4">
                            <a href="/">
                                <img src="/assets/images/RoConnect.png" alt="" style="width:100%">
                            </a>
                        </div>
                        <h1 class="mb-3 text-18">Recuperare parolă</h1>
                        <form action="">
                            <div class="form-group">
                                <label for="email">Adresă e-mail</label>
                                <input class="form-control form-control-rounded" id="email" type="email">
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3">Resetează</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="/auth/login">
                                <u>Conectează-te</u></a></div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(/assets/theme/images/photo-long-3.jpg)">
                    <div class="pr-3 auth-right">
                        <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="/auth/register">
                            <i class="i-Mail-with-At-Sign"></i>
                            Înregistrează-te folosind email-ul
                        </a>
                        <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                            <i class="i-Google-Plus"></i>
                            Înregistrează-te cu Google
                        </a>
                        <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                            <i class="i-Facebook-2"></i>
                            Înregistrează-te cu Facebook
                        </a>
                        <a class="btn btn-primary btn-icon m-1 mt-3 d-flex justify-content-center align-items-center" href="#">
                            <span class="material-symbols-outlined mr-2">
                                domain_add
                            </span>
                            <span class="ul-btn__text">Înregistrează-ți compania!</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/theme/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/assets/theme/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/assets/theme/js/plugins/toastr.min.js"></script>