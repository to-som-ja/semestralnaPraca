<!DOCTYPE html>
<html lang="sk" class="h-100">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="public/files/tank_icon.png"/>
    <title>Tank Museum</title>

    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="public/css.css"/>
    <?php switch ($this->viewName) {

    case "Home\contact" : ?>
    <link rel="stylesheet" href="public/contact.css"/>
    <?php break; ?>
    <?php case "Auth\registerForm" : ?>
            <link rel="stylesheet" href="public/registerForm.css"/>
        <script src="public/scriptSelect.js"></script>
            <?php break; ?>

    <?php case "Home\collectionUSSR" : ?>
    <link rel="stylesheet" href="public/collection.css"/>
    <?php break; ?>

    <?php case "Drive\driveRegister" : ?>
    <link rel="stylesheet" href="public/driveRegister.css"/>
    <?php break; ?>

    <?php case "Drive\updateForm" : ?>
    <link rel="stylesheet" href="public/driveRegister.css"/>
    <?php break; ?>

    <?php case "Drive\ulozeneData" : ?>
    <link rel="stylesheet" href="public/ulozeneData.css"/>
    <?php break; ?>



    <?php case "Home\drive" : ?>
    <link rel="stylesheet" href="public/drive.css"/>
        <?php break;
    }    ?>

</head>
<body class="d-flex h-100 text-center text-white bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="cover-container mx-auto">
        <div class="toto">
            <h1 class="float-md-start mb-0">Tank Museum</h1>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a <?php if ($this->viewName == "Home\index") { ?>
                    class="nav-link active"
                <?php } else { ?> class="nav-link"  <?php } ?>
                        href="?c=home&a=index">Home</a>

                <a class="nav-link" href="news.html">News</a>

                <a <?php if ($this->viewName == "Home\collectionUSSR") { ?>
                    class="nav-link active"
                <?php } else { ?> class="nav-link"  <?php } ?>
                        href="?c=home&a=collectionUSSR">Collection</a>

                <a <?php if ($this->viewName == "Home\drive") { ?>
                    class="nav-link active"
                <?php } else { ?> class="nav-link"  <?php } ?>
                        href="?c=home&a=drive">Drive</a>

                <a <?php if ($this->viewName == "Home\contact") { ?>
                    class="nav-link active"
                <?php } else { ?> class="nav-link"  <?php } ?>
                        href="?c=home&a=contact">Contact</a>

                <?php if (\App\Auth::isLogged()) { ?>
                    <a class="nav-link" href="?c=auth&a=logout">Logout</a>
                <?php } else { ?>
                    <a <?php if ($this->viewName == "Auth\loginForm") { ?>
                        class="nav-link active"
                    <?php } else { ?> class="nav-link"  <?php } ?>
                            href="<?= \App\Config\Configuration::LOGIN_URL ?>">Login</a>
                <?php } ?>

            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <?= $contentHTML ?>
            </div>
        </div>
    </div>
    <footer class="mt-auto text-white">
        <p class="footer">
            <a target="_blank" href="https://www.facebook.com"
            ><i class="fa fa-facebook-square"></i
                ></a>
            <a target="_blank" href="https://www.instagram.com"
            ><i class="fa fa-instagram"></i
                ></a>
            <a target="_blank" href="https://www.twitter.com"
            ><i class="fa fa-twitter-square"></i
                ></a>
            <a target="_blank" href="https://www.youtube.com"
            ><i class="fa fa-youtube-square"></i
                ></a>
        </p>
    </footer>
</div>
</body>
</html>
