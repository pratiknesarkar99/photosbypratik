<?php
session_start();

if(!isset($_SESSION['email'])){
    echo "<script>"; 
    echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
    echo "</script>"; 
    echo "<script>"; 
   echo 'window.open("../adminlogin.html", "_current")';
	echo "</script>"; 
}

//$connect = mysqli_connect("localhost", "id13377291_root", "Damaged#4199", "id13377291_photosbypratikdb");
$connect = mysqli_connect("localhost", "root", "", "photosbypratikdb");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<meta name="keywords" content="Pratik, Photos, Photographs, Images, Photos by Pratik">
		<meta name="author" content="Pratik Nesarkar">
		<title>Photos      by Pratik: Admin Home</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/sliderstyle.css">

		<style>
			.container table{
			    border: 1px red solid;
			    border-radius:8px;
				width:100%;
			    height:100%;
				margin-bottom:50px;  
				margin-top:50px; 
				line-height:30px; 
				overflow-x:auto;
			}

			.container table td, table th {
    			border-radius:8px;
    			border: 1px solid red;
			}

			@media 
			only screen and (max-width: 760px),
			(min-device-width: 768px) and (max-device-width: 1024px)  {

				/* Force table to not be like tables anymore */
				table, thead, tbody, th, td, tr { 
					display: block; 
				}
				
				/* Hide table headers (but not display: none;, for accessibility) */
				thead tr { 
					position: absolute;
					top: -9999px;
					left: -9999px;
				}
				
				tr { border: 5px solid black; }
				
				td { 
					/* Behave  like a "row" */
					border: none;
					border-bottom: 1px solid red ; 
					position: relative;
					padding-left: 50%; 
					font-size: x-small;
					overflow: auto;	
				}
				
				td:before { 
					/* Now like a table header */
					position: absolute;
					/* Top/left values mimic padding */
					top: 6px;
					left: 6px;
					width: 45%; 
					padding-right: 10px; 
					white-space: nowrap;
				}
				
				/*
				Label the data
				*/
				td:nth-of-type(1):before { content: "Name"; }
				td:nth-of-type(2):before { content: "Gender"; }
				td:nth-of-type(3):before { content: "email"; }
				td:nth-of-type(4):before { content: "Mobile"; }
				td:nth-of-type(5):before { content: "DOB?"; }
				td:nth-of-type(6):before { content: "Visited"; }
			}
		</style>
	</head>

	<body>
		<header>
			<div class="container">
				<div id="WebpageName">
					<h1>Photos by<span class="highlight"> Pratik</span></h1>
				</div>
				<nav>
					<ul>
						<li class="current"><a href="adminhome.php">ADMIN Home</a></li>
						<li><a href="#">Gallery</a>
							<ul style="border-radius: 10px;">
								<li><a href="./portraits.php">PORTRAITS</a></li>
								<li><a href="./nature.php">NATURE</a></li>
								<li><a href="./abstract.php">ABSTRACT</a></li>
								<li><a href="./videos.php">VIDEOS</a></li>
							</ul>
						</li>
                        <li><a href="../scripts/logout.php" onclick="return confirm('Are you sure to logout?');" name="logout">Logout</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="container">
			<table>
			
				<tr>
					<th colspan="6" style="color: red;"><h2>Website Users Record</h2></th>
				</tr>
				<thead>	<tr>
					<th style="color: white;">Name</th>
					<th style="color: white;">Gender</th>
					<th style="color: white;">email</th>
					<th style="color: white;">Mobile</th>
					<th style="color: white;">DOB</th>
					<th style="color: white;">Visited Times</th>
				</tr>
				</thead>
				 <?php
				 	$query =  "SELECT * from userinfo;";
				 	$result=mysqli_query($connect, $query);
				 	while($rows = mysqli_fetch_assoc($result)){
				?>
					<tr>
						<td><?php echo $rows['Name'] ?></td>
						<td><?php echo $rows['Gender'] ?></td>
						<td><?php echo $rows['Email'] ?></td>
						<td><?php echo $rows['Mobile'] ?></td>
						<td><?php echo $rows['Dob'] ?></td>
						<td><?php echo $rows['visitedcount'] ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>

		<hr style="border-color:red">

		<div class="container">
			<table>
				<tr>
					<th colspan="6" style="color: red;"><h2>Website Newsletter Subscriptions</h2></th>
				</tr>
				 <?php
				 	$result = mysqli_query($connect, "select * from subscriptions;");
				 	while($rows=mysqli_fetch_assoc($result)){
				?>
					<tr>
						<td><?php echo $rows['email'] ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>

		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>