<?php
require_once(__DIR__."/entities/User.php");
require_once(__DIR__."/repositories/UserRepository.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = User::fromForm(
        htmlspecialchars($_POST["login"]),
        htmlspecialchars($_POST["email"]),
        htmlspecialchars($_POST["password"])
    );
    $result = UserRepository::getInstance()->insertUser($user);
   print_r($result);
} else {

?>
<head>
<style>

label {
    display: block;
    margin-top: 4px;
}

</style>
</head>
<body>
<form name="inscription" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Login</label>
    <input name="login" type="text" minlength="5" placeholder="login"/>
    <label>Email</label>
    <input name="email" type="email" placeholder="email"/>
    <label>Mot de Passe</label>
    <input name="password" type="password" placeholder="mot de passe"/>
    <button type="submit">s'inscrire</button>
</form></body>

<?php } ?>