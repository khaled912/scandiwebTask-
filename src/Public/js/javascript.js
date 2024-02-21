"use strict";

if (window.location.pathname === "/add-product") {
    function validateSku() {
        const temp = (target) => {
            const spinner = document.querySelector("#spinner");
            spinner.classList.remove("d-none");
            fetch('/api/product?sku=' + target.value, {
                method: 'GET'
            }).then((response) => response.json())
                .then((json) => {
                    setTimeout(() => {
                        spinner.classList.add("d-none");
                        if (json.hasOwnProperty("sku")) {
                            target.setCustomValidity("SKU already exists");
                            document.querySelector("#skuFeedback").textContent =
                                "SKU already exists.";
                        } else {
                            target.setCustomValidity("");
                            document.querySelector("#skuFeedback").textContent =
                                "Please, submit a SKU.";
                        }
                    }, 300);
                });
        };

        const sku = document.querySelector("#sku");
        sku.addEventListener(
            "focusout",
            (event) => {
                temp(event.target);
                event.target.addEventListener("input", (event) => {
                    temp(event.target);
                });
            },
            {once: true}
        );
    }
    function addSubmitValidation() {
        const form = document.querySelector(".needs-validation");
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    }

    function addElementsValidation() {
        Array.from(document.querySelectorAll("[required]")).forEach((input) => {
            input.addEventListener(
                "focusout",
                (event) => {
                    event.target.parentElement.classList.add("was-validated");
                },
                false
            );
        });
    }

    function switchProductType() {
        document
            .querySelector("#productType")
            .addEventListener("change", (event) => {
                document.querySelectorAll("#descriptions input").forEach((element) => {
                    element.removeAttribute("required");
                });

                document
                    .querySelectorAll("option:not(:first-child)")
                    .forEach((option) => {
                        document
                            .querySelector("#" + option.value.toLowerCase() + "Description")
                            .classList.add("d-none");
                    });

                if (event.target.value) {
                    const field = document.querySelector(
                        "#" + event.target.value.toLowerCase() + "Description"
                    );
                    field.classList.remove("d-none");
                    field.querySelectorAll("input").forEach((element) => {
                        element.setAttribute("required", "");
                    });
                }

                addElementsValidation();
            });

        document.querySelector("#productType").dispatchEvent(new Event("change"));
    }



    validateSku();
    switchProductType();
    addSubmitValidation();
    addElementsValidation();
}

if (window.location.pathname === "/") {
    document.getElementById('mass-delete-btn').addEventListener('click', function () {
        var checkboxes = document.querySelectorAll('.delete-checkbox:checked');
        if (checkboxes.length > 0) {
            var deleteItems = [];
            checkboxes.forEach(function (checkbox) {
                deleteItems.push(checkbox.value);
            });
            fetch('/delete-product', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    productSkus: deleteItems
                })
            }).then(function (response) {
                if (response.ok) {
                    console.log("Products deleted successfully");
                    window.location.reload()
                } else {
                    console.error("Failed to delete products");
                }
            }).catch(function (error) {
                console.error("Error:", error);
            });
        } else {
            alert('Please select at least one item to delete.');
        }
    });
}