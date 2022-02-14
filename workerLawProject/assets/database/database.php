<?php
class database {

  static function connect(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "adel";
      $conn = mysqli_connect($servername,$username,$password,$dbname);
      return $conn;
    }

    static function query($sql){
      $result = mysqli_query(database::connect(),$sql);
      return $result;
    }
    static function checkKey($key){
      $result = database::query("select nationalID from worker where nationalID = '$key' ");
      if (mysqli_num_rows($result) > 0) return true;
      else return false;

    }

    static function checkUser(){
    $nationalID = $_POST['checkNationalID']; $password = $_POST['checkPassword'];
    $result=database::query(" SELECT * FROM worker WHERE nationalID='$nationalID' AND password='$password' ");
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $_SESSION["winFname"] = $row['fname']; $_SESSION["winLname"] = $row['lname']; $_SESSION["winPassword"] = $row['password'] ;
          $_SESSION["winBalance"] = $row['balance'] ; $_SESSION["winPhoneNum"] = $row['phoneNum'] ; ; $_SESSION["winNationalID"] = $row['nationalID'] ;
          echo "<script> window.location = 'login.php';</script>";
        }
      }
      else if( !empty($_POST['checkPassword']) )echo '<script> $("#errorLogin").html("id or password is wrong") </script>';
    }

    static function refresh(){
      $phoneNum= $_SESSION["winPhoneNum"]; $password= $_SESSION["winPassword"];
      $result=database::query(" SELECT balance FROM worker WHERE phoneNum='$phoneNum' AND password='$password' ");
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_SESSION["winBalance"] = $row['balance'] ;
          }
        }
    }


  static function show(){
      $result = database::query("select * from worker");

      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result))
        echo "id: " . $row["fname"]. " - Name: " . $row["lname"]. " " . $row["phoneNum"]. "<br>";
      }
    }
}



?>
