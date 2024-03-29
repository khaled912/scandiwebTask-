<?php use Constant\ProductType; ?>

<nav class="navbar mb-5">
    <div class="container-fluid px-4">
        <h2 class="navbar-brand my-auto">Product Add</h2>
        <span>
            <button form="product_form" class="btn btn-outline-dark" type="submit">Save</button>
            <a href="/" type="button" class="btn btn-outline-dark" type="submit">Cancel</a>
        </span>
    </div>
</nav>

<?php if (!empty($errors)) : ?>
    <div class="container mb-5 alert alert-danger">
        <h5>Errors!</h5>
        <ul class="m-0">
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">
    <form method="post" id="product_form" class="needs-validation" novalidate>
        <fieldset>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="sku" class="col-form-label">SKU</label>
                </div>
                <div class="col-sm-auto position-relative">
                    <input required type="text" id="sku" name="sku" class="form-control"
                           value="<?= $product->data['sku'] ?? '' ?>">
                    <div id="spinner" class="spinner-border text-primary position-absolute d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div id="skuFeedback" class="invalid-feedback">
                        Please, submit a SKU.
                    </div>
                </div>
            </div>

            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="name" class="col-form-label">Name</label>
                </div>
                <div class="col-sm-auto">
                    <input required type="text" id="name" name="name" value="<?= $product->data['name'] ?? '' ?>"
                           class="form-control">
                    <div class="invalid-feedback">
                        Please, submit a name.
                    </div>
                </div>
            </div>
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-sm-2 col-lg-1">
                    <label for="price" class="col-form-label">Price ($)</label>
                </div>
                <div class="col-sm-auto">
                    <input required type="number" step=".01" min=".01" id="price" name="price"
                           value="<?= $product->data['price'] ?? '' ?>" class="form-control">
                    <div class="invalid-feedback">
                        Please, submit a valid price.
                    </div>
                </div>
        </fieldset>

        <div class="row mb-5 g-3 align-items-center">
            <div class="col-sm-2 col-lg-1">
                <label for="productType">Type Switcher</label>
            </div>
            <div class="col-sm-auto">
                <select required id="productType" name="type" class="form-select">
                <option <?php if (!($product->data['type'] ?? '')) echo "selected"; ?> value="">Type Switcher</option>

                <?php foreach (ProductType::ALL_PRODUCT_TYPES ?? '' as $productType) : ?>
                    <option <?php if (($product->data['type'] ?? '') === $productType) echo "selected"; ?>
                            value="<?= $productType ?>"><?= $productType ?></option>
                <?php endforeach ?>

               </select>
                <div class="invalid-feedback">
                    Please, submit a product type.
                </div>
            </div>
        </div>

        <div id="descriptions" class="mb-5">
            <fieldset id="dvdDescription" class="d-none">
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Size (MB)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="size" name="size" class="form-control"
                               value="<?= $product->data['size'] ?? '' ?>">
                        <div class="invalid-feedback">
                            Please, submit a size.
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset id="bookDescription" class="d-none">
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Weight (KG)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="weight" name="weight" class="form-control"
                               value="<?= $product->data['weight'] ?? '' ?>">
                        <div class="invalid-feedback">
                            Please, submit a weight.
                        </div>
                    </div>
            </fieldset>

            <fieldset id="furnitureDescription" class="d-none">
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Height (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="height" name="height" class="form-control"
                               value="<?= $product->data['height'] ?? '' ?>">
                        <div class="invalid-feedback">
                            Please, submit a height.
                        </div>
                    </div>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Width (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="width" name="width" class="form-control"
                               value="<?= $product->data['width'] ?? '' ?>">
                        <div class="invalid-feedback">
                            Please, submit a width.
                        </div>
                    </div>
                </div>
                <div class="row mb-3 g-3 align-items-center">
                    <div class="col-sm-2 col-lg-1">
                        <label for="size" class="col-form-label">Length (CM)</label>
                    </div>
                    <div class="col-sm-auto">
                        <input type="number" step="1" min="1" id="length" name="length" class="form-control"
                               value="<?= $product->data['length'] ?? '' ?>">
                        <div class="invalid-feedback">
                            Please, submit a length.
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
</div>