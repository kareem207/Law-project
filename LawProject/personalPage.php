<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if ( isset($_SESSION['phoneNum']) ){
  require 'assets/database/database.php';
  database::refresh();
  include 'assets/parts/nav.php';
  include 'assets/parts/personalPage.inc.php';
  include 'assets/parts/footer.html';

echo "
  <script>
  $('#recharge').click(function(){
   $('#sectionA').load('assets/parts/sectionRecharge.personalPage.inc.php'); });
   $('#workTable').click(function(){
    location.reload();
    });

  </script>
";
}

else echo "<script> window.location = 'login.php';</script>";
?>
