<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if ( !isset($_SESSION['winNationalID']) ){

    include 'assets/parts/nav.php';
    include 'assets/parts/sectionRegisteration.html';
    include 'assets/parts/footer.html';
    require 'assets/database/database.php';

    if ( !empty($_POST['winPassword']) ){
      if (!database::checkKey($_POST['winNationalID']) ){
        $phoneNum=  $_POST['winPhoneNum']; $fname=$_POST['winFname']; $lname=$_POST['winLname'];
        $email=$_POST['winEmail']; $password=$_POST['winPassword']; $nationalID =  $_POST['winNationalID'];
        $bDayy=$_POST['winDate']; $lawID=  $_POST['winLawID'];
        $bDay = date('Y-m-d', strtotime($bDayy));
        database::query("INSERT INTO worker VALUES (N'$fname',N'$lname','$email','$password','$bDay','$phoneNum',0,'$nationalID',$lawID) ");
          $_SESSION["winFname"] = $fname ; $_SESSION["winLname"] = $lname; $_SESSION["winPassword"] = $password ;
          $_SESSION["winPhoneNum"] = $phoneNum; $_SESSION['winNationalID']=$nationalID;
          $_SESSION['winLawID']=$lawID; $_SESSION['winDate']=$bDay;  $_SESSION['winBalance']=0;
          echo "<script> window.location= 'personalPage.php' </script>";
    }
    else echo '<script> $("#inErrorMessage").html("Registeration your national ID is already exists") </script>';

}
}
else echo "<script> window.location = 'login.php';</script>";
?>
<script>
$("#reForm").validate();  
</script>
