<?php /** @var Array $data */ ?>
<main class="px-3 mx-auto">
    <?php if ($data["success"] != "") { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?= $data["success"]?>
        </div>
    <?php } ?>
    <h2>If you love tanks, you’re in the right place.</h2>
    <p class="lead">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
        minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p class="lead">
        <a
                href="?c=home&a=drive"
                class="btn btn-lg btn-secondary "
        >View more</a
        >
    </p>
</main>