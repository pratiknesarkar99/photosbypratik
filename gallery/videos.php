<?php
session_start();

if(!isset($_SESSION['email'])){
    echo "<script>"; 
    echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
    echo "</script>"; 
    echo "<script>"; 
   echo 'window.open("../index.html", "_current")';
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
		<title>Gallery: Videos</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/sliderstyle.css">
	</head>
	<body>
		<script>
			function goBack() {
  				window.history.back();
		}
		</script>
		
		<header>
			<div class="container" >
				<div id="WebpageName">
					<p><h1>Photos by<span class="highlight"> Pratik</span></h1></p>
				</div>
				<nav>
					<ul>
						<li><a href="../home.php">Home</a></li>
						<li><a onclick="goBack()">Go Back</a></li>
						<li><a href="portraits.php">Portraits</a></li>
						<li><a href="nature.php">Nature</a></li>
						<li><a href="abstract.php">Abstract</a></li>
						<li class="current"><a href="videos.php">Videos</a></li>
					</ul>
				</nav>
			</div>
		</header>
			
		<h1 style="border-bottom:2px soild red; text-align: center; color: red;">Videos in the Collection</h1>
		<div class="container" style="border:2px red solid">
				<?php
				$query = "SELECT * FROM videos order by id ASC";
				$result = mysqli_query($connect, $query);
				while($row = mysqli_fetch_array($result)){
					$name = $row['name'];
					$url = $row['url'];

					echo "<header style='width: 70%; margin-left: 15%;'>";
					echo "<h2>File Name: <span style='font-size: larger; color:red;'>$name</span></h2>";
					echo "</header>";
					echo "<div id='videos'> <video width='70%' controls>";
					echo "<source src='$url' type='video/mp4'>";
					echo "<source src='$url' type='video/ogg'></video></div>";

				}					
				?>
		</div>

		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>