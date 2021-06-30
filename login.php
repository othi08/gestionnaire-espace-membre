<?php
require_once "inc/bootstrap.php";

$auth = App::getAuth();
$db = App::getDatabase();
$session = Session::getInstance();
$auth->connectFromCookie($db); 

if ($auth->user()){
    App::redirection("account.php");
}

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $user = $auth->login($db, $_POST['username'],$_POST['password'], isset($_POST['remember']));

    if ($user) {
        $session->setFlash('success', 'Connexion effectuée');
        App::redirection('account.php');
        exit();
    } else {
        $session->setFlash('danger', 'Identifiant ou mot de passe incorrect');
        
    }
}
?>

<?php require_once "inc/header.php";?>

    <form class="form-signin" action="" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Sign In Your Account</h1>
        </div>

        <?php //$session->setFlash('danger', 'Identifiant ou mot de passe incorrect')?>

        <div class="form-label-group">
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Pseudo/E-mail</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label> 
                <input type="checkbox" name="remember" value="1">Remember me !      
            </label>
        </div>

        <p class="text-center mb-3">Password <a href="forget.php">(forgeted ?)</a></p> 
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-3 mb-3 text-muted text-center">Not yet registred? <a href="register.php" class="font-weight-bolder"> Click here to sign up.</a></p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>

<?php require_once "inc/footer.php";?>