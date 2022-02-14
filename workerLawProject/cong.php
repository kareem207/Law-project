<?php
if(session_status() == PHP_SESSION_NONE) session_start();
include 'assets/database/database.php';
if ( isset($_SESSION['winNationalID']) ){
if( isset($_SESSION['courtName']) ){
$courtName = $_SESSION['courtName'] ; $date = $_SESSION['availabilityDate']; }
include 'assets/parts/nav.php';
echo '
<div class="py-5 ">
<div class="py-5 text-center">
  <div class="container" data-aos="zoom-in" ">
    <div class="row">
      <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h3> شكرا لك </h3>
          <h3> استاذ: '.$_SESSION["winFname"]  .'</h3>
          <h3> محكمة : '.$courtName  .'</h3>
          <h3> متواجد بتاريخ : '. $date .'</h3>
          <a class="btn btn-outline-dark navbar-btn ml-md-2 px-4" href="personalPage.php" id="btnLogin" >الرجوع</a>
      </div>
    </div>
  </div>
</div>
</div>';

include 'assets/parts/footer.html';
}
else{
echo "<script> window.location = 'login.php';</script>";}
 ?>
