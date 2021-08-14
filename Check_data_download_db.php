<?php
 
  $db = mysqli_connect("localhost", "crm_shamil_40", "R7K9Rf943Tds3", "crm_shamil_40");


  $msg = "";


  $result = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs`");
  $closed_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Closed'");
  $in_progress = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Open'");
  $cancelled_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Cancelled'");

?>
<!DOCTYPE html>
<html>
<head> <H1> Checking database reading functionality of PHP</H1>
<title>Image Upload</title>

</head>
<body>
<div id="content">
  <?php
    while ($row1 = mysqli_fetch_array($closed_jobs)) {
        echo "Closed Jobs";
        echo "<p>".$row1['COUNT(*)']."</p>";
        echo "</div>";
    }
  ?>

</div>

<div id="content2">
<?php
      while ($row = mysqli_fetch_array($result)) {
        echo "All jobs in the database";
        echo "<p>".$row['COUNT(*)']."</p>";
        echo "</div>";
  }
?>
</div>

<div id="content3">
<?php
   
   while ($row2 = mysqli_fetch_array($in_progress)) {
    echo "In progress";
    echo "<p>".$row2['COUNT(*)']."</p>";
    echo "</div>";
}
?>
</div>


<div id="content4">
<?php
   
   while ($row3 = mysqli_fetch_array($cancelled_jobs)) {
    echo "Cancelled";
    echo "<p>".$row3['COUNT(*)']."</p>";
    echo "</div>";
} 
?>
</div>

</body>
</html>