<?php
session_start();
error_reporting(0);
include('../connect.php');

if (isset($_POST['btnlogin'])) {



  $current_date = date('Y-m-d h:i:s');


  $email = $_POST['txtemail'];
  $applicationID = $_POST['txtapplicationID'];

  echo $sql = "SELECT * FROM tbl_pemohon WHERE email='" . $email . "' and applicationID = '" . $applicationID . "'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ($row = mysqli_fetch_assoc($result));
    $_SESSION["uemail"] = $row['email'];

    header("Location: index.php");
  } else {

    $_SESSION['error'] = ' Wrong Email Address or Application ID';
  }
}

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login Pelajar | SDOAU</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />


</head>

<body class="gray-bg">

  <div class="middle-box text-center loginscreen animated fadeInDown">
    <div style="margin-top: 110px;">
      <div>

        <a class="logo-name" href="\student_enrollment\admission\index.php"><img src="../images/apple-touch-icon.png" alt="Online student admission form" width="auto" height="164"></a>

      </div>
      <h3>&nbsp;</h3>
      <form class="m-t" role="form" method="POST" action="">
        <div class="form-group">
          <input type="email" name="txtemail" class="form-control" placeholder="Email Address" required="">
        </div>
        <div class="form-group">
          <input type="text" name="txtapplicationID" class="form-control" placeholder="Application ID" required="">
        </div>

        <button type="submit" name="btnlogin" class="btn btn-primary block full-width m-b">Login</button>




        <p class="text-muted text-center">&nbsp;</p>
      </form>
      <p class="m-t"></p>

    </div>
  </div>

  <!-- Mainly scripts -->
  <script src="js/jquery-2.1.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="popup_style.css">
  <?php if (!empty($_SESSION['success'])) {  ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          <strong>Success</strong>
          </h1>
          <p><?php echo $_SESSION['success']; ?></p>
          <p>
            <button class="button button--success" data-for="js_success-popup">Close</button>
          </p>
      </div>
    </div>
  <?php unset($_SESSION["success"]);
  } ?>
  <?php if (!empty($_SESSION['error'])) {  ?>
    <div class="popup popup--icon -error js_error-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          <strong>Error</strong>
          </h1>
          <p><?php echo $_SESSION['error']; ?></p>
          <p>
            <button class="button button--error" data-for="js_error-popup">Close</button>
          </p>
      </div>
    </div>
  <?php unset($_SESSION["error"]);
  } ?>
  <script>
    var addButtonTrigger = function addButtonTrigger(el) {
      el.addEventListener('click', function() {
        var popupEl = document.querySelector('.' + el.dataset.for);
        popupEl.classList.toggle('popup--visible');
      });
    };

    Array.from(document.querySelectorAll('button[data-for]')).
    forEach(addButtonTrigger);
  </script>
</body>

</html>