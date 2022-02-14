<?php
include 'assets/parts/nav.php';
include 'assets/parts/sectionRegisteration.html';
include 'assets/parts/footer.html';
?>

<?php
require 'assets/database/database.php';
if ( !empty($_POST['inPassword']) ){
  if (!database::checkKey($_POST['inPhoneNum']) ){
    $phoneNum=$_POST['inPhoneNum']; $fname=$_POST['inFname']; $lname=$_POST['inLname'];
    $email=$_POST['inEmail']; $password=$_POST['inPassword'];
    database::query("INSERT INTO customer
      VALUES (N'$fname',N'$lname','$email','$password','$phoneNum',0) ");
      $_SESSION["fname"] = $fname ;$_SESSION["lname"] = $lname; $_SESSION["password"] = $password ;
      $_SESSION["balance"] = $balance ; $_SESSION["phoneNum"] = $phoneNum;
      echo "<script> window.location= 'personalPage.php' </script>";

  }

else echo '<script> $("#inErrorMessage").html("Registeration your phone number is already exists") </script>';
}

?>
