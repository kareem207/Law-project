
<div class="text-center my-3 "></div>
         <div class="table-responsive">
           <table class="table table-bordered " id="offerTable">
             <thead class="thead-dark">
               <tr>
                 <th>اسم المحكمه</th>
                 <th>رقم الطلب</th>
                 <th >تاريخ الطلب</th>
                 <th >نوع الخدمه</th>
                 <th >الحاله</th>
                 <th >اسماء الخصوم</th>
               </tr>
             </thead>
             <tbody>
               <?php
               if(session_status() == PHP_SESSION_NONE) session_start();

               if(!class_exists('database')) { include '../database/database.php';}

               $NationalID = $_SESSION['winNationalID'];

               $resultt = database::query("
               SELECT cwcp.courtName , requestID, requestDate , name , cwcp.idCounter, cpc.vsNames FROM cwcp
               INNER JOIN customerproudctcourt cpc ON cwcp.idCounter = cpc.idCounter
               INNER JOIN proudct p	ON p.id=cpc.proudctID
               WHERE cwcp.reply = '' AND workerNationalID = '$NationalID' ");

               for ($i=0; $i < $resultt->num_rows ; $i++) {
                 $row = $resultt->fetch_assoc();
                 $counter=$row['idCounter'];
                 echo '
                 <tr id='.$counter.'>
                 <td>'.$row['courtName'].'</td>
                 <td>'.$row['requestID'].'</td>
                 <td>'.$row['requestDate'].'</td>
                 <td>'.$row['name'].'</td>
                 <td> <button class="btn btn-outline-success navbar-btn deliver"> تسليم الطلب</button> </td>
                 <td>'.$row['vsNames'].'</td>';
               }

               $result = database::query("
               SELECT cpc.courtName , cpc.requestID, cpc.requestDate , cpc.state, p.name , cpc.vsNames FROM customerproudctcourt cpc
               INNER JOIN proudct p	ON p.id=cpc.proudctID
               INNER JOIN courtworker cw ON cw.courtName = cpc.courtName
               WHERE cw.workerNationalID = '$NationalID'  AND cpc.subDate BETWEEN DATE_SUB(availabilityDate, INTERVAL 3 DAY) AND cw.availabilityDate
               AND cpc.state = 'انتظار'
               ORDER BY subDate DESC ; ");
               //loop for all the proudct that he got into it
               for ($i=0; $i <$result->num_rows ; $i++) {
                 $row = $result->fetch_assoc();
                 echo '
                 <tr id='.$i.'>
                 <td>'.$row['courtName'].'</td>
                 <td>'.$row['requestID'].'</td>
                 <td>'.$row['requestDate'].'</td>
                 <td>'.$row['name'].'</td>
                 <td> <button type="button" class="btn btn-outline-primary navbar-btn accept"  > قبول الطلب</a> </td>
                 <td>'.$row['vsNames'].'</td>';
               }
               ?>
             </tbody>
           </table>
         </div>
       </div>

      <script>
      $( ".deliver" ).click(function() {
          var col = $(this).closest("tr").attr("id");
          window.location = "replyInput.php?cid=" + col;
        });
       </script>

       <script>
         $( ".accept" ).click(function() {
           var col = $(this).closest("tr").attr("id") ;
           window.location = "acceptOffer.php?col=" + col;
         });
        </script>
