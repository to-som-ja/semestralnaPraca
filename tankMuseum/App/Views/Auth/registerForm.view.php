<?php /** @var Array $data */ ?>

<div class="container">
    <div class="row">

        <div class="col-sm-4 offset-sm-4">
            <?php if ($data["error"] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data["error"]?>
                </div>
            <?php } ?>
            <form method="post" action="?c=auth&a=register">
                <div class="form-outline flex-fill mb-0">
                    <h2 class="">SIGN IN</h2>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">E-MAIL</label>
                        <input type="text" name="login" id="mail"  class="form-control" />
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">PASSWORD</label>
                        <input type="password" name="password1" id="password" class="form-control" required/>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">REPEAT YOUR PASSWORD</label>
                        <input type="password" name="password2" id="password2" class="form-control" required/>
                    </div>
                </div>
                <div class="form-check d-flex justify-content-center mb-5">
                    <input
                            class="form-check-input me-2"
                            type="checkbox"
                            value=""
                            id="form2Example3c"
                            name="check"
                            required
                    />
                    <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                </div>
                <div id="submit-info">
                    Formulár obsahuje chyby a nie je možné ho odoslať.
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" value="Odoslať" id="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .error {
        color: red;
        padding: 5px;
        background-color: #ffaaaa;
    }
    .has-error {
        color: red;
    }
    .has-error textarea,
    .has-error input {
        border-color: red;
    }
    #submit-info {
        display: none;
        padding: 5px;
        background-color: #ffaaaa;
        color: red;
    }
    #submit:disabled{
        background-color: red;
        border-color: red;
    }
</style>

<script>

    function validateInput(element, validationFunction) {
        element.oninput = function (event) {
            let result = validationFunction(event.target.value);

            let erId = "er-" + element.id;
            let errorEle = document.getElementById(erId);

            if (result != null) {
                if (errorEle == null) {
                    errorEle = document.createElement("div")
                    errorEle.classList.add("error");
                    errorEle.id = erId;
                }
                errorEle.innerText = result;
                element.after(errorEle);
                element.parentElement.classList.add("has-error");
            } else {
                errorEle?.remove()
                element.parentElement.classList.remove("has-error");
            }
            checkFormState();
        }
        element.dispatchEvent(new Event('input'));
    }

    function checkFormState() {
        if (document.querySelectorAll(".error").length == 0) {
            document.getElementById("submit").disabled = false;
            document.getElementById("submit-info").style.display = "none";
        } else {
            document.getElementById("submit").disabled = true;
            document.getElementById("submit-info").style.display = "block";
        }
    }
    window.onload = () => {
        validateInput(document.getElementById("mail"), function (value = null) {
            if (value == null || value.length == 0) {
                return "Mail musí byť zadaný";
            }
            let re = new RegExp('^\\S+@\\S+\\.\\S+$');
            if (!re.test(value)) {
                return "Zadaný email nemá platný formát."
            }
        });
        validateInput(document.getElementById("password2"), function (value = null) {
            if (value == null || value!= document.getElementById("password").value) {
                return "Heslá sa nezhodujú";
            }
        });
        validateInput(document.getElementById("password"), function (value = null) {
            if (value.length < 6) {
                return "Heslo musí mať aspoň 6 znakov.";
            }
        });
    }


</script>