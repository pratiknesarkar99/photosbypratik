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
		<title>Gallery</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/sliderstyle.css">
	</head>
		<header>
			<div class="container">
				<div id="WebpageName">
					<p><h1>Photos by<span class="highlight"> Pratik</span></h1></p>
				</div>
				<nav>
					<ul>
						<li><a href="home.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li class="current"><a href="gallery.php">Gallery</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="container">
			<header>
				<h1><a href="./gallery/portraits.php"style="color: white; text-decoration: none;">PORTRAITS</a></h1>
			</header>
			<div id="slider">
				<figure >	
					<div >
						<?php
							$query = "SELECT * FROM portraits order by id DESC";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result)){
								echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="height:300px; width:400px; object-fit:cover; margin:5px;" class="img-thumnail"/>';
							}
						?>
					</div>
				</figure>
			</div>
		</div>

		<div class="container">
				<?php
				$query = "SELECT * FROM videos where id=1;";
				$result = mysqli_query($connect, $query);
				while($row = mysqli_fetch_assoc($result)){
					$name = $row['name'];
					$url = $row['url'];

					echo "<header style='width: 100%;'>";
					echo "<h1><a href='./gallery/videos.php' style='color: white; text-decoration: none;'>VIDEOS</a></h1>";
					echo "</header>";
					echo "<div id='videos'> <video width='100%' controls>";
					echo "<source src='$url' type='video/mp4'>";
					echo "<source src='$url' type='video/ogg'></video></div>";

				}					
				?>
		</div>
		
		<div class="container">
			<header>
				<h1><a href="./gallery/nature.php"style="color: white; text-decoration: none;">NATURE</a></h1>
			</header>
			<div id="slider">
				<figure>	
					<div>
						<hr/>
						<?php
							$query = "SELECT * FROM nature order by id DESC";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result)){
								echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="height:300px; width:400px; object-fit:cover; margin:5px;" class="img-thumnail"/>';
							}
						?>
					</div>
				</figure>
			</div>
		</div>

		<div class="container">
			<header>
				<h1><a href="./gallery/abstract.php"style="color: white; text-decoration: none;">ABSTRACT</a></h1>
			</header>
			<div id="slider">
				<figure>	
					<div>
						<hr/>
						<?php
							$query = "SELECT * FROM abstract order by id DESC";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result)){
								echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="height:300px; width:400px; object-fit:cover; margin:5px;" class="img-thumnail"/>';
							}
						?>
					</div>
				</figure>
			</div>
		</div>	
		<br>
		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>