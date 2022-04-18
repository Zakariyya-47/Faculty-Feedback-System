<?php
include_once "../php/partials/side-menu.php";
$user=$_SESSION["user"];

if(isset($_SESSION["user"])){

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
        <form action="../php/addidea.php" method=POST enctype="multipart/form-data">
            <div class="content">
            <img src="../images/profile.jpg" alt="logo">
            <div class="details">
                <p><?php echo $get['FirstName'];?> <?php echo $get['LastName'];?></p>
                <div class="privacy">
                <span>Faculty</span>
                </div>
            </div>
            </div>
            
            <textarea name="idea" placeholder="What's on your mind,?" required></textarea>
            
              <div class="container22">
                <div class="card">
                  <h3>Upload Files</h3>
                  <div class="drop_box">
                    <header>
                      <h4>Select Files</h4>
                      <p>Files Supported: PDF, DOC</p>
                    </header>
                    <input type="file" name="featured_image" class="btn ">
                  </div>
                </div>

                <div class="opt">
                  <h3>Options</h3>
                  <div class="option"> <style>.option{display:flex};</style>
                    <input type="checkbox" id="weekday-1" name="terms" value="1" required> 
                    <label for="weekday-1">Agree Terms and Conditions</label>

                    <input type="checkbox" id="weekday-2" name="anon" value="1">
                    <label for="weekday-2">Post it as Anonomous</label>

                    <span class="choose">Choose Category</span>
                    <select name="category" required>
                      <?php 
                          $catgQuery = "SELECT * FROM categories";
                          $catgResult = $connect->query($catgQuery);		
                          while($catg = mysqli_fetch_assoc($catgResult)){
                      ?>
                        <option value="
                            <?php echo $catg["CategoryID"];?>">
                            <?php echo $catg["CategoryName"];?>
                        </option>
                      <?php }; ?>
                    </select>
                  </div>
                </div>
              </div>

        <button name="idea-submit" type="submit" value="Upload">Post</button>
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
$commentQuery = "SELECT * FROM ideas ORDER BY Upvotes DESC LIMIT $offset, $no_of_records_per_page";
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
            <div class="tweet-header-info"> <?php if($row['anonymous'] == 1){?>Anonomous<?php } else {echo $get['FirstName'];?> <?php echo $get['LastName'];}?>
            <span><?php echo $cate['CategoryName']; ?></span>
            <p><?php echo $row['Idea']; ?></p>
            </div>    
        </div>
        
        <div class="tweet-info-counts">

            <button class="comments" onclick="location.href='comments.php?id=<?php echo $row['IdeaID']; ?>'" type="button">
                <svg class="feather feather-message-circle sc-dnqmqq jxshSx" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                <div class="comment-count">Comment</div>
            </button>

            <button class="comments" type="button">
              <a class="options" data-vote-type="1" id="post_vote_up_<?php echo $post['IdeaID']; ?>"><i class="far fa-thumbs-down" data-original-title="Dislike this post"></i>
                <span>-<?php echo $row['Downvotes']; ?></span>
            </button>

            <button class="comments">
                <a class="options" data-vote-type="1" id="post_vote_up_<?php echo $post['IdeaID']; ?>"><i class="far fa-thumbs-up" data-original-title="Like this post"></i>
                <span><?php echo $row['Upvotes'];?></span>
            </button>

            <?php if(!empty($row['file_name'])) { ?>
            <button class="comments" onclick="location.href='../php/file-download.php?file_id=<?php echo $row['IdeaID'];?>'" type="button">
                <a class="options"><i class="fa fa-download"></i>    
                <span>Download <?php echo $row['file_name']; ?></span>
            </button>
        <?php }; ?>

        </div>
       
    </div>

<?php
}
?>

  
<style>
.vn-blue a:hover{
  background:#2c3e50
}

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
  PADDING: 0 10PX;
  HEIGHT: AUTO;  width: 55px;
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
<script src="../javascript/vote.js"></script>

</body>
</html>

<?php }else {header("location:login.php");}
