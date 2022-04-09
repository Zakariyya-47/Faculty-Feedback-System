<?php include_once "../php/partials/side-menu.php";

?>

<div class="body">
    <div class="container">
    <div class="wrapper">
        <section class="post">
        <form action="" method=>
            <div class="content">
            <img src="../images/profile.jpg" alt="logo">
            <div class="details">

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$commQuery = "SELECT * FROM ideas where IdeaID = $id";
$comment = $connect->query($commQuery);		
while($row = mysqli_fetch_assoc($comment)){
$cat = $row['Categories_CategoryID'];

$nameQuery2 = "SELECT CategoryName FROM categories WHERE CategoryID= '".$cat."' ";
$nameResult2 = $connect->query($nameQuery2);
$cate = mysqli_fetch_assoc($nameResult2);
?>

                <p><?php echo $row['Staff_StaffID']; ?></p>
                <div class="privacy">
                <span><?php echo $cate['CategoryName']; ?></span>
                </div>
            </div>
            </div>
            
            <label name="idea">
            <?php echo $row['Idea']; ?>
            </label>


        </form>

    </div>
    </div>
</div>

<?php
}
?>


<div class="ideas">

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$commentQuery = "SELECT * FROM comments where Ideas_IdeaID = $id";
$commentsResult = $connect->query($commentQuery);		
while($row = mysqli_fetch_assoc($commentsResult)){
$name = $row['Ideas_Staff_StaffID'];

$nameQuery = "SELECT FirstName,LastName FROM staff where StaffID= '".$name."' ";
$nameResult = $connect->query($nameQuery);
$get = mysqli_fetch_assoc($nameResult);


?>

    <div class="tweet-wrap">  

        <div class="tweet-header">
            <img src="../images/profile.jpg" alt="" class="avator">
            <div class="tweet-header-info"><?php echo $get['FirstName']; ?><span><?php //echo $cate['CategoryName']; ?></span>
            <p><?php echo $row['Content']; ?></p>
            </div>    
        </div>
        

    </div>

<?php
}
?>
</div>

<?php
          $dateQuery = "SELECT FinalClosureDate FROM dates";
          $dateResult = $connect->query($dateQuery);
          $datescheck = mysqli_fetch_assoc($dateResult);
          $closureDate = $datescheck['FinalClosureDate'];
          $date = date('Y-m-d');
          ?>

<div class="body">
    <div class="container">
    <div class="wrapper">
        <section class="post">
        <?php if($date < $closureDate){ ?>
        <form action="../php/addcomment.php?id=<?php echo $id?>" method=POST>
                <div class="privacy">
                <span>Add Comment </span>
                </div>  
            <textarea name="comment" placeholder="What's on your mind,?" required></textarea>
            <button name="comment-submit" type="submit">Post Comment</button>
        </form>
        <?php } else{ ?>
                <h1>Closure Date for Comments</h1>
                    <script>
                    .post{display:hidden;}
                    </script>
                <?php } ?>
    </div>
    </div>
</div>

<link rel="javascript" href="../javascript/script.js"/>

</body>
</html>
