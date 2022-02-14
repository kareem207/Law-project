<?php
  session_start();
  session_destroy();
?>

<script>
$(document).ready(function(){
  $('#btnLogin').html('Login');
  $('#btnLogin').attr('href','login.php');
  });

</script>
<?php header("Location:login.php"); ?>
