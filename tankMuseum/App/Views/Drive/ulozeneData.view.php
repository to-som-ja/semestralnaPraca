<?php /** @var Array $data */ ?>
<h2>
    Uložené dáta :
</h2>
<div>
    <p>
        email: <?php echo $data["email"] ?>
    </p>
    <br>
    <p>
        pohlavie: <?php echo $data["pohlavie"] ?>
    </p>
    <br>
    <p>
        dátum: <?php echo $data["datum"] ?>
    </p>
    <br>
    <p>
        počet hodín: <?php echo $data["hodiny"] ?>
    </p>
    <br>
    <p>
        tank: <?php echo $data["tank"] ?>
    </p>
    <br>
    <p>
        streľba: <?php if ($data["strelba"]==1) echo "ano"; else echo "nie" ?>
    </p>
    <br>
    <p>
        demolition: <?php if ($data["demolition"]==1) echo "ano"; else echo "nie" ?>
    </p>
    <br>
    <div class="row buttons">
        <form name="myForm" method="post"  action="?c=drive&a=delete" class="col col-sm-4 offset-sm-2">
        <button onclick="confirmAction(event);" class="btn delete btn-primary">Odstrániť</button>
        </form>
        <form method="post" action="?c=drive&a=update" class="col col-sm-4 ">
            <button type="submit" class="btn update btn-primary">Upraviť dáta</button>
        </form>
    </div>
</div>

<script>
    function confirmAction(e)
    {
        var confirmation = confirm("Delete ?") ;

        if (!confirmation)
        {
            e.preventDefault() ;
            returnToPreviousPage();
        }

        return confirmation ;
    }

</script>