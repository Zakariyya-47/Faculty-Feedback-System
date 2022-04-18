<?php

include_once '../php/partials/db_connect.php';

$query = "SELECT staff.StaffID, staff.FirstName, staff.LastName, staff.Email, 
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



if($result->num_rows>0){

    $sn=1;
    $delimiter = ",";
    $filename = "facultyfeedbackdata.csv";

    $f = fopen('php://memory', 'w');

    $fields = array('StaffID', 'First Name', 'Last Name', 'Email', 'DepartmentID', 'Department Name', 'Department Coordinator', 'IdeaID', 'Categories_CategoryID', 'Staff_StaffID', 'Idea', 'Upvotes', 'Downvotes', 'CommentID', 'Content', 'CommentSubmissionDate', 'DateID', 'closureDate', 'FinalClosureDate');

    fputcsv($f, $fields, $delimiter);

    while($row = $result->fetch_assoc()){
        $lineData = array($row['StaffID'], $row['FirstName'], $row['LastName'], $row['Email'], $row['DepartmentID'], $row['DepName'], $row['Cordinator'], $row['IdeaID'], $row['Categories_CategoryID'], $row['Staff_StaffID'],
        $row['Idea'], $row['Upvotes'], $row['Downvotes'], $row['anonymous'], $row['CommentID'], $row['Content'], $row['CommentSubmissionDate'], $row['DateID'], $row['closureDate'], $row['FinalClosureDate']);
        fputcsv($f, $lineData, $delimiter);
        $sn++;
    }

    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' .$filename.'";');

    fpassthru($f);
}

exit;