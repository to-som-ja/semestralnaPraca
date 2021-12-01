
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