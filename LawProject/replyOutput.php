<?php
if(session_status() == PHP_SESSION_NONE) session_start();
include 'assets/database/database.php';
if ( isset($_SESSION['phoneNum']) ){
$idCounter = $_GET['cid']; $phoneNum=$_SESSION['phoneNum'];
$result=database::query("
SELECT cpc.courtName , cpc.requestID, cpc.requestDate ,cpc.vsNames ,reply FROM customerproudctcourt cpc
INNER JOIN cwcp ON cwcp.idCounter = cpc.idCounter
WHERE cpc.idCounter = '$idCounter' AND cwcp.reply !='' AND cpc.phoneNum = '$phoneNum';
");
  $row = $result->fetch_assoc();

include 'assets/parts/nav.php';
echo '
<div class="py-5  ">
<div class="py-5 text-center ">
  <div class="container" data-aos="zoom-in" ">
    <div class="row">
      <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h3>ردالطلب المصاحب للبيانات الاتيه </h3>
          <h5> المكان : '.$row["courtName"] .' </h5>
          <h5> رقم الجلسه : '.$row["requestID"] .' </h5>
          <h5> تاريخ الجلسه : '.$row["requestDate"] .' '.$row["vsNames"].'</h4>
          <hr class="btn-outline-dark">
          <h5> '.$row["reply"] .' </h5>
          <hr class="btn-outline-dark">
          <div class=" flex justify-content-center my-1">
          </div>
          <div class=" flex justify-content-center row my-1">
            <a class="btn btn-outline-dark navbar-btn ml-md-2 px-4" href="personalPage.php" >الرجوع</a>
          </div>
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
