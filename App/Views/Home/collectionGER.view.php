<?php /** @var Array $data */

use App\Models\Post; ?>
<main class="row align-self-center">
    <nav
        class="
            tento
            navbar navbar-default
            col-xl-2 col-lg-3 col-md-5 col-12
            align-self-start
          "
    >
        <div class="container-fluid mb-auto align-self-center">
            <ul class="nav navbar-nav">
                <li><a href="?c=home&a=collectionUSSR">USSR</a></li>
                <li><a class="active" href="#">Germany</a></li>
                <li><a href="#">USA</a></li>
                <li><a href="#">Japan</a></li>
                <li><a href="#">Britain</a></li>
                <li><a href="#">Italy</a></li>
            </ul>
        </div>
    </nav>
    <?php  foreach (  Post::getAll() as $post) {
        if ($post->getCountry()=="GER"){
            ?>
            <figure class="col">
                <img src=<?=$post->getImage() ?> />
                <figcaption>
                    <div class="row">
                        <p class="col-6 align-self-end" >
                            <?=$post->getText() ?>
                        </p>
                        <a href="?c=home&a=addLike&postid=<?= $post->getId() ?>&page=collectionGER" class="like col-6 btn-primary">
                            <?= $post->getLikes() ?>
                            <i class="fa fa-thumbs-up"></i>
                        </a>
                    </div>
                </figcaption>
            </figure>
        <?php }} ?>
</main>
