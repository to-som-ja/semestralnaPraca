<?php /** @var Array $data */ ?>
<form method="post" action="?c=drive&a=updateList" class="pozadie">
    <div class="row">

        <div class="polozka col col-sm-6 ">
            <label for="exampleFormControlInput1" class="form-label "> Pohlavie</label>
            <br>
            <div class="custom-select offset-sm-4">
                <select name="pohlavie" class="form-control " id="exampleFormControlInput2" required>
                    <option value="0">Vyber:</option>
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
                <select name="tank" class="form-control " id="exampleFormControlInput3" required>
                    <option value="0">Vyber:</option>
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
    <div class="">
        <button type="submit" class="btn btn-primary">Upraviť</button>
    </div>
</form>


<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>