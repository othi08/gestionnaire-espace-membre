<?php

require_once "inc/bootstrap.php";

if(isset($_GET['id']) && isset($_GET['token'])){
    $auth = App::getAuth();
    $db = App::getDatabase();
    $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);

    if($user){
        if(!empty($_POST)) {
            $validator = new Validator($_POST);
            $validator->isConfirmed('password');
            if($validator->isValid()){
                $password = $auth->hashPassword($_POST['password']);
                $db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?',[$password, $_GET['id']]);
                $auth->connect($user);
                Session::getInstance()->setFlash('success',"Le mot de passe a bien été modifié");
                App::redirection("account.php");
            }
        }
    } else {
        Session::getInstance()->setFlash('danger',"Ce token n'est pas valide");
        App::redirection("login.php");
    }
} else {
    App::redirection("login.php");
}
?>

<?php require_once "inc/header.php";?>

    <form class="form-signin" action="" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Reset your Password</h1>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password_confirm" id="inputPasswordConfirm" class="form-control" placeholder="Password Confirmation" required>
            <label for="inputPasswordConfirm">Password Confirmation</label>
        </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
        <p class="mt-3 mb-3 text-muted text-center">Not yet registred? <a href="sign-in.php" class="font-weight-bolder"> Click here to sign up.</a></p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>

<?php require_once "inc/footer.php";?>