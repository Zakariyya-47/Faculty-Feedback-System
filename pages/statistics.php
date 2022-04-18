<?php
include_once "../php/partials/side-menu.php";
$user=$_SESSION["user"];
if(isset($_SESSION["user"])){

?>

<div class="body">
    <div class="container">
        <div class="wrapper">
        <?php
        $commentQuery = "SELECT staff.DepartmentID, department.DepName, COUNT(ideas.IdeaID)
        from `ideas`, `staff`, `department`
        WHERE ideas.Staff_StaffID=staff.StaffID and staff.DepartmentID=department.DepartmentID
        GROUP BY staff.DepartmentID";
        $commentsResult = $connect->query($commentQuery);
        $chart_data="";
        while($row = mysqli_fetch_assoc($commentsResult)){
            $DepName[]  = $row['DepName']  ;
            $ideas[] = $row['COUNT(ideas.IdeaID)'];
        }
        ?>
<div class="charts">        

<div id="comment" class="form-1 aed">
    <div class="container">
        <div style="background-color:white;"> </div>   
        <div class="row" >      
        <div class="col-lg-5" style="margin-left:auto;margin-right:auto;">     
        <canvas  width="auto" height="220" id="chartjs3_bar"></canvas> 
        <br>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            
        <script type="text/javascript">
        var ctx = document.getElementById("chartjs3_bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($DepName); ?>,
                datasets: [{
                    backgroundColor: [
                        "#FEC8D8",
                        "#FFDFD3",
                        "#ACD0C0",
                        "#C0E4F1",
                        "#F7F4E6"
                    ],
                    data:<?php echo json_encode($ideas); ?>,
                }]
            },
            options: {
                legend: {display: false},
                title: {display:true,fontColor:"#B22222",fontSize:17,padding:30,
                        text: 'Contributions by each Department'},
                scales: { yAxes: [{ ticks: {beginAtZero:true}  }] }
            }
        });
        </script>
        </div>
            </div>
        </div>
</div>


<?php
        $commentQuery = "SELECT department.DepName ,COUNT(DISTINCT ideas.Staff_StaffID)
        from `ideas`,`staff`, `department`
        WHERE ideas.Staff_StaffID=staff.StaffID AND staff.DepartmentID=department.DepartmentID
        GROUP BY department.DepName, department.DepName";
        $commentsResult = $connect->query($commentQuery);
        $chart_data="";
        while($row = mysqli_fetch_assoc($commentsResult)){
            $Department[]  = $row['DepName']  ;
            $ideaper[] = $row['COUNT(DISTINCT ideas.Staff_StaffID)'];
        }
        ?>

<div id="comment" class="form-1 aed">
    <div class="container">
        <div style="background-color:white;"> </div>   
        <div class="row" >      
        <div class="col-lg-5" style="margin-left:auto;margin-right:auto;">     
        <canvas  width="auto" height="220" id="chartjs2_bar"></canvas> 
        <br>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            
        <script type="text/javascript">
        var ctx = document.getElementById("chartjs2_bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($Department); ?>,
                datasets: [{
                    backgroundColor: [
                        "#FEC8D8",
                        "#FFDFD3",
                        "#ACD0C0",
                        "#C0E4F1",
                        "#F7F4E6"
                    ],
                    data:<?php echo json_encode($ideaper); ?>,
                }]
            },
            options: {
                legend: {display: false},
                title: {display:true,fontColor:"#B22222",fontSize:17,padding:30,
                        text: 'Contributors in Department'},
                scales: { yAxes: [{ ticks: {beginAtZero:true}  }] }
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
        $ci= count($id);
        ?>

<?php
        $commentQuery = "SELECT department.DepName ,COUNT(DISTINCT ideas.Staff_StaffID)
        from `ideas`,`staff`, `department`
        WHERE ideas.Staff_StaffID=staff.StaffID AND staff.DepartmentID=department.DepartmentID
        GROUP BY department.DepName, department.DepName";
        $commentsResult = $connect->query($commentQuery);
        $chart_data="";
        while($row = mysqli_fetch_assoc($commentsResult)){
            $ideaper = $row['COUNT(DISTINCT ideas.Staff_StaffID)'];
            $per = ($ideaper / $ci) * 100;
            echo "<br>";
            $percentage[]  = round($per);
        }

        ?>


<div id="comment" class="form-1 aed">
        <div class="container">
              <div style="background-color:white;"><div>   
              <div class="row">      
              <div class="col-lg-10" style="margin-left:auto;margin-right:auto;">
            <canvas  width="auto" height="150" id="chartjs1_bar"></canvas>
                         
            <script src="//code.jquery.com/jquery-1.9.1.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <script type="text/javascript">
            var ctx = document.getElementById("chartjs1_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($Department); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#FFDAC1",
                                "#FF9595",
                                "#B5EAD7",
                                "#BFC7EA",
                                "#E2F0CB"
                            ],
                            data:<?php echo json_encode($percentage);?>,
                        }]
                    },
                    options: {
                        legend: {display: true, padding:20},
                        title: {display:true,fontColor:"#B22222",fontSize:17,padding:30,
                                text: 'Percentage of Ideas Per Dept'},
                        
                    }
                });
            </script>
            </div>
            </div>
        </div>
</div>



























    </div>

</div>
    </div>
</div>


</body>
</html>

<?php }else {header("location:login.php");} ?>

