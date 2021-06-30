<?php

require_once "inc/bootstrap.php";

if (!empty($_POST)){
	$errors = array();
    $db = App::getDatabase(); 
 
    $validator = new Validator($_POST);

    $validator->isAlpha('username', "Le pseudo n'est pas valide !");
    if($validator->isValid()) {
        $validator->isUniq('username', $db, 'users', "Ce pseudo est déjà pris");
    }
    $validator->isEmail('email', 'Votre mail n\'est pas valide !');
    if($validator->isValid()) {
        $validator->isUniq('email', $db, 'users', "Ce mail est déjà pris");
    }
    $validator->isConfirmed('password', "Vous devez rentrer un mot de passe valide");

    if ($validator->isValid()) {
        App::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);

        Session::getInstance()->setFlash("success", "Un email de confirmation vous a été envoyé !");
        App::redirection('login.php');
    } else {
        $errors = $validator->getErrors();
    }
}
?>

<?php require "inc/header.php"; ?>
 
    <form class="form-signin" action="" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign Up for free Account</h1>
        </div>

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                <p>Le formulaire n'a pas été rempli correctement !</p>
                <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-label-group">
            <input type="text" name="username" id="inputUserpseudo" class="form-control" placeholder="Your pseudo" required autofocus>
            <label for="inputUserpseudo">Pseudo</label>
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password_confirm" id="inputPasswordConfirm" class="form-control" placeholder="Password Confirmation" required>
            <label for="inputPasswordConfirm">Password Confirmation</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <p class="mt-3 mb-3 text-muted text-center">Have you already an account? <a href="login.php" class="font-weight-bolder"> Click here to sign in.</a></p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>

<?php require_once "inc/footer.php";?>