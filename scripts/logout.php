<?php
    session_start();

        if(isset($_SESSION['email'])){
            session_destroy();
            echo "<script>"; 
            echo 'window.open("../index.html", "_current")';
            echo "</script>"; 
        } else{
            echo "<script>"; 
            echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
            echo "</script>"; 
            echo "<script>"; 
            echo 'window.open("../index.html", "_current")';
            echo "</script>"; 
        }
?>
