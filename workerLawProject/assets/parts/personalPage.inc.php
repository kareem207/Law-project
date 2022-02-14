<?php
$fname=$_SESSION["winFname"]; $lname=$_SESSION["winLname"]; $balance=$_SESSION["winBalance"]; $nationaId=$_SESSION['winNationalID'];

$re1=database::query("SELECT COUNT(courtName) as C FROM cwcp
WHERE workerNationalId='$nationaId' ");
$row1 = $re1->fetch_assoc();
$acceptedWork=$row1['C'];

$re2=database::query("SELECT COUNT(courtName) as C FROM cwcp
WHERE workerNationalId='$nationaId' AND reply!='' ");
$row2 = $re2->fetch_assoc();
$finishedWork=$row2['C'];


    ?>
<div class="py-5 ">
   <div class="container ">
     <div class="row">
       <div class="col-md-3 mx-2 py-3 bg-white"><img class="img-fluid d-block rounded-circle m-2" src="assets/imgs/user.png" width="200px">
         <div class="row">
           <div class="col-md-12 m-2">
             <h3 class=""><?php echo "$fname $lname";?></h3>
             <h5 class=""> عضو فريق</h5>
             <h5 class="">الاعمال المستلمه : <?php echo "$acceptedWork";?></h5>
             <h5 class="">الاعمال المنتهيه : <?php echo "$finishedWork";?></h5>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 my-1">
             <div class="btn-group">
               <button class="btn btn-primary dropdown-toggle mx-2" data-toggle="dropdown"> حسابى </button>
               <div class="dropdown-menu"> <a class="dropdown-item" id="service" href="#"> تسجيل الوجهه</a>
                 <a class="dropdown-item" id="workTable" href="#"> الاعمال المتاحه</a>
                 <a class="dropdown-item" href="logoutFunction.inc.php">نسجيل الحروج</a>
               </div>
             </div>
           </div>
         </div>
       </div>
          <div class="col-md-8 mx-3 " id="sectionA">
            <?php include 'sectionSelectCourt.personalPage.inc.php'; ?>
          </div>
       </div>
     </div>
   </div>
 </div>
