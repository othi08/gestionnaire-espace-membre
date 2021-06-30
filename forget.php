<?php

require_once "inc/bootstrap.php";

if (!empty($_POST) && !empty($_POST['email'])){
    $db = App::getDatabase();
    $auth = App::getAuth();
    $session = Session::getInstance();
    if ($auth->resetPassword($db, $_POST['email'])) {
        $session->setFlash('success', 'Le rappel du mot de passe a été envoyé par mail');

        App::redirection('login.php');
    }else{
        $session->setFlash('danger', 'Aucun compte ne correspond à cette adresse');
    }
}
?>

<?php require_once "inc/header.php";?>

    <form class="form-signin" action="" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Forgeted Password</h1>
        </div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">E-mail</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <p class="mt-3 mb-3 text-muted text-center">Not yet registred? <a href="sign-up.php" class="font-weight-bolder"> Click here to sign up.</a></p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>

<?php require_once "inc/footer.php";?>
