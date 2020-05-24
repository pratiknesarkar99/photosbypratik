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
		<title>Gallery: Abstract</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/sliderstyle.css">

		<style>
			body {font-family: Arial, Helvetica, sans-serif;}

			#myImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			.modal {
			display: none; 
			position: fixed; 
			z-index: 1;
			padding-top: 100px; 
			left: 0;
			top: 0;
			width: 100%; 
			height: 100%;
			overflow: auto; 
			background-color: rgb(0,0,0);
			background-color: rgba(0,0,0,0.9); 
			}

			.modal-content {
			margin: auto;
			display: block;
			height: 80%;
			}

			.modal-content, #caption {  
			-webkit-animation-name: zoom;
			-webkit-animation-duration: 0.6s;
			animation-name: zoom;
			animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
			from {-webkit-transform:scale(0)} 
			to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
			from {transform:scale(0)} 
			to {transform:scale(1)}
			}

			.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
			}

			.close:hover,
			.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
			.modal-content {
				width: 100%;
				object-fit:scale-down;
			}
			}
		</style>

	</head>
	<body>
		<script>
			function goBack() {
  				window.history.back();
		}
		</script>
		
		<header>
			<div class="container">
				<div id="WebpageName">
					<p><h1>Photos by<span class="highlight"> Pratik</span></h1></p>
				</div>
				<nav>
					<ul>
						<li><a href="../home.php">Home</a></li>
						<li><a onclick="goBack()">Go Back</a></li>
						<li><a href="portraits.php">Portraits</a></li>
						<li><a href="nature.php">Nature</a></li>
						<li class="current"><a href="abstract.php">Abstract</a></li>
						<li><a href="videos.php">Videos</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
		</div>

		<div class="container2">
			<figure>
				<div>
					<h2 style="text-align: center; color: red;"> Images in Album Abstract</h2>
					<?php
					$query = "SELECT * FROM abstract order by id DESC";
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_array($result)){
						echo '<t><img id="myImg" onClick="opnImg(this)" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" class="img-thumnail"style="height:50%; margin:10px;"  /> </t>';
					}
					?>
				</div>
			</figure>
		</div>
			
		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>

<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var modalImg = document.getElementById("img01");
	function opnImg(a){
	modal.style.display = "block";
	modalImg.src = a.src;
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	modal.style.display = "none";
	}
</script>