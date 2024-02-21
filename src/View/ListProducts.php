<header class="navbar bg-custom">
    <div class="container py-3 container-fluid px-4">
        <h2 class="navbar-brand my-auto">Product List</h2>
        <span>
            <button> <a href="/add-product" class="btn btn-custom-outline" role="button">ADD</a></button>
            <button id="mass-delete-btn" type="submit">MASS DELETE</button>

        </span>
    </div>
</header>   

<section class="container my-5">
    <div class="row g-4">
        <form id="delete-form">
            <div class="row g-4">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-4">
                        <div class="card border-custom border-2">
                            <div class="card-body">
                                <div class="form-check-inline">
                                    <input type="checkbox" class="delete-checkbox form-check-input"
                                           name="delete_items[]" value="<?= $product->getSkU() ?>">
                                </div>
                                <p class="card-title text-center"><?= $product->getSkU() ?></p>
                                <p class="card-text text-center"><?= $product->getName() ?></p>
                                <p class="card-text text-center"><?= $product->getPrice() ?>$</p>
                                <p class="card-text text-center"><?= $product->getAttributeName() . ": " . $product->getAttribute() . $product->getAttributeMeasure() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </form>
    </div>
</section>