<?php
  session_start();
  if(!class_exists('database')) { include 'assets/database/database.php';}
  $x=$_GET['col'];
  $NationalID = $_SESSION['winNationalID'];
  $result = database::query("
  SELECT cpc.courtName , cpc.state, cpc.idCounter FROM customerproudctcourt cpc
  INNER JOIN proudct p	ON p.id=cpc.proudctID
  INNER JOIN courtworker cw ON cw.courtName = cpc.courtName
  WHERE cw.workerNationalID = '$NationalID'  AND cpc.subDate BETWEEN DATE_SUB(availabilityDate, INTERVAL 3 DAY) AND cw.availabilityDate
  AND cpc.state = 'انتظار'
  ORDER BY subDate DESC
  ");
  //loop for all the proudct that he got into it
  for ($i=0; $i <=$x ; $i++) {
    $row = $result->fetch_assoc();
    if ($i!=$x) continue;
    else {
      $courtName= $row['courtName'];  $idCounter=$row['idCounter'];
      database::query("UPDATE customerproudctcourt SET state='تحت التنفيذ' WHERE idCounter='$idCounter' ");
      database::query(" INSERT INTO cwcp Values ('$courtName','$NationalID','$idCounter',''); ");
    }
}
 ?>
 <script>  window.location = "personalPage.php"; </script>
