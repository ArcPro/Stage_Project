<body class="text-center">
    <form class="form-signin" method="post">
      <img class="mb-4" src="https://avatars.githubusercontent.com/u/72943767?v=4" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Connectez vous</h1>
      <label for="inputEmail" class="sr-only">Adresse Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Email" name="email" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required="">
      <div class="checkbox mb-3"> 
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">© 2023-2024</p>
    </form>
</body>

<?php 

if (isset($_POST["submit"])) 
{
  echo $_POST["email"].$_POST["password"];
}