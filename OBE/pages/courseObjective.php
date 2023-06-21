<?php
header('courseObjective.php',true,303);
include("headerAndSide.php");

?>


<?php

//echo 'Before the isset';
include '../db.php';

	$db= new Db();
	$conn= $db->connect();

if(isset($_POST['submit'] ))
{


	
	$obj= "sjnjsnsjx";
	//echo 'before the stmt';
	if($stmt= $conn-> prepare("INSERT INTO CourseObjective(objective) VALUES(?)"))
	{
		$stmt-> bind_param("s", $_POST['objective']);
		$res= $stmt->execute();
		//echo "hhdhdhdhhd";



	}

	else
	{
		echo 'error ';
	}
	$get_info = "?status=success"; 
	//header("Location: " .$_SERVER['REQUEST_URI'].$get_info);

}
else
{
	//echo 'submit not clicked';

}



# Retrieveing data form database

$stmt= $conn-> prepare('SELECT * FROM CourseObjective');
#$stmt = $subjects::$conn->prepare('SELECT * FROM subject');
            $stmt->execute();
$subjectResult = $stmt->get_result();
                    
           /* while($row = mysqli_fetch_assoc($subjectResult))
            {
                echo "{$row['objectiveID']}"."("."{$row['objective']}".")";
                echo "<br>";
            }*/

?>

<!-- Email wala form  Jp onlinr uthaya tha -->

<!DOCTYPE html>
<html>
<head>
    <title>Contact form using Bootstrap 3.3.4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body style="background-color: #7e7e7e">
	<div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <div class="col-sm-12 col-sm-offset-3">


    <div class="well" style="margin-top: 10%;">
    <h3>Course Objectives</h3>
    <form role="form" id="contactForm" data-toggle="validator" class="shake" method="post" action="">
       
        <div class="form-group">
           <br>
            <textarea id="message" class="form-control" rows="4" placeholder="Enter your message" name="objective" required ></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button name="submit" type="submit" id="form-submit" class="btn btn-success btn-md pull-right ">Submit</button>
        <div id="msgSubmit" class="h3 text-center hidden"></div>
        <div class="clearfix"></div>
    </form>
    </div>




    <!-- Displaying Data from Database Objectives-->


<div >
  <h2>Objectives</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($subjectResult as $value) {
    	?>

      <tr>
        <td><?php echo "{$value['objectiveID']}";     ?> </td>
        <td><?php echo "{$value['objective']}"; }?></td>
        
      </tr>
      
    </tbody>
  </table>
</div>


</body>
</html>


<?php 


#$db->closedb(); 

?>

