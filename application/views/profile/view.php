<style>
    .nav-link {
        border-bottom: 3px solid white !important;
    }

    @media (max-width: 767px) {
        .user-profile {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    }

    .custom-context-menu {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 8px 0;
        z-index: 10;
        width: 180px !important;
        margin-left: -20px;
        margin-top: 10px;
    }

    .custom-context-menu>div {
        padding: 8px 16px;
        cursor: pointer;
    }

    .custom-context-menu>div:hover {
        background-color: #f2f2f2;
    }

    .profile-picture-container {
        width: 150px !important;
        height: 150px !important;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -50px;
    }

    .profile-picture {
        width: 90%;
        height: 90%;
        object-fit: cover;
        z-index: 10;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .profile-picture-container:hover .profile-picture {
        transform: scale(1.05);
    }
</style>

<div class="main-content">
    <div class="card user-profile o-hidden mb-4" style="max-width:1000px !important;margin:auto;">
        <div class="header-cover" style="background-image: url('/uploads/users_backgrounds/<?= @$user_info->user_background ? $user_info->user_background : "photo-wide-4.jpg"  ?>');background-position: center; background-size: cover;cursor:pointer;"></div>
        <div class="user-info">
            <div class="profile-picture-container">
                <img class="profile-picture avatar-lg mb-2" src="/uploads/users_avatars/<?= @$user_info->user_avatar ?>" alt="" />
                <input type="file" hidden id="profile-pic-upload">
            </div>


            <p class="m-0 text-24"><?= @$user_info->user_name; ?></p>
            <p class="text-muted m-0"><?= @$user_info->user_role; ?></p>


        </div>
        <div class="card-body">
            <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Informații</a></li>
                <li class="nav-item"><a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Securitate</a></li>
                <li class="nav-item"><a class="nav-link" id="companies-tab" data-toggle="tab" href="#companies" role="tab" aria-controls="companies" aria-selected="false">Firme preferate</a></li>
                <?php if (count($companies) > 0) : ?>
                    <li class="nav-item"><a class="nav-link" id="my-companies-tab" data-toggle="tab" href="#my-companies" role="tab" aria-controls="my-companies" aria-selected="false">Firmele mele</a></li>
                <?php endif; ?>
            </ul>
            <div class="tab-content pb-0" id="profileTabContent">
                <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <h4>Informații personale</h4>
                    <hr class="mt-2 mb-4" />
                    <form class="row" id="user-info-form">
                        <div class="col-md-3 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i>Nume de utilizator</p>
                                <span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?= @$user_info->user_name; ?>" placeholder="Numele tău de utilizator.." name="user_name">
                                    </div>
                                </span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i>Locul nașterii</p>
                                <span>
                                    <div class="form-group">
                                        <input type="email" class="form-control" value="<?= @$user_info->user_email; ?>" placeholder="Adresa ta de e-mail" name="user_email">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i>Data de naștere</p>
                                <span>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="<?= @$user_info->user_birthday; ?>" name="user_birthday">
                                    </div>
                                </span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i>Locul nașterii</p>
                                <span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?= @$user_info->user_birth_place; ?>" placeholder="Locul nașterii" name="user_birth_place">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i>Sex</p>
                                <span>
                                    <div class="form-group">
                                        <select class="form-control" name="user_gender">
                                            <?php if (!$user_info->user_gender) : ?>
                                                <option value="" selected disabled>Selectează sexul</option>
                                            <?php endif; ?>
                                            <option value="M" <?= $user_info->user_gender == "M" ? "selected" : ""; ?>>Masculin</option>
                                            <option value="F" <?= $user_info->user_gender == "F" ? "selected" : ""; ?>>Feminin</option>
                                            <option value="N" <?= $user_info->user_gender == "N" ? "selected" : ""; ?>>Neutru</option>
                                        </select>
                                    </div>
                                </span>
                            </div>

                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i>Website</p>
                                <span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?= @$user_info->user_website; ?>" placeholder="Numele site-ului tău web.." name="user_website">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i>Nr. Telefon</p><span>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?= @$user_info->user_phone; ?>" placeholder="Numărul tău de telefon.." name="user_phone">
                                    </div>
                                </span>
                            </div>
                            <div class="mb-4">
                                <p class="text-primary mb-1"><i class="i-Paint-Brush text-16 mr-1"></i>Culoare favorită</p>
                                <span>
                                    <div class="form-group">
                                        <input type="color" class="form-control" value="<?= @$user_info->user_color; ?>" name="user_color">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- //! Securitate cont -->
                <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                    <h4>Securitatea contului tău</h4>
                    <hr class="mt-2 mb-4" />
                    <form class="row" id="user-security-form">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <p class="text-primary mb-1"><i class="i-Type-Pass text-16 mr-1"></i>Parola veche</p>
                            <span>
                                <div class="form-group">
                                    <input type="password" class="form-control" value="" placeholder="Vechea ta parolă.." name="old_password">
                                </div>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <p class="text-primary mb-1"><i class="i-Type-Pass text-16 mr-1"></i>Parola nouă</p>
                            <span>
                                <div class="form-group">
                                    <input type="password" class="form-control" value="" placeholder="Noua ta parolă.." name="new_password">
                                </div>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <p class="text-primary mb-1"><i class="i-Type-Pass text-16 mr-1"></i>Confirmă noua parolă</p>
                            <span>
                                <div class="form-group">
                                    <input type="password" class="form-control" value="" placeholder="Reintrodu noua parolă.." name="confirm_new_password">
                                </div>
                            </span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center w-100 mt-2">
                            <button class="btn btn-primary" type="submit">Schimbă parola</button>
                        </div>
                    </form>
                </div>

                <!-- //! Firme preferate -->
                <div class="tab-pane fade" id="companies" role="tabpanel" aria-labelledby="companies-tab">
                    <h4>Firmele tale preferate</h4>
                    <hr class="mt-2 mb-4" />
                    <div class="d-flex">
                        <b>Momentan nu ai adaugat nicio firma la favorite.</b>
                    </div>
                </div>

                <?php if (count($companies) > 0) : ?>
                    <!-- //! Firmele mele -->
                    <div class="tab-pane fade" id="my-companies" role="tabpanel" aria-labelledby="my-companies-tab">
                        <h4>Firmele tale</h4>
                        <hr class="mt-2 mb-4" />
                        <div class="list-horizontal">
                            <?php foreach ($companies as $company) : ?>
                                <div class="list-item col-md-12 p-0">
                                    <div class="card o-hidden flex-row mb-4 d-flex">
                                        <div class="list-thumb d-flex py-4">
                                            <img src="<?= base_url('/uploads/companies_logos/' . ($company->companies_logo ? $company->companies_logo : 'default-logo.png')) ?>" alt="Logo <?= $company->companies_name; ?>">
                                        </div>
                                        <div class="flex-grow-1 pl-2 d-flex">
                                            <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                                                <a href="/companii/vizualizare/<?= $company->companies_cui; ?>" class="w-40 w-sm-100">
                                                    <div class="item-title"><b><?= $company->companies_name; ?></b></div>
                                                </a>
                                                <p class="m-0 text-muted text-small w-15 w-sm-100"><i><?= $company->companies_cui; ?></i></p>
                                                <p class="m-0 text-muted text-small w-15 w-sm-100">
                                                    <?= $company->cities_name; ?>(<i><?= $company->companies_address; ?></i>)
                                                </p>
                                                <p class="m-0 text-muted text-small w-15 w-sm-100">
                                                    <span class="badge badge-primary p-2" style="background-color:<?= @$company->cs_color ? $company->cs_color : ""; ?>"><?= $company->cs_name; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- end of main-content -->
</div>

<!-- Modal imagine -->

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-upload-modal" data-id="">Incarcă altă imagine</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="file" hidden id="general-pic-upload">
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="User Image">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#user-info-form').change(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/profile/update',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.error == true) {
                        toastr.error(response.message, 'Uops! Ceva nu a mers cum trebuie..')
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#profile-pic-upload').change(function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('image', $(this)[0].files[0]);
            $.ajax({
                url: '/profile/upload_image/1',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.error == true) {
                        toastr.error(response.message, 'Uops! Ceva nu a mers cum trebuie..')
                    } else {
                        window.location.reload();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('.header-cover').click(function() {
            var url = '/uploads/users_backgrounds/<?= $user_info->user_background ?>';
            $('#imageModal .modal-dialog').removeClass('modal-md').addClass('modal-lg');

            $('#btn-upload-modal').attr('data-id', '2');

            $('#modalImage').attr('src', url);
            $('#imageModal').modal('show');
        });

        $('#btn-upload-modal').click(function() {
            $('#general-pic-upload').click();
        });

        $('#general-pic-upload').change(function() {
            var type = $('#btn-upload-modal').attr('data-id');
            console.log(type);
            upload_img(type);
        });

        $("#user-security-form").submit(function(e) {
            e.preventDefault();

            var new_password = $('input[name="new_password"]').val();
            var confirm_new_password = $('input[name="confirm_new_password"]').val();

            if (new_password != confirm_new_password) {
                toastr.error('Parolele nu se potrivesc!', 'Uops!');
                return;
            }

            var formData = new FormData(this);
            $.ajax({
                url: '/profile/update_password',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.error == true) {
                        toastr.error(response.message, 'Uops! Ceva nu a mers cum trebuie..')
                    } else {
                        toastr.success(response.message, 'Succes!');
                        // empty fields 
                        $('input[name="old_password"]').val('');
                        $('input[name="new_password"]').val('');
                        $('input[name="confirm_new_password"]').val('');
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

    });
</script>

<script>
    function upload_img(type) {
        var formData = new FormData();
        formData.append('image', $('#general-pic-upload')[0].files[0]);
        $.ajax({
            url: '/profile/upload_image/' + type,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.error == true) {
                    toastr.error(response.message, 'Uops! Ceva nu a mers cum trebuie..')
                } else {
                    window.location.reload();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
</script>


<!-- //! Script for context menu :) -->
<script>
    $(document).ready(function() {
        $('.profile-picture').on('click', function(event) {
            event.preventDefault();
            showCustomContextMenu(event);
        });
    });

    function showCustomContextMenu(event) {
        const userAvatarImg = $('.profile-picture');
        const imgOffset = userAvatarImg.offset();
        const imgWidth = userAvatarImg.outerWidth();
        const userAvatarSrc = userAvatarImg.attr('src');

        $('.custom-context-menu').remove();

        const customContextMenu = $('<div>', {
                'class': 'custom-context-menu'
            })
            .css({
                'position': 'absolute',
                'left': imgOffset.left,
                'top': imgOffset.top + userAvatarImg.outerHeight(),
                'width': imgWidth
            })
            .appendTo('body');

        const menuItem1 = $('<div>', {
                'text': 'Vizualizează imaginea'
            })
            .on('click', function() {
                $('#modalImage').attr('src', userAvatarSrc);
                $('#imageModal .modal-dialog').removeClass('modal-lg').addClass('modal-md');
                $('#btn-upload-modal').attr('data-id', '1');
                $('#imageModal').modal('show');
            })
            .appendTo(customContextMenu);

        const menuItem2 = $('<div>', {
                'text': 'Încarcă o imagine nouă'
            })
            .on('click', function() {
                $('#profile-pic-upload').click();
                customContextMenu.remove();
            })
            .appendTo(customContextMenu);

        setTimeout(function() {
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.custom-context-menu').length) {
                    customContextMenu.remove();
                }
            });
        }, 0);
    }
</script>