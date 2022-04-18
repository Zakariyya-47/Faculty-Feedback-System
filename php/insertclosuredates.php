<?php

ini_set('memory_limit', '1024M');

include '..\php\partials\db_connect.php';

if(isset($_POST['closuredates']))
{    
     if(!empty($_POST['closuredate']) &&  !empty($_POST['fclosuredate'])){

      $closuredate = $_POST['closuredate'];
      $fclosuredate = $_POST['fclosuredate'];
     

      $query = "UPDATE dates SET closureDate = '$closuredate', FinalClosureDate = '$fclosuredate' WHERE DateID=3";

      $run = mysqli_query($connect, $query) or die (mysqli_error($connect));

      if($run){
         echo "<script>
         window.location.href = '../pages/dashboard.php?Date Updated';
         alert('Closure Date Updated');
      </script>";
     }

      else{
         echo "Your changes have not been submitted.";
      }


     }

     else{
        echo "Please select dates in both fields.";
     }
}
?>