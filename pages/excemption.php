<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<?php
include_once "../php/partials/side-menu.php";
$user=$_SESSION["user"];
if(isset($_SESSION["user"])){

?>

<div class="body">
    <div class="container">
        <div class="wrapper">

        <?php
        $commentQuery = "SELECT * FROM ideas WHERE anonymous=1";
        $commentsResult = $connect->query($commentQuery);
        while($row = mysqli_fetch_assoc($commentsResult)){
        $cid[] = $row['IdeaID'];
        }
        $i[] = count($cid);

        $comQuery = "SELECT * FROM ideas";
        $commResult = $connect->query($comQuery);     	
        while($row = mysqli_fetch_assoc($commResult)){
        $id[] = $row['IdeaID'];
        }
        $ci[] = count($id);
        ?>

<div class="charts">        
<!--    comment-->
<div id="comment" class="form-1 aed">
        <div class="container">
                <h2 style="text-align: center;">Exception Report</h2>
              <div style="background-color:white;"> </div>   
              <div class="row">      
              <div class="col-lg-10" style="margin-left:auto;margin-right:auto;">
            <canvas  width="auto" height="150" id="chartjs5_bar"></canvas>
                         
            <script src="//code.jquery.com/jquery-1.9.1.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <script type="text/javascript">
            var ctx = document.getElementById("chartjs5_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:["Anonymous","Public"],
                        datasets: [{
                            backgroundColor: [
                               "#FFDAC1",
                                "#FF9595",
                                "#B5EAD7",
                                "#BFC7EA",
                                "#E2F0CB"
                            ],
                            data:[<?php echo json_encode($i); ?>,<?php echo json_encode($ci); ?>],
                        }]
                    },
                    options: {
                        legend: {display: true, padding:20},
                        title: {display:true,fontColor:"#B22222",fontSize:17,padding:30,
                                text: 'Anonymous Ideas'},
                        
                    }
                });
            </script>
            </div>
            </div>
        </div>
</div>






<?php


    $comQuery = "SELECT * FROM ideas";
    $commResult = $connect->query($comQuery);     	
    while($row = mysqli_fetch_assoc($commResult)){
    $id[] = $row['IdeaID'];
    }
    $ci[] = count($id);
?>

<table class="table">
					<thead>
						<th scope="col">Category</th>
						<th scope="col">Name</th>
						<th scope="col">Idea</th>
            <th scope="col">Block User</th>
					</thead>
					<tbody>
					<?php
					    $commentQuery = "SELECT * FROM ideas WHERE anonymous=1";
              $commentsResult = $connect->query($commentQuery);
						while($row = mysqli_fetch_assoc($commentsResult)){

              $name = $row['Staff_StaffID'];
              $cat = $row['Categories_CategoryID'];

              $nameQuery2 = "SELECT CategoryName FROM categories WHERE CategoryID= '".$cat."' ";
              $nameResult2 = $connect->query($nameQuery2);
              $cate = mysqli_fetch_assoc($nameResult2);

              $nameQuery = "SELECT FirstName ,LastName FROM staff where StaffID= '".$name."' ";
              $nameResult = $connect->query($nameQuery);
              $get = mysqli_fetch_assoc($nameResult);


							echo"
								<tr>
									<td>$cate[CategoryName] </td>
									<td>$get[FirstName] $get[LastName] </td>
									<td>$row[Idea]</td>
              ";
              ?><td> <button class="button">Block User </button> </td>
              <td>
            </tr> <?php
						}
					?>
					</tbody>			
				</table>













        <?php
        $coQuery = "SELECT ideas.IdeaID FROM `ideas` , `comments`
        WHERE ideas.IdeaID = comments.Ideas_IdeaID
        GROUP BY ideas.Idea";
        $comResult = $connect->query($coQuery);
        while($row = mysqli_fetch_assoc($comResult)){$ids[] = $row['IdeaID'];}
        $cis[] = count($ids);

        $cosQuery = "SELECT ideas.IdeaID FROM `ideas` , `comments`
        WHERE ideas.IdeaID != comments.Ideas_IdeaID
        GROUP BY ideas.Idea";
        $comsResult = $connect->query($cosQuery);
        while($rows = mysqli_fetch_assoc($comsResult)){$idsd[] = $rows['IdeaID'];}
            $cisd[] = count($idsd);
        ?>

<!--    comment-->
<div id="comment" class="form-1 aed">
        <div class="container">
              <div style="background-color:white;"></div>   
              <div class="row">      
              <div class="col-lg-10" style="margin-left:auto;margin-right:auto;">
            <canvas  width="auto" height="150" id="chartjs6_bar"></canvas>
                         
            <script src="//code.jquery.com/jquery-1.9.1.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <script type="text/javascript">
            var ctx = document.getElementById("chartjs6_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:["Without Comments","With Comments"],
                        datasets: [{
                            backgroundColor: [
                               "#FFDAC1",
                                "#FF9595",
                                "#B5EAD7",
                                "#BFC7EA",
                                "#E2F0CB"
                            ],
                            data:[<?php echo json_encode($cisd); ?>,<?php echo json_encode($cis); ?>],
                        }]
                    },
                    options: {
                        legend: {display: true, padding:20},
                        title: {display:true,fontColor:"#B22222",fontSize:17,padding:30,
                                text: 'Ideas Without Comments'},
                        
                    }
                });
            </script> 
        </div>
</div>








        </div>
    </div>
</div>


</body>
</html>

<?php }else {header("location:login.php");}
