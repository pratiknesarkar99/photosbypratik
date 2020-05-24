<?php
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname='photosbypratikdb';
    $conn = mysqli_connect($host, $user, $pass,$dbname);
    
    if($conn==FALSE)
    {
        die("Errror@!!!");
    }
	$name=$_POST ["username"];
    $gender= $_POST["gender"];
    $mail=$_POST["usermail"];
    $mobile=$_POST["usermobile"];
    $dob=$_POST["dob"];
    $password=$_POST["pwd"];
    $encpasswd=md5($password);
    $visitedcount=0;

	$sql="INSERT INTO userinfo (Name,Gender,Email,Mobile,Dob,Password,visitedcount)
    VALUES('$name','$gender','$mail','$mobile','$dob','$encpasswd', $visitedcount)";
	
    if ($conn->query($sql)) 
    {
	   	echo '<script>';
	   	echo 'alert("Details Submitted Sucessfully!")';
	   	echo '</script>';
	   	echo '<script>';
	    echo 'window.open("../index.html", "_current")';
	   	echo '</script>';
	}
    else
    {
        echo '<script>';
        echo 'alert("Error submitting! User with email address already exixts!!!")';
        echo '</script>';
        echo '<script>';
	    echo 'window.open("../register.html", "_current")';
	   	echo '</script>';
 }

	$conn->close();
?>


