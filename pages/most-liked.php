<?php include_once "../php/partials/side-menu.php" ?>

<div class="body">
    <div class="container">
    <div class="wrapper">
        <section class="post">
        <h1>Ideas with the Most Comments</h1>

    </div>
    </div>
</div>

<div class="ideas">

<?php
$commentQuery = "SELECT * FROM ideas order by upVotes DESC;";
$commentsResult = $connect->query($commentQuery);		
while($row = mysqli_fetch_assoc($commentsResult)){
$name = $row['Staff_StaffID'];
$cat = $row['Categories_CategoryID'];

$nameQuery2 = "SELECT CategoryName FROM categories WHERE CategoryID= '".$cat."' ";
$nameResult2 = $connect->query($nameQuery2);
$cate = mysqli_fetch_assoc($nameResult2);

$nameQuery = "SELECT FirstName,LastName FROM staff where StaffID= '".$name."' ";
$nameResult = $connect->query($nameQuery);
$get = mysqli_fetch_assoc($nameResult);



?>

    <div class="tweet-wrap">  

        <div class="tweet-header">
            <img src="../images/profile.jpg" alt="" class="avator">
            <div class="tweet-header-info"><?php echo $get['FirstName']; ?><span><?php echo $cate['CategoryName']; ?></span>
            <p><?php echo $row['Idea']; ?></p>
            </div>    
        </div>
        
        <div class="tweet-info-counts">

            <button class="comments" onclick="location.href='comments.php?id=<?php echo $row['IdeaID']; ?>'" type="button">
                <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                <div class="comment-count">Comment</div>
            </button>
            
            
            <button class="comments" onclick="location.href='../php/down-vote.php'" type="button">
                <svg class="feather feather-repeat sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                <span><?php echo $row['Downvotes']; ?></span>
            </button>
            

            <button class="comments" onclick="location.href='../php/vote.php'" type="button">
                <svg class="feather feather-heart sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                <span><?php echo $row['Upvotes']; ?></span>
            </button>

        </div>
    </div>

<?php
}
?>



</div>

<link rel="javascript" href="../javascript/script.js"/>

</body>
</html>
