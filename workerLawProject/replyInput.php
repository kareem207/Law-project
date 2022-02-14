<?php
if(session_status() == PHP_SESSION_NONE) session_start();
include 'assets/database/database.php';
if ( isset($_SESSION['winNationalID']) ){
$idCounter = $_GET['cid'];
$result=database::query("SELECT cpc.courtName , cpc.requestID, cpc.requestDate ,cpc.vsNames FROM customerproudctcourt cpc WHERE idCounter = $idCounter");
  $row = $result->fetch_assoc();

include 'assets/parts/nav.php';
echo '
<div class="py-5  ">
<div class="py-5 text-center ">
  <div class="container" data-aos="zoom-in" ">
    <div class="row">
      <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h3> انت على وشك تسجيل رد لطلب </h3>
          <h4> '.$row["courtName"] .' </h4>
          <h4> '.$row["requestID"] .' </h4>
          <h4> '.$row["requestDate"] .' '.$row["vsNames"].'</h4>
          <form method="post">
          <div class=" flex justify-content-center my-1">
          <div class="form-group"> <input type="text" class="form-control " placeholder="الرد" name="replayMsg" required="required"> </div>
          </div>
          <div class=" flex justify-content-center row my-2">
            <button  type="submit" class="btn btn-outline-success navbar-btn ml-md-2 px-4" >تسليم البيانات</button>
          </div>
          <div class=" flex justify-content-center row my-1">
            <a class="btn btn-outline-dark navbar-btn ml-md-2 px-4" href="personalPage.php" >الرجوع</a>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
</div>';

if(isset( $_POST['replayMsg'] ) ){
  $replay=$_POST['replayMsg'];
  database::query("UPDATE cwcp SET reply = N'$replay' WHERE idCounter = '$idCounter' ");
  database::query(" UPDATE customerproudctcourt SET state = 'تم' WHERE idCounter = '$idCounter' ");
  echo '<script> window.location = "personalPage.php" </script>';

}

include 'assets/parts/footer.html';
}


else{
echo "<script> window.location = 'login.php';</script>";}
 ?>
