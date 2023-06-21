<?php
   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];
   $ConfirmPassword = $_POST['ConfirmPassword'];

   //database connection

   $conn = new mysqli('localhost','root','2611','test');
   if($conn->connect_error){
      echo "$conn->connect_error";
      die('connection failed  : '.$conn->connect_error);
   }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, Email, Password, ConfirmPassword) values(?,?,?,?,?)";
        $stmt->bind_param("sssssi", $firstName, $lastName, $Email, $Password,$ConfirmPassword);
        $execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
         

?>


