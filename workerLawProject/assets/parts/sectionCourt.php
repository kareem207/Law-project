<?php
require_once('assets/database/database.php');
date_default_timezone_set('Africa/Cairo'); $currentDate = date("Y/m/d");
$result = database::query("SELECT * FROM court ");

echo '
      <div class=" container py-5">
      <h3> TODAY ';  date_default_timezone_set('Africa/Cairo'); $date = date("Y/m/d");  echo date("Y/m/d"); echo ' </h3>
         <div class="container bg-white">
           <div class="row">';
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '
    <a class="col-lg-3 col-6 p-3 Kstyle " onClick="showDetails(this)"  href="#" data-aos="fade-up" data-toggle="modal" data-target="#exampleModal" id="courtA">
       <div class="card">  <img class="card-img-top" src="assets/imgs/00.jpeg" alt="Card image cap" >
         <div class="card-body">
           <h5 class="card-title"> <b id="SelectedCourtName">'.$row["name"].'</b> </h5>
         </div>
       </div>
     </a>' ;}}
echo '
  </div>
 </div>
</div>';

if ( isset($_SESSION['winNationalID']) ){
  echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please inter your request data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="reForm" method = "post" >
        <div class="col-md-11 ">
        <div class="form-row my-1"> <input type="text" class="form-control" placeholder="" name="inCourt" id="inCourt" readonly > </div>
        <div class="form-row my-1"> <input type="tel" class="form-control" placeholder="Service number" name="inServiceNum" required="required"> </div>
        <div class="form-row my-1">
          <select id="inputState" class="form-control">
            <option value="1" selected>معرفه قرار</option>
          </select>
        </div>
          <div class="form-row my-1"> <input type="text" class="form-control" placeholder="Vs names" name="inVsName"> </div>
          <div class="form-row">
            <input class="form-row" type="date" id="example-date-input" name="requestDate" required="required">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Send data</button>
      </div>
      </form>

    </div>
  </div>
</div>';}
else {
  echo '  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You need to login or register first
      </div>
      <div class="modal-footer">
        <a  class="btn btn-primary" href="registeration.php">register</a>
        <a  class="btn btn-primary" href="login.php">login</a>
      </div>
    </div>
  </div>
</div>';}
if ( isset($_POST['requestDate']) ){
  $customerPhoneNum =$_SESSION['phoneNum']; $requestID = $_POST['inServiceNum'] ;
  $requestDate = $_POST['requestDate']; $state="انتظار";$proudctID ='1'; $courtName=$_POST['inCourt'];
  $vsNames="" ;$vsNames=$_POST['inVsName']; $subDate = $date;
  database::query("INSERT INTO customerproudctcourt
  VALUES ('$customerPhoneNum', '$proudctID',N'$courtName', '$requestID', '$requestDate', N'$vsNames', '$state' ,'$subDate');  ");
}
echo '
<script> function showDetails(court) {
  var court = jQuery(court).text();
  court=court.trim();
  document.getElementById("inCourt").placeholder = court ;
  document.getElementById("inCourt").value = court ;
} </script> ' ;


?>
