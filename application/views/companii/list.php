<style>
    .select2-selection__rendered {
        line-height: 40px !important;
        font-size: 16px;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }
</style>


<div class="main-content mt-5">

    <!-- //! Filters -->
    <form action="/companii/lista" method="get" class="row mx-2">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="city" style="font-size:24px">Oraș</label>
                <select class="form-control" name="city" id="city">
                    <?php if ($city_info) : ?>
                        <option value="<?= $city_info->id_city ?>" selected><?= $city_info->cities_name; ?></option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="search" style="font-size:24px">Căutare</label>
                <input type="text" id="search" value="<?= $search ? $search : ""; ?>" name="search" class="form-control" placeholder="Caută după nume/email/cui.." style="height:40px;font-size:16px">
            </div>
        </div>
        <div class="col-lg-1 col-md-12 col-sm-12">
            <div class="d-flex justify-content-center align-items-center justify-content-lg-start align-items-lg-end h-100 w-100 pb-3">
                <button type="submit" class="btn btn-outline-primary">Filtrează</button>
                <a type="submit" class="btn btn-outline-dark ml-1" href="/companii/lista">
                    <span class="material-symbols-outlined" style="font-size:19px;">
                        cancel
                    </span>
                </a>
            </div>
        </div>
    </form>


    <!-- //! Companies -->
    <div class="row mx-4 mt-4">
        <?php if (count($companies) > 0) :  ?>
            <?php foreach ($companies as $company) : ?>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="card card-profile-1 mb-4">
                        <div class="card-body text-center">
                            <div class="avatar mb-3" style="border-radius: unset !important;width:unset !important;">
                                <img class="box-shadow-2" src="<?= base_url('/uploads/companies_logos/' . ($company->companies_logo ? $company->companies_logo : 'default-logo.png')) ?>" alt="" style="object-fit:contain !important; height:80px">
                            </div>
                            <h5 class="m-0"><b><?= $company->companies_name; ?></b></h5>
                            <p class="mt-0 mb-0">CUI: <i><?= $company->companies_cui; ?></i> | <a href="/companii/lista?city=<?= $company->id_city ?>"><?= $company->cities_name; ?></a></p>
                            <p class="mt-0"><i><?= $company->companies_address; ?></i></p>
                            <p></p>
                            <button class="btn btn-primary btn-rounded">Vizualizează pagina</button>
                            <div class="card-socials-simple mt-4">
                                <?php if ($company->companies_link_linkedin) : ?>
                                    <a target="_blank" href="<?= $company->companies_link_linkedin; ?>"><i class="i-Linkedin-2"></i></a>
                                <?php endif; ?>
                                <?php if ($company->companies_link_facebook) : ?>
                                    <a target="_blank" href="<?= $company->companies_link_facebook; ?>"><i class="i-Facebook-2"></i></a>
                                <?php endif; ?>
                                <?php if ($company->companies_link_twitter) : ?>
                                    <a target="_blank" href="<?= $company->companies_link_twitter; ?>"><i class="i-Twitter"></i></a>
                                <?php endif; ?>
                                <?php if ($company->companies_link_instagram) : ?>
                                    <a target="_blank" href="<?= $company->companies_link_instagram; ?>"><i class="i-Instagram"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12" style="height:300px;">
                <div class="alert alert-warning" role="alert">
                    Nu a fost găsit nici o companie.
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>


<script>
    $(document).ready(function() {
        $("#city").select2({
            placeholder: "Caută după un oraș...",
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