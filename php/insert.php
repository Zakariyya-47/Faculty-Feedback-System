<?php

include '..\php\partials\db_connect.php';

if(isset($_POST['save']))
{    
     if(!empty($_POST['FirstName']) && !empty($_POST['LastName'])  
     && !empty($_POST['Email']) && !empty($_POST['username']) 
     && !empty($_POST['password']) && !empty($_POST['role'])
     &&  !empty($_POST['mob']) ){

      $firstname = $_POST['FirstName'];
      $lastname = $_POST['LastName'];
      $email = $_POST['Email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $role = $_POST['role'];
      $DepartmentID = $_POST['DepartmentID'];

      $query = "INSERT INTO staff (FirstName, LastName, Email, DepartmentID) VALUES ('$firstname','$lastname','$email',$DepartmentID)";
      $run = mysqli_query($connect, $query) or die (mysqli_error($connect));
      
      $cordQuery = "SELECT StaffID FROM staff ORDER BY StaffID Desc LIMIT 1";
      $coResult = $connect->query($cordQuery);		
      $row = mysqli_fetch_assoc($coResult);
      $staffID = $row['StaffID'];

      $query1 = "INSERT INTO roles(Staff_StaffID, Role, Username, Password) VALUES ($staffID,'$role', '$username', '$password' )";
      $run2 = mysqli_query($connect, $query1) or die (mysqli_error($connect));

      if($run){
         echo "<script>
         window.location.href = '../pages/dashboard.php?New Staff Added';
         alert('Category Staff Member Added');
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
