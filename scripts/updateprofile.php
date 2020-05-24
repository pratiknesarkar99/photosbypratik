<?php
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname='photosbypratikdb';
    $conn =new mysqli($host, $user, $pass, $dbname);

    session_start();

    $name = $_POST['username'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_SESSION['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $encpwd = md5($password);
    
        if(isset($_SESSION['email'])){

            $update_query = $conn->query("UPDATE userinfo set Name='$name', Gender='$gender', 
            Mobile='$mobile', Dob='$dob', Password='$encpwd' where email='$email';");
 
            if($update_query){
                echo "<script>"; 
                echo 'alert("User Profile has been updated successfully...")';
                echo "</script>"; 
                echo "<script>"; 
                echo 'window.open("../profile.php", "_current")';
                echo "</script>";    
            } else{
                echo "<script>"; 
                echo 'alert("Profile Update failed!!!")';
                echo "</script>"; 
                echo "<script>"; 
                echo 'window.open("../profile.php", "_current")';
                echo "</script>";    
            }
        } else{
            echo "<script>"; 
            echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
            echo "</script>"; 
            echo "<script>"; 
           echo 'window.open("../index.html", "_current")';
            echo "</script>"; 
        }
?>