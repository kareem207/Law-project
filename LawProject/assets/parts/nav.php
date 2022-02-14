
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="stylesheet" href="assets/css/Main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="assets/js/inputValidationn.js"></script>
  <title> Kareem's Page</title>
  <link rel = "icon" href ="assets/imgs/balance.png" type = "image/x-icon">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container"> <a class="navbar-brand text-primary" href="index.php">
        <i class="fa d-inline fa fa-balance-scale"></i>
        <b> الرول والقرار</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar5">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar5">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="#">معلومات عن الموقع</a> </li>
          <li class="nav-item"> <a class="nav-link" href="court.php">المحاكم</a> </li>
        </ul> <a class="btn btn-outline-dark navbar-btn ml-md-2" href="login.php" id="btnLogin" >تسجيل الدخول</a>
      </div>
    </div>
  </nav>
</body>

</html>

<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if ( isset($_SESSION['phoneNum']) ){
echo "<script>
$(document).ready(function(){
  $('#btnLogin').html('الصفحه الشخصيه');
  });</script>
   ";
}

?>
