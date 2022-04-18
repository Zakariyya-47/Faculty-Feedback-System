<?php

ini_set('memory_limit', '1024M');

include '..\php\partials\db_connect.php';

if(isset($_POST['addDeptSave']))
{    
     if(!empty($_POST['departmentname']) &&  !empty($_POST['coordinator'])){

      $deptname = $_POST['departmentname'];
      $coordinator = $_POST['coordinator'];
     

      $query = "insert into department (DepName, Cordinator) values ('$deptname','$coordinator')";
      

      $run = mysqli_query($connect, $query) or die (mysqli_error($connect));

      if($run){
         echo "<script>
         window.location.href = '../pages/dashboard.php?New Department Added';
         alert('New Department Added');
      </script>";
      }

      else{
         echo "Your form has not been submitted.";
      }


     }

     else{
        echo "Please fill in all fields.";
     }
}
?>