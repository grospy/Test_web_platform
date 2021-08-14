<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Jobs Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add a New Job</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `88888-jobs` ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date_created'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    $all_jobs = mysql_query("SELECT COUNT(*) FROM `88888-jobs`");
                    $result_all_jobs = mysqli_query($link, $all_jobs);
                    echo $result_all_jobs;

                    $closed_jobs=mysql_query("SELECT COUNT(*)  FROM `88888-jobs` WHERE status='Closed'");
                    $result_closed_jobs = mysqli_query($link, $all_jobs);
                    echo $result_closed_jobs;

                    $In_progress= mysql_query("SELECT COUNT(*) FROM `88888-jobs` WHERE status='Open'");
                    $result_In_progress = mysqli_query($link, $In_progress);
                    echo $result_In_progress;

                    $cancelled_jobs = mysql_query("SELECT COUNT(*) FROM `88888-jobs` WHERE status='Cancelled'");
                    $result_cancelled_jobs = mysqli_query($link, $cancelled_jobs);
                    echo $result_cancelled_jobs;




                    

                    // Close connection
                    mysqli_close($link);
                    ?>

                </div>
            </div>        
        </div>
    </div>
                    <H1>Result for all jobs</H1>
                    <p><?php echo $result_all_jobs; ?></p>
                    <H1>Result for closed jobs</H1>
                    <p><?php echo $result_closed_jobs; ?></p>
                    <H1>Result for jobs in progress</H1>
                    <p><?php echo $result_In_progress; ?></p>
                    <H1>Result for Cancelled jobs</H1>
                    <p><?php echo $result_cancelled_jobs; ?></p>
</body>
</html>