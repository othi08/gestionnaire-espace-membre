  <?php
  require_once "inc/bootstrap.php";

  $auth = App::getAuth()->restrict();

  if (!empty($_POST)){
      if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
          $_SESSION['flash']['danger'] = "Les password ne correspondent pas";
      } else {
          $user_id = $_SESSION['auth']->id;
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          require_once 'inc/db.php';
          $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);
          $_SESSION['flash']['success'] = "Votre mot de passe a bien été mise à jour";
      }
  } 
  ?>



  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Jekyll v4.1.1">
      <title>Fixed top navbar example · Bootstrap</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

      <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
      <!-- Custom styles for this template -->
      <link href="navbar-top-fixed.css" rel="stylesheet">
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <form style="margin-right: 50%;" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 mr2" type="submit">Search</button>
        </form>

        <a class="navbar-brand" href="#">ADMIN</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <?php if (isset($_SESSION['auth'])): ?>
              <li class="nav-item">
                <a class="nav-link btn-danger" href="logout.php">logout</a>
              </li>
            <?php endif; ?>
          </ul>
        
        </div>
      </nav>

  <main role="main" class="container">
          <?php if (Session::getInstance()->hasFlashes()): ?>
              <?php foreach (Session::getInstance()->getFlashes() as $type => $message ): ?>
                  <div class="alert alert-<?= $type; ?>" >
                      <?= $message; ?>
                  </div>
              <?php endforeach; ?>
          <?php endif; ?>

          <h1>Your Account !</h1>
          <h2>Hi !!!! <?= $_SESSION['auth']->username; ?></h2>

          

          <div class="container-fluid">
            <p>
              Salut les amis ! Désolé si le site est en anglais ! J'avais envie de vous faire un peu chier ! Non, je rigole ! C'est pour nous habituer
              à des mots anglais, bon nombre de développeur code en anglais, il va donc falloir s'y faire. Alors, essayer d'analyser le code. Il est riche.
              Je l'ai tout de même un peu modifié car il est normalement issu d'un tuto. <br> 
              Alors, nous allons faire de la programmation modulaire, mais nous aurons également besoin d'Ajax pour rendre notre app plus dynamique et fluide. <br>
              Faite donc vos recherche  sur : <br>                
            </p>
          </div>

          <div class="row">
            <p class="col-md-6">
              <span class="text-danger">* le MVC </span> <br>
              <span class="text-danger">* la technologie Ajax si je peux ainsi l'appeler. </span> <br>
            </p>
            <p class="col-md-6">
              J'allais oublier, nous coderons en poo alors, révisons donc tout sur la poo. <br>
              Rapprochez vous de moi ou de Médard pour la vidéo. MAis si vous préférez, je l'enverrai sur le canal discord.
            </p>
          </div>

          <form action="" method="post">
              <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="Changer votre password" />
              </div>
              <div class="form-group">
                  <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du password" />
              </div>
              <button class="btn btn-primary">Changer mon mot de passe</button>
          </form> 
  </main>
        
    

      <!-- Core JavaScript
      ================================================== -->
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  </html>
