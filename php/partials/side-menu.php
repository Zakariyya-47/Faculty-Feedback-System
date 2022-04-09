<?php 
session_start();
include_once "../php/partials/db_connect.php";
if(!isset($_SESSION["user"])){header("location:login.php");}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dash.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title> 

</head>
  <body>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../images/logo.png" alt="">
            </div>

            <span class="logo_name">CodingLab</span>
        </div>

        <?php 
            $user = $_SESSION["user"];
                $sqlQuery = "
                SELECT Role 
                FROM roles 
                WHERE Staff_StaffID='".$user."'";
            $resultSet = $connect->query($sqlQuery);		
            
            if($resultSet->num_rows){
                $userDetails = $resultSet->fetch_assoc();
                $userRole = $userDetails['Role'];
            }
        ?>

        <div class="menu-items">
            <ul class="nav-links">
            
                <span class="logout-mode roles">Faculty</span>
                <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Feed</span>
                </a></li>
                <li><a href="most-liked.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Most Liked</span>
                </a></li>
              

            <?php if($userRole == 'Assurance Manager'){?>
              
                <span class="logout-mode roles">Assurance Manager</span>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Catagories</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Downlaod</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Reports</span>
                </a></li>         
                
            <?php } elseif($userRole == 'Admin'){?>

                <span class="logout-mode roles">Administrator</span>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Closure Dates</span>
                </a></li>
                <li><a href="AddStaff.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Add Staff</span>
                </a></li>
                <li><a href="AddDept.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Add Dept</span>
                </a></li>
            </ul>

            <?php } ?>   

            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>

                    <a href="../php/partials/logout.php">
                    <span class="link-name">Logout </span>
                    </a>
                    	                    
                </a></li>            
            </ul>
        </div>
    </nav>
