<?php include_once "../php/partials/side-menu.php";
$user=$_SESSION["user"];
$nameQuery = "SELECT FirstName,LastName FROM staff where StaffID= '".$user."' ";
$nameResult = $connect->query($nameQuery);
$get = mysqli_fetch_assoc($nameResult);

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM ideas";
        $result = mysqli_query($connect,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
?>

<div class="body">
    <div class="container">
    <div class="wrapper">


      <?php
          $dateQuery = "SELECT closureDate FROM dates";
          $dateResult = $connect->query($dateQuery);
          $datescheck = mysqli_fetch_assoc($dateResult);
          $closureDate = $datescheck['closureDate'];
          $date = date('Y-m-d');
          ?>

        <section class="post">
        <?php if($date < $closureDate){ ?>
        <form action="../php/addidea.php" method=POST>
            <div class="content">
            <img src="../images/profile.jpg" alt="logo">
            <div class="details">
                <p><?php echo $get['FirstName'];?> <?php echo $get['LastName'];?></p>
                <div class="privacy">
                <span>Faculty </span>
                </div>
            </div>
            </div>
            
            <textarea name="idea" placeholder="What's on your mind,?" required></textarea>
            
            <input type="text" name="category" required="" placeholder="category">

            <div class="options">
                            <div class="form-group"><p>Upload Documents</p>
                               <input class="form-control-input" type="file" name="upload_doc" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
                               <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group"><p>Upload Picure</p>
                                <input class="form-control-input" type="file" id="image" name="upload_image" accept="image/png, image/jpeg" required>
                                <div class="help-block with-errors"></div>
                            </div>
                
                </div>
            <div class="option"> <style>.option{display:flex};</style>
              <input type="checkbox" id="weekday-1" name="weekday-1" value="Friday" checked>
              <label for="weekday-1">Agree Terms and Conditions</label>
              <input type="checkbox" id="weekday-2" name="weekday-2" value="Saturday">
              <label for="weekday-2">Post it as Anonomous</label>
            </div>

            <button name="idea-submit" type="submit">Post</button>
        </form>
        <?php } else{ ?>
          <h1>Closure Date for Ideas</h1>
            <script>
              .post{display:hidden;}
            </script>
          <?php } ?>
    </div>
    </div>
</div>


<div class="ideas">

<?php
$commentQuery = "SELECT * FROM ideas ORDER BY IdeaID DESC LIMIT $offset, $no_of_records_per_page";
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
            <div class="tweet-header-info"><?php echo $get['FirstName'];?> <?php echo $get['LastName'];?><span><?php echo $cate['CategoryName']; ?></span>
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


<style>
.body2 {
  display: grid;
  height: 100%;
  place-items: center;
  text-align: center;

}
.container2 {
  padding: 25px;
  border-radius: 3px;
 
}
.pagination {
  display: flex;
  list-style: none;
}
.pagination li {
  flex: 1;
  margin: 0px 5px;
  border-radius: 3px;
  box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);
}
.pagination li a {
  font-size: 18px;
  text-decoration: none;
  color: #4d3252;
  height: 45px;
  width: 55px;
  display: block;
  line-height: 45px;
}
.pagination li:first-child a {
  width: 120px;
}
.pagination li:last-child a {
  width: 100px;
}
.pagination li.active {
  box-shadow: inset -3px -3px 7px #ffffff73,
    inset 3px 3px 5px rgba(94, 104, 121, 0.288);
}
.pagination li.active a {
  font-size: 17px;
  color: #6f6cde;
}
.pagination li:first-child {
  margin: 0 15px 0 0;
}
.pagination li:last-child {
  margin: 0 0 0 15px;
}

</style>
<div class="body2">
<div class="container2">
  <ul class="pagination">
    <li class="<?php if($pageno <= 1){ echo 'disabled';}?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a></li>
        
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
  
        <li><a href="?pageno=<?php echo $total_pages; ?>">...<?php echo $total_pages; ?></a></li>
  
        <li><a href="#">Page<?php echo $pageno; ?></li>

    </ul>
</div>
</div>


</div>

<link rel="javascript" href="../javascript/script.js"/>

</body>
</html>
