<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="/assets/theme/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="/assets/theme/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="/assets/theme/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/theme/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/theme/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/theme/vendor/main.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="/assets/theme/css/plugins/toastr.css" rel="stylesheet">

    <script src="/assets/theme/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/assets/theme/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="/assets/theme/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/theme/js/scripts/script.min.js"></script>
    <script src="/assets/theme/js/scripts/sidebar-horizontal.script.js"></script>
    <script src="/assets/theme/js/plugins/toastr.min.js"></script>

    <style>
        @media (max-width: 767px) {
            .header-part-left {
                display: none !important;
            }

            .about-images {
                display: none !important;
            }
        }

        .nav-tabs .nav-item .nav-link.active {
            border-color: #559DB4 !important;
            background-color: rgba(85, 157, 180, 0.1) !important;
        }
    </style>
</head>

<body class="text-left">

    <script>
        $(document).ready(function() {
            $('#userDropdown').on('click', function(e) {
                e.preventDefault();
                var aria_expanded = $(this).attr('aria-expanded') == 'true' ? 'false' : 'true';
                $(this).attr('aria-expanded', aria_expanded);
                $(this).closest('.dropdown').find('.dropdown-menu-right').toggleClass('show')
                $('.user.col').toggleClass('show');
            });

            $('#dropdownNotification').on('click', function(e) {
                e.preventDefault();
                var aria_expanded = $(this).attr('aria-expanded') == 'true' ? 'false' : 'true';
                $(this).attr('aria-expanded', aria_expanded);

                $(this).closest('.dropdown').toggleClass('show')
                $('#notifications-content').toggleClass('show');
            });
        });
    </script>

    <div class="app-admin-wrap layout-horizontal-bar">
        <div class="main-header" style="height:110px !important;z-index:30;">
            <div class="header-part-left pl-5 w-25">
                <div class="search-bar mr-5">
                    <input type="text" placeholder="Search" /><i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo" style="width:250px !important;margin:none !important;">
                    <a href="/">
                        <img src="/assets/images/RoConnect.png" alt="" style="width:100% !important;margin:none !important;height:80px;" />
                    </a>
                </div>
            </div>
            <div class="header-part-right pr-1 w-25 d-flex justify-content-end align-items-center">
                <?php if (!$this->session->userdata('user_informations')["logged_in"]) : ?>
                    <a class="btn btn-raised btn-raised-info m-1 d-flex justify-content-center align-items-center" href="/auth/login">
                        <span class="material-symbols-outlined mr-2">
                            login
                        </span>
                        Login
                    </a>
                <?php else : ?>
                    <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>

                    <!-- Notificaiton-->
                    <div class="dropdown">
                        <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-primary">3</span><i class="i-Bell text-muted header-icon"></i></div>

                        <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar="" data-suppress-scroll-x="true" id="notifications-content">
                            <div class="dropdown-item d-flex">
                                <div class="notification-icon"><i class="i-Speach-Bubble-6 text-primary mr-1"></i></div>
                                <div class="notification-details flex-grow-1">
                                    <p class="m-0 d-flex align-items-center"><span>New message</span><span class="badge badge-pill badge-primary ml-1 mr-1">new</span><span class="flex-grow-1"></span><span class="text-small text-muted ml-auto">10 sec ago</span></p>
                                    <p class="text-small text-muted m-0">James: Hey! are you busy?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User avatar dropdown-->
                    <div class="dropdown">
                        <div class="user col align-self-end"><img id="userDropdown" src="/uploads/users_avatars/<?= $this->session->userdata('user_informations')["user_avatar"] ?>" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <div class="dropdown-header"><i class="i-Lock-User mr-1"></i> <?= $this->session->userdata('user_informations')["user_name"]; ?></div><a href="/profile" class="dropdown-item">Profilul tău</a><a class="dropdown-item" href="/logout">Deconectează-te</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="horizontal-bar-wrap" style="z-index:20 !important;">
            <div class="header-topnav" style="z-index:20 !important;">
                <div class="container-fluid">
                    <div class="topnav rtl-ps-none" id="" data-perfect-scrollbar="" data-suppress-scroll-x="true" style="margin-top:35px !important;">
                        <ul class="menu float-left">
                            <li>
                                <div>
                                    <div>
                                        <label class="toggle" for="acasa">Acasă</label>
                                        <a href="/">
                                            <span class="material-symbols-outlined mr-2">
                                                home
                                            </span>
                                            Acasă
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div>
                                        <label class="toggle" for="lista-firme">Listă firme</label>
                                        <a href="">
                                            <span class="material-symbols-outlined mr-2">
                                                corporate_fare
                                            </span>
                                            Listă Firme
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!--end-doc  -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-wrap d-flex flex-column pt-0 px-0">