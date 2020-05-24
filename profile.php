<?php
session_start();

if(!isset($_SESSION['email'])){
    echo "<script>"; 
    echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
    echo "</script>"; 
    echo "<script>"; 
   echo 'window.open("./index.html", "_current")';
    echo "</script>"; 
}

$connect = mysqli_connect("localhost", "root", "", "photosbypratikdb");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<meta name="keywords" content="Pratik, Photos, Photographs, Images, Photos by Pratik">
		<meta name="author" content="Pratik Nesarkar">
		<title>Photos      by Pratik: User Home</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/sliderstyle.css">
	</head>

	<body>
		<header>
			<div class="container">
				<div id="WebpageName">
					<h1>Photos by<span class="highlight"> Pratik</span></h1>
				</div>
				<nav>
					<ul>
						<li><a href="home.php">Home</a></li>
                        <li class="current"><a href="Profile.php" name="profile">Profile</a></li>
                        <li><a href="./scripts/logout.php" onclick="return confirm('Are you sure to logout?');" name="logout">Logout</a></li>
					</ul>
				</nav>
			</div>
		</header>

        <div class="container">
        <form method='POST' onSubmit="return confirm('Are you sure to update the date?');" action='./scripts/updateprofile.php'>
			<table border="2px" style="margin-top: 60px; margin-bottom: 30px; margin-left: 40px; border-radius: 10px; border-style: double ; width:900px; line-height:30px; border-color: red;">
				<tr>
					<th colspan="6" style="color: red;"><h2>Edit Profile Info</h2></th>
				</tr>
				<t>
					<th style="color: white;">Name</th>
					<th style="color: white;">Gender</th>
					<th style="color: white;">email</th>
					<th style="color: white;">Mobile</th>
					<th style="color: white;">DOB</th>
					<th style="color: white;">New Password</th>
                </t>
				 <?php
				 	$result=mysqli_query($connect, "select * from userinfo where email='".$_SESSION['email']."';");
				 	while($rows = mysqli_fetch_assoc($result)){
				?>
					<tr>
                        <td><?php echo "<input name='username' required pattern='[a-zA-Z\s]+' title='Enter valid name! example: Pratik Nesarkar' style='font-size:small; font-weight:bold; 
                        height:40px; border-color:red; width:200px; background-color:black; color:white; text-align:center;'
                         type='text' value=".$rows['Name']."></input>" ?></td>
                        
                        <td><?php echo "<input name='gender' required style='font-size:small; font-weight:bold; 
                        height:40px; border-color:red; width:80px; background-color:black; color:white; text-align:center;'
                         type='text' value=".$rows['Gender']."></input>" ?></td>
                        
                        <td style='font-size:small; font-weight:bold;'><?php echo $rows['Email'] ?></td>
                        
                        <td><?php echo "<input name='mobile' pattern='(7|8|9)\d{9}' title='Enter valid Mobile number' required style='font-size:small; font-weight:bold; 
                        height:40px; border-color:red; width:100px; background-color:black; color:white; text-align:center;'
                         type='text' value=".$rows['Mobile']."></input>" ?></td>
                        
                        <td><?php echo "<input name='dob' pattern='d{4}+-\d{1,2}+-\d{1,2}' title='Enter date in correct format (dd/mm/yyyy)' style='font-size:small; font-weight:bold; 
                        height:40px; border-color:red; width:100px; background-color:black; color:white; text-align:center;'
                         type='text' value=".$rows['Dob']."></input>" ?></td>
                        
						<td><?php echo "<input id='password' type='password' name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' 
						title='Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters' style='font-size:small; font-weight:bold; 
                        height:40px; border-color:red; width:200px; background-color:black; color:white; text-align:center;'
                         type='text'></input>" ?></td>
                    </tr>
        
				<?php
					}
                ?>
            </table>
            <tr>
                <button name="updateprofile" class="button_1" type="submit" onClick="return validate()">Update Info</button> &nbsp&nbsp
				<a href="./scripts/deleteprofile.php" style="text-decoration:none; padding:11px;" class="button_1" onclick="return confirm('Are you sure to delete?\nAll of your data will be gone!');" name="logout">Delete Profile</a>
            </tr>
        </form>
		</div>
		<br><br><br>
		<hr style="border-color:red;">

		<section id="Social">
		<div stylr= "border:2px solid red">
			<div class="container" style="text-align:center; margin-left:180px;">
				<div class="box">
					<img src="./img/logo1.png" style="width:60px; height:60px;"></img>
					<hr style="border-color:red ;">
					<a href="https://www.facebook.com/pratik.nesarkar.4.u" style="font-size: smaller; text-decoration: none; word-wrap: break-word;" target="_blank">pratik.nesarkar.4.u
					</a>
				</div>

				<div class="box"  align="center">
					<img src="./img/logo2.png" style="width:60px; height:60px;">
					<hr>			
					<a href="https://www.instagram.com/pratik_nesarkar_4_u/?hl=en" style="font-size: smaller;text-decoration: none; word-wrap: break-word;" target="_blank">pratik_nesarkar_4_u
					</a>
				</div>

				<div class="box"  align="center">
					<img src="./img/logo3.png" style="width:60px; height:60px;">
					<hr style="border-color:red ;">
					<a href="https://twitter.com/PratikNesarkar" style="font-size: smaller; text-decoration: none; word-wrap: break-word;" target="_blank">pratik.nesarkar99@twitter.com
					</a>
				</div>
			</div>
		</div>
		</section>

		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>

<script>
function validate()
{
 var pass = document.getElementById("password").value;
    if (pass === "")
   {
        alert("Please enter your old password/a new password to update the info!!!");
        return false;
   } else{
       return true;
   }
}
</script>
