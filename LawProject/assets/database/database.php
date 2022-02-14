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
      $result = database::query("select phoneNum from customer where phoneNum = '$key' ");
      if (mysqli_num_rows($result) > 0) { return true;}
      else return false;

    }

    static function checkUser(){
    $phoneNum = $_POST['checkPhoneNum']; $password = $_POST['checkPassword'];
    $result=database::query(" SELECT * FROM customer WHERE phoneNum='$phoneNum' AND password='$password' ");
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $_SESSION["fname"] = $row['fname']; $_SESSION["lname"] = $row['lname']; $_SESSION["password"] = $row['password'] ;
          $_SESSION["balance"] = $row['balance'] ; $_SESSION["phoneNum"] = $row['phoneNum'] ;
          echo "<script> window.location = 'login.php';</script>";
        }
      }
      else if( !empty($_POST['checkPassword']) )echo '<script> $("#inErrorLogin").html("id or password is wrong") </script>';
    }

    static function refresh(){
      $phoneNum= $_SESSION["phoneNum"]; $password= $_SESSION["password"];
      $result=database::query(" SELECT balance FROM customer WHERE phoneNum='$phoneNum' AND password='$password' ");
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_SESSION["balance"] = $row['balance'] ;
          }
        }

    }


  static function show(){
      $result = database::query("select * from customer");

      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result))
        echo "id: " . $row["fname"]. " - Name: " . $row["lname"]. " " . $row["phoneNum"]. "<br>";
      }
    }
}



?>
