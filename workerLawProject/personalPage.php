<?php
$lineWait=0;
if(session_status() == PHP_SESSION_NONE) session_start();
if ( isset($_SESSION['winNationalID']) ){
  include 'assets/database/database.php';
  database::refresh();
  include 'assets/parts/nav.php';
  include 'assets/parts/personalPage.inc.php';
  include 'assets/parts/footer.html';

echo "
  <script>
  $('#service').click(function(){
   $('#sectionA').load('assets/parts/sectionSelectCourt.personalPage.inc.php');
     });
   $('#workTable').click(function(){
    $('#sectionA').load('assets/parts/sectionTable.personalPage.inc.php');
     });
  </script>
";
}

else echo "<script> window.location = 'login.php';</script>";
?>
