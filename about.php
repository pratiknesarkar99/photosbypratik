<?php
session_start();

if(!isset($_SESSION['email'])){
    echo "<script>"; 
    echo 'alert("No Unauthorized access!!!\nPlease login to continue...")';
    echo "</script>"; 
    echo "<script>"; 
   echo 'window.open("../index.html", "_current")';
	echo "</script>"; 
}?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<meta name="keywords" content="Pratik, Photos, Photographs, Images, Photos by Pratik">
		<meta name="author" content="Pratik Nesarkar">
		<title>About Pratik</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<script type="text/javascript" src="Subscription.js"></script>
	</head>
	
	<body>
		<header>
			<div class="container">
				<div id="WebpageName">
					<p><h1>Photos by<span class="highlight"> Pratik</span></h1></p>
				</div>
				<nav>
					<ul>
						<li><a href="home.php">Home</a></li>
						<li class="current"><a href="about.php">About</a></li>
						<li><a href="gallery.php">Gallery</a>
							<ul style="border-radius: 10px;">
								<li><a href="./gallery/portraits.php">PORTRAITS</a></li>
								<li><a href="./gallery/nature.php">NATURE</a></li>
								<li><a href="./gallery/abstract.php">ABSTRACT</a></li>
								<li><a href="./gallery/videos.php">VIDEOS</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<section id="Main">
			<div class="container"style="border-bottom: red 3px solid; " >
				<h1 align="center" style="font-size: x-large;">ABOUT ME</h1>
				
				<p style="border-radius: 10px;"><img src="./img/IMG_20180604_112820-1.jpg" style="width: 30%; height: 60%; max-width: 30%; max-height: 60%;">
					I am a Photographer based in India. I love to shoot portraits, abstract pictures and nature.
					My goal is to capture the real, true personality of a person than just clicking a picture. 
					One of the most important thing i have learned from this field is the different personality of people.<br>
					We pretend to be some different person in every other situation due to the society we are living 
					in today & doing this we forget who or how we actually are & to remind you how awesome & beautiful you are 
					I am here.
				</p>
				<p style="border-radius: 10px;">
					FullName: Pratik Shailesh Nesarkar<br>
					Age: 20 yrs<br>
					Residence: 1185/22 k, E-Ward, Rajarampuri 4th Lane,<br>
					Kolhpaur - 416008<br>
					Contact: +91-7773977876<br>
					e-mail: pratik.nesarkar99@gmail.com	
				</p>
			</div>

			<div class="container1">
				<form action="dbInsert.php">
					<h1 align="center" style="font-size: x-large; color: white;">For Collaborations</h1>
					<p style="border-radius: 10px;">
						<label>Name : </label>
						<input style="border-radius: 5px;" type="text" placeholder="Enter your full-name" name="Name" required><br><br>

						<label>Mobile : </label>
						<input style="border-radius: 5px;" type="text" placeholder="Enter your Mobile no." name="Mobile" required><br><br>

						<label>email : </label>
						<input style="border-radius: 5px;" type="email" placeholder="Enter your email address" name="email" required><br><br>

						<button type="submit" class="button_1" style="width: 130px; margin-left: 40px ">Submit</button>
						<button type="reset"  class="button_1" style="width: 130px; float: right; margin-right: 50px">Clear</button>
					</p>
				</form>
			</div>	

			<div class="container">
				<h1 align="center" style="font-size: x-large; border-top: solid 1px red; padding-top: 20px; padding-bottom: 5px">SOCIAL</h1>

				<div class="box" align="center">
					<img src="./img/logo1.png" style="width:60px; height:60px;"></img>
					<hr>
					<a href="https://www.facebook.com/pratik.nesarkar.4.u" style="border: 0px; text-decoration: none; word-wrap: break-word;" target="_blank">pratik.nesarkar.4.u
					</a>
				</div>

				<div class="box"  align="center">
					<img src="./img/logo2.png" style="width:60px; height:60px;">
					<hr>
					<a href="https://www.instagram.com/pratik_nesarkar_4_u/?hl=en" style="border: 0px; text-decoration: none; word-wrap: break-word;" target="_blank">pratik_nesarkar_4_u
					</a>
				</div>

				<div class="box"  align="center">
					<img src="./img/logo3.png" style="width:60px; height:60px;">
					<hr>
					<a href="https://twitter.com/PratikNesarkar" style="border: 0px; text-decoration: none; word-wrap: break-word;" target="_blank">pratik.nesarkar99@twitter.com
					</a>
				</div>
			</div>
		</section>

		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>