
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style_co.css" type="text/css">
    <title>My cinema/Connection</title>
  </head>
  <body>
    <div class="container">
      <div class="col-sm-4 offset-sm-4">
        <img src="http://accion.com.ph/wp-content/uploads/2018/03/MYCINEMAEUROPE_LOGO.png" alt="Logo my cinema">
        <?php
        if (!empty($_POST)) {
          include ('index_post.php');
        }
        ?>
        <form method="POST">
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Enter pseudo">
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            <small class="form-text text-muted"><a href="inscription.php">Vous inscrire.</a></small>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
