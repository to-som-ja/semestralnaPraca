<?php

use App\Models\News;

?>

<main class="align-self-center">
    <div class="news row">
        <input type="button" class="col-1 left" onclick="previous()" value="<<">
        <div id="news" class="col-10">
            <h2 id="title"></h2>
            <p id="text"></p>
            <img class="obrazok" id="image"  alt=""/>
        </div>
        <input type="button" class="col-1 right" onclick="next()" value=">>">
    </div>
</main>

<script>
    let i = 0;
    let len;
    var data
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "App/load-news.php", true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            console.log(data);
            len = data.length;
            display(i)
            posun();
        }
    };

    async function display(i) {
        $("#title").fadeOut(500);
        $("#text").fadeOut(500);
        $("#image").fadeOut(500);
        await new Promise(r => setTimeout(r, 500));
        document.getElementById("title").textContent = data[i].title;
        document.getElementById("text").textContent = data[i].text;
        document.getElementById("image").src = data[i].image;
        $("#title").fadeIn(500);
        $("#text").fadeIn(500);
        $("#image").fadeIn(500);
    }

    function next() {
        i++;
        i = i % len;
        display(i);
    }

    function previous() {
        if (i == 0) {
            i = len - 1;
            console.log(i);
        } else {
            i--;
            i = i % len;
        }
        display(i);
    }

    async function posun() {
        while (1) {
            await new Promise(r => setTimeout(r, 9000));
            i++;
            i = i % len;
            display(i);
        }
    }
</script>

