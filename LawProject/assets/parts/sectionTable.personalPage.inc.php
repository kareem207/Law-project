<div class="text-center my-3 "></div>
         <div class="table-responsive">
           <table class="table table-bordered ">
             <thead class="thead-dark">
               <tr>
                 <th>اسم المحكمه</th>
                 <th>رقم الطلب</th>
                 <th >تاريخ الطلب</th>
                 <th >نوع الخدمه</th>
                 <th >السعر</th>
                 <th >حاله الطلب</th>
                 <th >استعرض البيانات</th>
               </tr>
             </thead>
             <tbody>
                 <?php
                 $phoneNum = $_SESSION['phoneNum'];
                 $result = database::query("
                 SELECT courtName , requestID, requestDate , state, name ,price, idCounter FROM customerproudctcourt
                 INNER JOIN proudct 	ON id=proudctID
                 WHERE customerPhoneNum = '$phoneNum'
                 ORDER BY subDate DESC ");
                 //loop for all the proudct that he got into it
                 for ($i=0; $i <$result->num_rows && $i<5; $i++) {
                   $row = $result->fetch_assoc();
                   $counter=$row['idCounter'];
                   echo '
                   <tr id = '.$counter.'>
                   <td>'.$row['courtName'].'</td>
                   <td>'.$row['requestID'].'</td>
                   <td>'.$row['requestDate'].'</td>
                   <td>'.$row['name'].'</td>
                   <td>'.$row['price'].'</td>
                   <td>'.$row['state'].'</td>';
                   if ($row['state'] != 'تم')
                   echo '<td > <button class="btn btn-outline-dark navbar-btn " disabled >غير متوفر</button> </td>
                    </tr>';
                  else
                  echo '<td > <a class="btn btn-outline-dark navbar-btn " id="data" href="#" >البيـــــانات</a> </td>
                   </tr>';
                 }
                 ?>
             </tbody>
           </table>
         </div>
       <a class="btn btn-outline-dark navbar-btn ml-md-2" href="court.php" >طلب جديد</a>
       </div>

       <script>
         $( "#data" ).click(function() {
           var col = $(this).closest("tr").attr("id");
           window.location = "replyOutput.php?cid=" + col;
         });
        </script>
