<?php
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname='photosbypratikdb';
    $conn =new mysqli($host, $user, $pass, $dbname);
    
    $email=$_POST["mail"];
    $mobile = $_POST["mobile"];
    $pwd=$_POST["password"];    
    $encpwd=md5($pwd);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql="SELECT * FROM userinfo WHERE Email='$email' AND Mobile='$mobile'";
    $result = $conn->query($sql);

    if($result->num_rows==1)
    {
        $update_query = $conn->query("UPDATE userinfo set Password='$encpwd' where email='$email'");
            
        echo '<script>';
	   	echo 'alert("Password has been Reset Successfully...\nPlease login to access your account!")';
	   	echo '</script>';
	   	echo '<script>';
        echo 'window.open("../index.html", "_current")';
        echo '</script>';       
    }
    else
    {
        echo '<script>';
	   	echo 'alert("Incorrect Credentials!!! Please Try Again")';
        echo '</script>';
        echo '<script>';
        echo 'window.open("../forgotpassword.html", "_current")';
        echo '</script>';   
    }

?>
