<?php

include '..\php\partials\db_connect.php';

if(isset($_POST['deleteCat']))
{    
      $catID = $_POST['catID'];

      $query = "DELETE FROM categories WHERE CategoryID= $catID";
      $run = mysqli_query($connect, $query) or die (mysqli_error($connect));
      echo "<script>
      window.location.href = '../pages/addCategory.php?category deleted';
      alert('Category Deleted');
   </script>";
    }

?>