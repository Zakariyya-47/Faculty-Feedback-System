<?php

include '..\php\partials\db_connect.php';

if(isset($_POST['addCatSave']))
{    
     if(!empty($_POST['catname']) &&  !empty($_POST['catdesc'])){

      $catname = $_POST['catname'];
      $catdesc = $_POST['catdesc'];
      $query = "insert into categories (CategoryName, CategoryDescription) values ('$catname','$catdesc')";
      $run = mysqli_query($connect, $query) or die (mysqli_error($connect));

      if($run){
         echo "<script>
         window.location.href = '../pages/AddCategory.php?New Cat Added';
         alert('New Category Added');
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