<?php $fname=$_SESSION["fname"]; $lname=$_SESSION["lname"]; $balance=$_SESSION["balance"];    ?>


<div class="py-5 ">
   <div class="container ">
     <div class="row">
       <div class="col-md-3 mx-2 py-3 bg-white"><img class="img-fluid d-block rounded-circle m-2" src="assets/imgs/user.png" width="200px">
         <div class="row">
           <div class="col-md-12 m-2">
             <h3 class=""><?php echo "$fname $lname";?></h3>
             <h5 class="">محامى</h5>
             <h5 class=""><?php echo "$balance";?></h5>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12 my-1">
             <div class="btn-group">
               <button class="btn btn-primary dropdown-toggle mx-2" data-toggle="dropdown"> حسابى </button>
               <div class="dropdown-menu"> <a class="dropdown-item" id="recharge" href="#">شحن الحساب</a>
                 <a class="dropdown-item" id="workTable" href="#">الاعمال المطلوبه</a>
                 <a class="dropdown-item" href="logoutFunction.inc.php">تسجيل الخروج</a>
               </div>
             </div>
           </div>
         </div>
       </div>
          <div class="col-md-8 mx-3 " id="sectionA">
            <?php include 'sectionTable.personalPage.inc.php'; ?>
          </div>
       </div>
     </div>
   </div>
 </div>
