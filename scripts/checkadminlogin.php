<?php
    
    $email=$_POST["mail"];
    $pwd=$_POST["password"];    

    session_start();

    if(!$_SESSION['email']){
        if($email === "pratik.nesarkar99@gmail.com" && $pwd === "Qwerty@123")
        {
            $_SESSION['email'] = $email;

            echo '<script>';
            echo 'alert("Log in Successful !!!")';
            echo '</script>';
            echo '<script>';
            echo 'window.open("../admin/adminhome.php", "_current")';
            echo '</script>';
        }
        else
        {
            echo '<script>';
            echo 'alert("Incorrect mail or Password !!!")';
            echo '</script>';
            echo '<script>';
            echo 'window.open("../adminlogin.html", "_current")';
            echo '</script>';
        }
    } else{
        echo '<script>';
        echo 'alert("There is currently anohter user logged in!!!\nYou can only login one user at a time...\nPlease logout previous user to continue...")';
        echo '</script>';

        echo '<script>';
        echo 'window.open("../adminlogin.html", "_current")';
        echo '</script>';
    }
?>