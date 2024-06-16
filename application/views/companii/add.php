<style>
    .select2-selection__rendered {
        line-height: 35px !important;
        font-size: 16px;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
    }

    .select2-selection__arrow {
        height: 35px !important;
    }
</style>
<!-- DropZone CSS -->
<link rel="stylesheet" href="/assets/theme/css/plugins/dropzone.min.css">


<div class="main-content mt-5">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div>
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Înregistrează o companie nouă</h4>
                    <p class="text-muted">Toate companiile îregistrate trec mai întâi printr-o verificare.</p>
                </div>
                <div class="d-flex align-content-center flex-wrap g-3">
                    <button class="btn btn-label-secondary">Anulează</button>
                    <button type="submit" class="btn btn-primary" id="submit-button">Adaugă</button>
                </div>

            </div>

            <div class="row">

                <!-- //! First column - start -->
                <div class="col-12 col-lg-8">
                    <!-- //* Informații generale - start -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Informații generale</h5>
                            <i>
                                <p class="mb-0">Toate câmpurile marcate cu o stea(*) sunt obligatorii.</p>
                            </i>
                        </div>
                        <div class="card-body">
                            <form id="general-info-form">
                                <div class="mb-3">
                                    <label class="form-label" for="company_name">Nume companie*</label>
                                    <input type="text" class="form-control" id="company_name" placeholder="Numele companiei tale.." name="company_name" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="company_address">Adresă companie*</label>
                                    <input type="text" class="form-control" id="company_address" placeholder="Adresa companiei tale.." name="company_address" autocomplete="off" required>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_cui">CUI*</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="company_cui" placeholder="CUI" name="company_cui" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <span class="material-symbols-outlined" style="font-size:20px" id="icon_cui">
                                                        cloud_upload
                                                    </span>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_nr_reg_com">Nr. registrul comerțului*</label>
                                        <input type="text" class="form-control" id="company_nr_reg_com" placeholder="J 12/123456/2000" name="company_nr_reg_com" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label" for="company_postal_code">Cod poștal*</label>
                                        <input type="text" class="form-control" id="company_postal_code" placeholder="Cod poștal" name="company_postal_code" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label" for="company_city">Oraș*</label>
                                        <select class="form-control" name="company_city" id="company_city" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_cod_caen">Cod caen</label>
                                        <input type="text" class="form-control" id="company_cod_caen" placeholder="Cod CAEN" name="company_cod_caen" aria-label="Cod caen">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_fax_number">Fax</label>
                                        <input type="text" class="form-control" id="company_fax_number" placeholder="Fax" name="company_fax_number" aria-label="Fax number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_phone">Telefon*</label>
                                        <input type="tel" class="form-control" id="company_phone" placeholder="Număr de telefon.." name="company_phone" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_email">Email*</label>
                                        <input type="email" class="form-control" id="company_email" placeholder="Adresă de email" name="company_email" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_date_registration">Dată înregistrare*</label>
                                        <input type="date" class="form-control w-100" id="company_date_registration" placeholder="Data înregistrării firmei.." name="company_date_registration" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12"><label class="form-label" for="company_date_registration_e_factura">Dată înregistrare e-factura</label>
                                        <input type="date" class="form-control w-100" id="company_date_registration_e_factura" placeholder="Data în care ați înregistrat e-factura" name="company_date_registration_e_factura">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="company_iban">IBAN</label>
                                    <input type="text" class="form-control" id="company_iban" placeholder="Introduceti iban-ul dumneavoastră.." name="company_iban" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- //* Informații generale - end -->
                </div>
                <!-- //! First column - end -->

                <!-- //! Second column - start -->
                <div class="col-12 col-lg-4">
                    <!-- //! Social Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Rețele sociale</h5>
                        </div>
                        <div class="card-body">
                            <form id="social-info-form">
                                <div class="mb-3">
                                    <label class="form-label" for="company_link_facebook">
                                        <i class="i-Facebook-2"></i>
                                        Legătură Facebook
                                    </label>
                                    <input type="text" class="form-control" id="company_link_facebook" placeholder="Legătură către pagina ta de facebook" name="company_link_facebook">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="company_link_instagram">
                                        <i class="i-Instagram"></i>
                                        Legătură Instagram
                                    </label>
                                    <input type="text" class="form-control" id="company_link_instagram" placeholder="Legătură către pagina ta de instagram" name="company_link_instagram">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="company_link_twitter">
                                        <i class="i-Twitter"></i>
                                        Legătură Twitter
                                    </label>
                                    <input type="text" class="form-control" id="company_link_twitter" placeholder="Legătură către pagina ta de twitter ( X )" name="company_link_twitter">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="company_link_linkedin">
                                        <i class="i-Linkedin"></i>
                                        Legătură Linkedin
                                    </label>
                                    <input type="text" class="form-control" id="company_link_linkedin" placeholder="Legătură către pagina ta de linkedin" name="company_link_linkedin">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- //! Social Card -->


                    <!-- //* Logo - start -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Logo-ul firmei tale</h5>
                        </div>
                        <div class="card-body">
                            <form class="dropzone dz-clickable logo-form" id="single-file-upload" action="#">
                                <div class="dz-default dz-message"><span>Apăsați pentru a încărca sau trageți logo-ul aici.</span></div>
                            </form>
                        </div>
                    </div>
                    <!-- //* Logo - end -->
                </div>


                <!-- //! Second column - end -->
            </div>
        </div>

    </div>
</div>

<!-- Dropzone -->
<script src="/assets/theme/js/plugins/dropzone.min.js"></script>
<script src="/assets/theme/js/scripts/dropzone.script.min.js"></script>

<!-- //* Autocomplete city -->
<script>
    $(document).ready(function() {
        $("#company_city").select2({
            placeholder: "Caută un oraș...",
            minLength: 1,
            ajax: {
                url: '/autocomplete/get_cities_autocomplete/',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.cities_name,
                                id: item.id_city
                            }
                        })
                    };
                }
            },
            "language": {
                "noResults": function() {
                    return "Nu a fost găsit nici un rezultat.";
                },
                "searching": function() {
                    return "Se caută...";
                }
            }
        });
    });
</script>

<!-- //* Validare CIF && completeaza CUI -->
<script>
    function validareCIF(s) {

        if (isNaN(parseInt(s))) {
            if (s.substring(0, 2) == 'RO') {
                if (parseInt(s) != s) // CIF is of form ROxxxxxxxxx
                {
                    if (s.length > 12 || s.length < 3)
                        return false;

                    s = s.substring(2, s.length); //Extract only the numeric content
                } else // CIF is only numeric
                {
                    if (s.length > 10)
                        return false;
                }
            } else {
                //VAT
                return false;
            }
        } else {
            if (s.length > 10) {
                return false;
            }
        }

        cifraControl = s.charAt(s.length - 1);
        content = s.substring(0, s.length - 1);
        while (content.length < 9) {
            content = '0' + content;
        }
        suma = content.charAt(0) * 7 + content.charAt(1) * 5 + content.charAt(2) *
            3 + content.charAt(3) * 2 + content.charAt(4) * 1 +
            content.charAt(5) * 7 + content.charAt(6) * 5 + content.charAt(7) *
            3 + content.charAt(8) * 2;
        suma = suma * 10;
        rest = suma % 11;
        if (rest == 10)
            rest = 0;

        if (rest == cifraControl) {
            return true;
        } else
            return false;
    }

    const completeazaCUI = () => {
        var vat = $('#company_cui').val();
        $.ajax({
            url: "/companii/cauta_cui/" + vat,
            type: 'GET',
            data: {},
            async: true,
            success: function(data) {
                if (data != null) {
                    console.log(data);
                    $('#company_name').val(data.date_generale.denumire);
                    $('#company_address').val(data.date_generale.adresa);
                    $('#company_nr_reg_com').val(data.date_generale.nrRegCom);
                    $('#company_postal_code').val(data.date_generale.codPostal);
                    $('#company_cod_caen').val(data.date_generale.cod_CAEN);
                    $('#company_fax_number').val(data.date_generale.fax);
                    $('#company_phone').val(data.date_generale.telefon);
                    $('#company_date_registration').val(data.date_generale.data_inregistrare);
                    $('#company_date_registration_e_factura').val(data.date_generale.data_inreg_Reg_RO_e_Factura);
                    $('#company_iban').val(data.date_generale.iban);
                }
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#company_cui').on('input', function() {
            if (validareCIF($(this).val())) {
                $('#icon_cui').css('color', 'blue');
                $('#icon_cui').css('cursor', 'pointer');
                $('#icon_cui').attr('onclick', 'completeazaCUI()');
            } else if ($(this).val().length > 3 && $(this).val().length <= 12) {
                $.ajax({
                    url: "/companii/cauta_cui/" + $(this).val(),
                    type: 'GET',
                    data: {},
                    async: true,
                    success: function(data) {
                        if (data) {
                            $('#icon_cui').css('color', 'green');
                            $('#icon_cui').css('cursor', 'pointer');
                            $('#icon_cui').attr('onclick', 'completeazaCUI()');
                        }
                    }
                });

            } else {
                $('#icon_cui').css('color', 'black');
                $('#icon_cui').css('cursor', 'unset');
                $('#icon_cui').removeAttr('onclick');
            }
        });

        $('#submit-button').click(function() {

            // check if all required fields are filled
            var required = true;
            $('#general-info-form input[required]').each(function() {
                if ($(this).val() == '') {
                    required = false;
                }
            });

            if (!required) {
                toastr.error('Toate câmpurile marcate cu * sunt obligatorii.', 'Uops.. Eroare!');

                // highlight
                $('#general-info-form input[required]').each(function() {
                    if ($(this).val() == '') {
                        $(this).css('border-color', 'red');
                    }
                });
                return;
            }

            $('#general-info-form input[required]').each(function() {
                $(this).css('border-color', '');
            });

            var formData = new FormData();
            var files = $('#single-file-upload')[0].dropzone.getAcceptedFiles();
            if (files.length > 0) {
                formData.append('file', files[0]);
            }

            var form = $('#general-info-form').serializeArray();
            $.each(form, function(i, field) {
                formData.append(field.name, field.value);
            });

            var form_2 = $('#social-info-form').serializeArray();
            $.each(form_2, function(i, field) {
                formData.append(field.name, field.value);
            });

            $.ajax({
                url: '/companii/adaugare_companie',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.error == false) {
                        toastr.success(data.message, 'Succes!');
                        setTimeout(function() {
                            window.location.href = '/companii/lista';
                        }, 2000);
                    } else {
                        toastr.error(data.message, 'Uops.. Eroare!');
                    }
                }
            });

        });
    });
</script>