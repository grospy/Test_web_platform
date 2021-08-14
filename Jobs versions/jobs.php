<?php
 
  $db = mysqli_connect("localhost", "crm_shamil_40", "R7K9Rf943Tds3", "crm_shamil_40");


  $msg = "";


  $result = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs`");
  $closed_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Closed'");
  $in_progress = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Open'");
  $cancelled_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Cancelled'");
  $row = mysqli_fetch_array($result);
  $row1 = mysqli_fetch_array($closed_jobs);
  $row2 = mysqli_fetch_array($in_progress);
  $row3 = mysqli_fetch_array($cancelled_jobs);

?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <title>Jobs</title>
    <script>window.App = {}</script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script defer="defer" src="assets/js/iframe.js"></script>
    <link href="assets/css/iframe.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/sb-1.1.0/sp-1.3.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/sb-1.1.0/sp-1.3.0/datatables.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}

#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
    </style>
    <script type="text/javascript">
          function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dtBasicExample");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            $('[data-toggle="tooltip"]').DataTable();
            $('#dtBasicExample').DataTable({
            "searching": true // false to disable search (or any other option)
            });
            $('.dataTables_length').addClass('bs-select');
          

         
        });
    </script>
</head>

<body class="bg-light-blue">
    <div class="frame-content">
    	<input id="page_name" name="page_name" type="hidden" value="jobs">
    	<input id="account_id" name="account_id" type="hidden" value="account_id">
    	<input id="date_all_start" name="date_all_start" type="hidden" value="May 01, 2021">
    	<input id="date_all_end" name="date_all_start" type="hidden" value="May 19, 2021">
        <section class="dashboard">
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">All Jobs</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row1['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">Closed</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row2['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">In progress</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row3['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">Cancelled</p>
                </div>
            </div>
        </section>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Jobs Details</h2>
                       <!-- <a href="create.php" class="btn btn-success pull-right">Add a New Job</a> -->
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `88888-jobs` ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo " <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for jobs..'>";
                            echo "<table id='dtBasicExample' class='table table-striped table-bordered table-sm' cellspacing='0' width='100%'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Created by</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date_created'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['created_by'] . "</td>";
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
                    // Close connection
                    mysqli_close($link);
                    ?>

                </div>
            </div>        
        </div>
    </div>

</body>

</html>