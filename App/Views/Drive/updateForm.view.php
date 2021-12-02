<?php /** @var Array $data */ ?>
<form method="post" action="?c=drive&a=updateList" class="pozadie">
    <div class="row">

        <div class="polozka col col-sm-6 ">
            <label for="exampleFormControlInput1" class="form-label "> Pohlavie</label>
            <br>
            <div class="custom-select offset-sm-4">
                <select name="pohlavie" class="form-control " id="pohlavie" required>
                    <option >Vyber:</option>
                    <option value="muz" <?php if ($data["pohlavie"]=="muz") echo "selected";?>>Muž</option>
                    <option value="zena" <?php if ($data["pohlavie"]=="zena") echo "selected";?>>Žena</option>
                    <option value="ine" <?php if ($data["pohlavie"]=="ine") echo "selected";?>>Iné</option>
                </select>
            </div>
        </div>

        <div class="polozka col date col-sm-6 ">
            <label for="datum" class="">Dátum:</label>
            <br>
            <input type="date" class="" id="datum" name="datum" min="<?php echo date('Y-m-d'); ?>"" value="<?php echo $data["datum"] ?>">
        </div>

        <div class="polozka col col-sm-6">
            <label for="volume">Počet hodín</label>
            <br>
            <input type="range" id="cas" name="cas" min="1" max="8" value="<?php echo $data["hodiny"] ?>"
                   oninput="amount.value=cas.value">
            <br>
            <output id="amount" name="amount" for="cas"><?php echo $data["hodiny"] ?></output>
        </div>

        <div class="polozka col col-sm-6">
            <label for="exampleFormControlInput1" class="form-label "> Tank</label>
            <div class="custom-select offset-sm-4">
                <select name="tank" class="form-control " id="tank" required>
                    <option>Vyber:</option>
                    <option value="Chieftan MK7" <?php if ($data["tank"]=="Chieftan MK7") echo "selected";?>>Chieftan MK7</option>
                    <option value="t-64 AV" <?php if ($data["tank"]=="t-64 AV") echo "selected";?>>T-64 AV</option>
                    <option value="M60 AMBT" <?php if ($data["tank"]=="M60 AMBT") echo "selected";?>>M60 AMBT</option>
                </select>
            </div>
        </div>

        <div class="polozka col strelba col-sm-6">
            <label for="strelba">Streľba</label>
            <br>
            <input type="checkbox" id="strelba" name="strelba" <?php if ($data["strelba"]==1) echo "checked";?>>
        </div>

        <div class="polozka col strelba col-sm-6">
            <label for="demolition">Demolition</label>
            <br>
            <input type="checkbox" id="demolition" name="demolition" <?php if ($data["demolition"]==1) echo "checked";?>>
        </div>

    </div>
    <div class="form-check d-flex justify-content-center mb-5">
    </div>
    <div id="submit-info">
        Formulár obsahuje chyby a nie je možné ho odoslať.
    </div>
    <div class="">
        <button type="submit" class="btn btn-primary">Upraviť</button>
    </div>
</form>


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
        validateInput(document.getElementById("tank"), function (value = null) {
            if (value == "Vyber:") {
                return "Zadaj tank";
            }
        });
        validateInput(document.getElementById("pohlavie"), function (value = null) {
            if (value == "Vyber:") {
                return "Zadaj pohlavie";
            }
        });
    }


</script>