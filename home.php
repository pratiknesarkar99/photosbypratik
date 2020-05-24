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
						<li class="current"><a href="home.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="gallery.php">Gallery</a>
							<ul style="border-radius: 10px;">
								<li><a href="./gallery/portraits.php">PORTRAITS</a></li>
								<li><a href="./gallery/nature.php">NATURE</a></li>
								<li><a href="./gallery/abstract.php">ABSTRACT</a></li>
								<li><a href="./gallery/videos.php">VIDEOS</a></li>
							</ul>
						</li>
                        <li><a href="profile.php" name="profile">Profile</a></li>
                        <li><a href="./scripts/logout.php" onclick="return confirm('Are you sure to logout?');" name="logout">Logout</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="container">
			<div id="slider">
				<header>
					<h3 style="padding-left: 10px"><a href="gallery.php">Visit Albums</a></h3>
				</header>

				<figure>	
					<div>
						<?php
							$query = "SELECT * FROM portraits order by id DESC";
							$result = mysqli_query($connect, $query);
							while($row = mysqli_fetch_array($result)){
								echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="height:300px; width:300px; object-fit:cover; margin:5px;" class="img-thumnail"/>';
							}
						?>
				</div>
				</figure>
			</div>
		</div>
		<br>

		<section id="Subscription">
			<div class="container">
				<h1 style="color: red">Subscribe for Newsletter</h1>
				<form method="POST" action="./scripts/subscribe.php">
					<input style="border-radius: 5px;" name="submail" type="email" placeholder="Enter e-mail here." required/>
					&nbsp
					<button type="submit" class="button_1">Subscribe</button>
				</form>
			</div>
		</section>

		<section id="Social">
			<div class="container">
				<div class="box" align="center" style="margin-left:60px;">
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
		</section>

		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>

<script>
function subscribe(){
    alert("Thank you!");
}
</script>
