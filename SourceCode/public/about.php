<?php
require_once('../lib/database.php');
require_once('../lib/initializePublic.php');
$thisPage = 'About';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  checkFormContact();
  if (isFormValidated()) {
    $name = $_POST['name'];
    $from = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
    $to = 'theamazingbridges@gmail.com';
    $headers = "From: $from";
    // mail($to, $subject, $msg, $headers);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <title>About/Contact</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="mainStyle.css">
</head>

<body>
  <?php include_once('nav.php') ?>
  <div class="container content">
    <div class="about">
      <h2 class="h3-category mb-5">About us</h2>
      <h4 class="text-center">Amazing Bridges Team</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img class="w-100" src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" alt="" >
            <div class="container px-3 pt-3">
              <h4>Thu Anh Dang</h4>
              <p class="title">Admin</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="w-100" src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" alt="">
            <div class="container px-3 pt-3">
              <h4>Xuan Chinh Tran</h4>
              <p class="title">Leader</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="w-100" src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" alt="">
            <div class="container px-3 pt-3">
              <h4>Duc Anh Duong</h4>
              <p class="title">Admin</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    <br><br>
    <div class="contact">
      <h2 class="h3-category">Contact Us</h2>
      <p>Please do not hesitate to contact us with any questions you may have.</p>
      <br>
      <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="form-group row justify-content-center">
          <label for="name" class="col-sm-2 col-form-label">Your name *</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="name" value="<?php echo isFormValidated() ? '' : $_POST['name'] ?>">
          </div>
          <div class="col-sm-2 text-danger">
            <?php if (!empty($errors['name'])) {
              echo $errors['name'];
            } ?>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="email" class="col-sm-2 col-form-label">Your email address *</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" name="email" value="<?php echo isFormValidated() ? '' : $_POST['email'] ?>">
          </div>
          <div class="col-sm-2 text-danger">
            <?php if (!empty($errors['email'])) {
              echo $errors['email'];
            } ?>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="subject" class="col-sm-2 col-form-label">Subject *</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="subject" value="<?php echo isFormValidated() ? '' : $_POST['subject'] ?>">
          </div>
          <div class="col-sm-2 text-danger">
            <?php if (!empty($errors['subject'])) {
              echo $errors['subject'];
            } ?>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <label for="msg" class="col-sm-2 col-form-label">Message *</label>
          <div class="col-sm-4">
            <textarea name="msg" class="form-control" cols="30" rows="10"><?php echo isFormValidated() ? '' : $_POST['msg'] ?></textarea>
          </div>
          <div class="col-sm-2 text-danger">
            <?php if (!empty($errors['msg'])) {
              echo $errors['msg'];
            } ?>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <div class="col-sm-2">
            <input type="submit" class="form-control btn btn-success" value="Send">
          </div>
        </div>
      </form>
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isFormValidated()) : ?>
        <h4 class="text-center">Thank You! Your message has been sent succesfully. We will contact you shortly.</h4>
      <?php endif ?>
    </div>
  </div>

  <?php include('footer.php') ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script src="script.js"></script>
</body>

</html>