<?php
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname='photosbypratikdb';
    $conn =new mysqli($host, $user, $pass, $dbname);
    
    $email=$_POST["mail"];
    $pwd=$_POST["password"];    
    $encpwd=md5($pwd);

    session_start();

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(!$_SESSION['email']){

        $sql="SELECT * FROM userinfo WHERE Email='$email' AND Password='$encpwd'";
        $result = $conn->query($sql);

        if($result->num_rows==1)
        {
                $row= $result->fetch_assoc();
                $visitedcount = $row['visitedcount']+1;

                $update_query = $conn->query("UPDATE userinfo set visitedcount=$visitedcount where email='$email'");
                
                $_SESSION['email'] = $email;
                
                echo '<script>';
                echo 'alert("Log in Successful...\nSession has started for email: '.$_SESSION['email'].'")';
                echo '</script>';
                echo '<script>';
                echo 'window.open("../home.php", "_current")';
                echo '</script>'; 
        }
        else
        {
            echo '<script>';
            echo 'alert("Incorrect mail or Password !!!")';
            echo '</script>';
            echo '<script>';
            echo 'window.open("../index.html", "_current")';
            echo '</script>';
        }
    } else{
        echo '<script>';
        echo 'alert("There is currently anohter user logged in!!!\nYou can only login one user at a time...\nPlease logout previous user to continue...")';
        echo '</script>';

        echo '<script>';
        echo 'window.open("../index.html", "_current")';
        echo '</script>';
    }

?>




