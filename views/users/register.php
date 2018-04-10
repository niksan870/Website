<div class="sec1">
    <div class="form-wrap">
        <form method= "POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <h1>Sign Up</h1>
            <?php Messages::display(); ?>
            <input type="text" name="name" placeholder="Name"/>
            <input type="email" name="email" placeholder="E-mail" />
            <input type="password" name="password" placeholder="Password"/>
            <input type="password" name="password-verify" placeholder="Password"/>
            <input type="submit" name="submit" value="Sign Up">
        </form>
    </div>
</div>