<div class="form-wrap">
<form method= "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        <h1>Log in</h1>
        <?php Messages::display(); ?>
        <input type="email" name="email" placeholder="E-mail"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="submit" value="Login">
        <a id="sign-up" href="<?php echo "http://localhost".ROOT_PATH."users/register"; ?>">Sign up ?</a>
    </form>
</div>
 