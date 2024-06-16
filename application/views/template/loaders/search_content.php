<?php if (count($companies) > 0) : ?>
    <?php foreach ($companies as $company) : ?>
        <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                <div class="list-thumb d-flex py-2">
                    <img src="<?= base_url('/uploads/companies_logos/' . ($company->companies_logo ? $company->companies_logo : 'default-logo.png')) ?>" alt="Logo <?= $company->companies_name; ?>">
                </div>
                <div class="flex-grow-1 pl-2 d-flex">
                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                        <a href="" class="w-40 w-sm-100">
                            <div class="item-title"><b><?= $company->companies_name; ?></b></div>
                        </a>
                        <p class="m-0 text-muted text-small w-15 w-sm-100"><i><?= $company->companies_cui; ?></i></p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            <?= $company->cities_name; ?>
                        </p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            <i><?= $company->companies_address; ?></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="list-item col-md-12 p-0">


        <div class="alert alert-warning" role="alert">
            Nu a fost găsită nici o companie.
        </div>


    </div>
<?php endif; ?>