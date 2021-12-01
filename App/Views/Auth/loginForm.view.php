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
            <form method="post" action="?c=auth&a=login">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="login" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <form method="post" action="?c=auth&a=registerForm">
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" >Register</button>
                </div>
            </form>
        </div>
    </div>
</div>