
<main>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="showing-results">
                        Exibindo resultados para:<br/>
                        <strong><?= htmlentities($search_term) ?></strong>
                    </p>
                    <form action="<?= base_url("busca") ?>" method="GET">
                        <label for="custom-search-input" class="custom-search-input">
                            <input type="search" id="custom-search-input" name="q">
                            <button type="submit">
                                <picture>
                                    <img src="<?= base_url("_assets/images/search-icon@2x.png") ?>" alt="Buscar">
                                </picture>
                            </button>
                        </label>
                    </form>
                </div>
                <div class="col-12">
                    <div class="gcse-searchresults-only"></div>
                </div>
            </div>
        </div>
    </section>
</main>