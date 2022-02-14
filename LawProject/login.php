<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if ( isset($_SESSION['phoneNum']) ){
 header("Location:personalPage.php");
}
else{
  include 'assets/parts/nav.php';
  include 'assets/parts/sectionLogin.html';
  include 'assets/parts/footer.html';
}
?>

<?php
require 'assets/database/database.php';
if ( !empty($_POST['checkPassword']) )  database::checkUser();

 ?>
