<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  checkFormLogin();
  if (isFormValidated()) {
    if (isset($_POST['rememberme'])) {
      $days = 30;
      setcookie("rememberme", $_POST['loginName'], time() + ($days * 24 * 60 * 60 * 1000));
    }
    $_SESSION['user'] = $_POST['loginName'];
    redirect_to('index.php');
  }
} else {
  if (isset($_SESSION['user'])) {
    redirect_to('index.php');
  } elseif (isset($_COOKIE['rememberme'])) {
    $cookie = $_COOKIE['rememberme'];
    if (checkCookie($cookie)) {
      $_SESSION['user'] = $cookie;
      redirect_to('index.php');
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      background-color: #e4e5e6;
    }

    .container>.row {
      background-color: white;
      flex-basis: 60%;
      justify-content: center;
      padding-top: 50px;
      padding-bottom: 50px;
      border: 1px solid #bdbdbd;
    }
  </style>
</head>

<body>
  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row">
      <div class="col-md-10">
        <h1 class="text-center mb-4">Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user"></i>
              </span>
            </div>
            <input type="text" name="loginName" class="form-control" placeholder="Name" aria-label="Adminname" aria-describedby="basic-addon1" value="<?php echo isFormValidated() ? '' : $_POST['loginName'] ?>">
          </div>
          <?php if (!empty($errors['loginName'])) : ?>
            <div class="text-danger mb-3">
              <?php echo $errors['loginName']; ?>
            </div>
          <?php endif ?>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-lock"></i>
              </span>
            </div>
            <input type="password" name="loginPwd" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
          </div>
          <?php if (!empty($errors['loginPwd'])) : ?>
            <div class="text-danger mb-3">
              <?php echo $errors['loginPwd']; ?>
            </div>
          <?php endif ?>
          <input type="checkbox" name="rememberme" class="mb-4"><small>Remember me</small>
          <div class="row justify-content-between">
            <div class="col-md-8">
              <input class="btn btn-primary px-3" type="submit" value="Login">
            </div>
            <br>
            <div class="col-md-4">
              <a href="#">
                <p>Forget Password ?</pathinfo>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script src="script.js"></script>
</body>

</html>