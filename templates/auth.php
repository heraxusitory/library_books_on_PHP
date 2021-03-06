<div class="text-center">
    <form class="form-signin" method="POST" action="/app/handlers/authorize.php" id="form_auth">
        <h1 class="block-logo">LB</h1>
        <?php if (isAuth()):?>
            <?php
                $btn = 'Sign out'; 
            ?>
            <input type="hidden" name="sign_out" value="true">
        <?php else:?>
            <?php
                $btn = 'Sign in'; 
            ?>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="login" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="sign_in" value="true">
        <?php endif;?>
            <div class="alert" id="message_box" style="display: none;">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?= $btn; ?></button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</div>