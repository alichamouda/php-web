<?php

function signinForm($params)
{
    $errorMsg = isset($params["errorMsg"]) ? $params["errorMsg"] : "";
    $user = isset($params["user"]) ? $params["user"] : User::fromForm("", "", "");
?>


    <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2> Login </h2>
        <div class="form-section">
            <label>Login</label>
            <input name="login" type="text" minlength="5" placeholder="login" value="<?php echo $user->getLogin(); ?>" />
        </div>
        <div class="form-section">
            <label>Mot de Passe</label>
            <input name="password" type="password" placeholder="mot de passe" />
        </div>
        <div class="button-ctr">
            <button type="submit">Login</button>
        </div>

    </form>
    <p style="height: 32px;"><?php echo $errorMsg; ?></p>
<?php
}
