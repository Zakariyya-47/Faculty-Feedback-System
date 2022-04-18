<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php

include_once '../php/partials/db_connect.php';
include_once '../php/partials/side-menu.php';

 //roles.Staff_StaffID, roles.Role,
 //categories.CategoryID, categories.CategoryName, categories.CategoryDescription,

 //CROSS JOIN roles
//CROSS JOIN categories

//<th>CategoryID</th>
  //  <th>CategoryName</th>
    //<th>CategoryDescription</th>

   // <th>Staff_StaffID</th>
    //  <th>Role</th>

$query = 

 "SELECT staff.StaffID, staff.FirstName, staff.LastName, staff.Email, 
 department.DepartmentID, department.DepName, department.Cordinator, 
 ideas.IdeaID, ideas.Categories_CategoryID, ideas.Staff_StaffID, ideas.Idea, ideas.Upvotes, ideas.Downvotes, ideas.anonymous,
 comments.CommentID, comments.Content, comments.CommentSubmissionDate,
 dates.DateID, dates.closureDate, dates.FinalClosureDate

 FROM staff 
 CROSS JOIN department
 
 CROSS JOIN ideas
 
 CROSS JOIN comments
 CROSS JOIN dates";

$result = $connect->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>
<div class="body">
    <div class="container">
    <div class="wrapper">

    <div class="containers">
        <h3>All Information</h3>
    
        <div class="row">

        <div class="col-md-6 head">
    <div class="float-right">
        <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>

        <table class="table table-striped table-bordered">

        <thead class="thead-dark">
<tr>
    <th>StaffID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>DepartmentID</th>
    <th>Department Name</th>
    <th>Department Coordinator</th>
    
    <th>IdeaID</th>
    <th>Categories_CategoryID</th>
    <th>Staff_StaffID</th>
    <th>Idea</th>
    <th>Upvotes</th>
    <th>Downvotes</th>
    <th>Anonymity</th>
    
    <th>CommentID</th>
    <th>Content</th>
    <th>CommentSubmissionDate</th>
    <th>DateID</th>
    <th>closureDate</th>
    <th>FinalClosureDate</th>
    

</tr>

</thead>

<tbody>

    <?php

           
if($result->num_rows>0){$sn=1;
    while($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['StaffID']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['DepartmentID']; ?></td>
            <td><?php echo $row['DepName']; ?></td>
            <td><?php echo $row['Cordinator']; ?></td>
            
            <td><?php echo $row['IdeaID']; ?></td>
            <td><?php echo $row['Categories_CategoryID']; ?></td>
            <td><?php echo $row['Staff_StaffID']; ?></td>
            <td><?php echo $row['Idea']; ?></td>
            <td><?php echo $row['Upvotes']; ?></td>
            <td><?php echo $row['Downvotes']; ?></td>
            <td><?php echo $row['anonymous']; ?></td>
            
            <td><?php echo $row['CommentID']; ?></td>
            <td><?php echo $row['Content']; ?></td>
            <td><?php echo $row['CommentSubmissionDate']; ?></td>
            <td><?php echo $row['DateID']; ?></td>
            <td><?php echo $row['closureDate']; ?></td>
            <td><?php echo $row['FinalClosureDate']; ?></td>
    </tr>
        <?php
        $sn++;
    }
}

else{
    ?>
<tr>
    <td colspan="7">No records found.</td>
</tr>
    <?php
}

    ?>
</tbody>

</table>

    

</div>
</div>

</div>
    </div>
</div>

</body>