<?php
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname='photosbypratikdb';
    $conn =new mysqli($host, $user, $pass, $dbname);

    session_start();

    $email = $_SESSION['email'];
    
        if(isset($_SESSION['email'])){

            $delete_query = $conn->query("DELETE from userinfo where email='$email';");
 
            if($delete_query){
                session_destroy();

                echo "<script>"; 
                echo 'alert("User with has been deleted successfully...")';
                echo "</script>"; 
                echo "<script>"; 
                echo 'window.open("../index.html", "_current")';
                echo "</script>";    
            } else{
                echo "<script>"; 
                echo 'alert("Delete User failed!!!")';
                echo "</script>"; 
                echo "<script>"; 
                echo 'window.open("../Profile.php", "_current")';
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