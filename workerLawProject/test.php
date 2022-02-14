 <!DOCTYPE html>
 <html>
 <head>
 <title>Demo</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

 <script>
 $(document).ready(function(){
   var profile_viewer_uid = 1;
   console.log(profile_viewer_uid);
   $.ajax({
     url: "test.php",
     method: "POST",
     data: { "profile_viewer_uid": profile_viewer_uid }
   })
    });

    </script>
 </head>
 <body>
 <button>Click Me</button>
 <div id="content"></div>

 </body>
 </html>
 <?php
 $profile_viewer_uid = $_POST['profile_viewer_uid'];
 echo($profile_viewer_uid);

 ?>
