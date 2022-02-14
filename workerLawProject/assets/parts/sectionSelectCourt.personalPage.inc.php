<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if(!class_exists('database')) { include '../database/database.php';}
echo '
<div class=" my-3" id="PersonalData">
  <div class="text-center my-3 "></div>
  <form id="formCourt" method = "post">
    <div class="form-group" > <label>حضرتك هتروح فين ؟</label>
      <div class="form-row">
    <select name="slectedCourt" id="slectedCourt" class="selectpicker form-control my-1" >';

        $result=database::query("select * from court");
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<option>'. $row['name'].'</option>';
          }
        }

echo '</select>
<div class="form-row col-12"> <input type="date" class="form-control" name="courtDate" id="courtDate"  required="required"> </div>
<button type="submit"  class="btn btn-primary my-1 px-3" id="submitCourt"">تسجيل</button>
</div>
  </form>
  <p id="courtErrorMsg"> <p>';

if (isset($_POST['courtDate']) ){
$courtName = $_POST['slectedCourt']; $availabilityDate=$_POST['courtDate']; $workerNationalID = $_SESSION['winNationalID'] ;
$_SESSION['courtName'] = $_POST['slectedCourt']; $_SESSION['availabilityDate']=$_POST['courtDate'];
database::query("INSERT INTO courtworker VALUES(N'$courtName','$workerNationalID','$availabilityDate') ");
echo "<script> window.location = 'cong.php';</script>";
}

?>
