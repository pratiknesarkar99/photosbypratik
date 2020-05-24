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

    $mail=$_POST["submail"];

	$sql="INSERT INTO subscriptions (email) VALUES ('$mail')";
	
    if ($conn->query($sql)) 
    {
	   	echo '<script>';
	   	echo 'alert("Thankyou! Your subscription has been noted.")';
        echo '</script>';
        echo '<script>';
	    echo 'window.open("../home.php", "_current")';
	   	echo '</script>';
	}
    else
    {
        echo '<script>';
        echo 'alert("You have already submitted your email!")';
        echo '</script>';
        echo '<script>';
	    echo 'window.open("../home.php", "_current")';
	   	echo '</script>';
 }
	$conn->close();
?>