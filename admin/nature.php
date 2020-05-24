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

if(isset($_POST["insert"])){
	if($_FILES["image"]["tmp_name"] != null){
		// Getting file name
		$filename = $_FILES['image']['name'];
		//Setting Location
		$locationcompressed = "../images/nature/".$filename;
		
		compressImage($_FILES['image']['tmp_name'],$locationcompressed,30);
		
		$file = addslashes(file_get_contents($locationcompressed));
		$query = "INSERT INTO nature(name, img) VALUES ('$filename', '$file')";
	
		if(mysqli_query($connect, $query)){
			echo '<script>alert("Image Inserted Successfully")</script>';
			$file = null;
		} else{
			echo '<script>alert("Insert Image Failed!!!")</script>';
		}
	} else{
		echo '<script>alert("File Internal Syntx Error!!!")</script>';
	}
}

// Compress image
function compressImage($source, $destination, $quality) {

	$info = getimagesize($source);
  
	if ($info['mime'] == 'image/jpeg') 
	  $image = imagecreatefromjpeg($source);
  
	elseif ($info['mime'] == 'image/gif') 
	  $image = imagecreatefromgif($source);
  
	elseif ($info['mime'] == 'image/png') 
	  $image = imagecreatefrompng($source);
  
	imagejpeg($image, $destination, $quality);
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<meta name="keywords" content="Pratik, Photos, Photographs, Images, Photos by Pratik">
		<meta name="author" content="Pratik Nesarkar">
		<title>Admin: Nature</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/sliderstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

		<style>
			body {font-family: Arial, Helvetica, sans-serif;}
  			
			#h{
				margin:auto;
				margin-bottom: 30px;
			}

			#o{
				margin:auto;
				max-width:300px;
				border: 2px red double;
			}

			#o input{
				border: 2px red double;
				border-radius: 5px;
				margin: 10px;
                width: 80%;
            }

            #o button.button_1 {
                margin-left : 40px;
                margin-top: 20px;
                margin-right: 30px;

            }

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
				width: 80%;
				object-fit:scale-down;
			}
			img{
				object-fit:cover;
				width: 90%;
			}
			#Main {
                text-align:center;
                margin-left: 10px;
            }
            
            #h {
                width: 54%;
                height:30px;
            }

			#o {
                text-align: center;
				width: 80%;
			}

            #o input{
                width: 80%;
            }

            #o button.button_1 {
                margin-left : 40px;
                margin-top: 20px;
                margin-right: 30px;

            }
			
			div.container{
				width:100%;
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
						<li><a href="./adminhome.php">Admin Home</a></li>
						<li><a onclick="goBack()">Go Back</a></li>
						<li ><a href="portraits.php">Portraits</a></li>
						<li class="current"><a href="nature.php">Nature</a></li>
						<li><a href="abstract.php">Abstract</a></li>
						<li><a href="videos.php">Videos</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
		</div>

		<section="Main">
		<div class="container">	
			<form method="POST" enctype="multipart/form-data">
			<div class="container1">
			<h3 id="h" style="text-align: center; color: red;"> Insert images to Album Nature</h2>
			
			<p id="o" style="text-align: center; border-radius: 10px;">
				
				<input type="file" name="image" id="image"/>

				<input class="button_1" type="submit" name="insert" id="insert" value="Insert" style="margin-top: 0px; margin-bottom: 20px;"/>
			</p>
			</form>
	</div>
		</div>
	</section>

		<div style="text-align:justify; margin:20px; border-top: red 3px solid;">
			<h2 id="h" style="text-align: center; color: red;"> Images in Album Nature</h2>
				<?php
				$query = "SELECT * FROM nature order by id DESC";
				$result = mysqli_query($connect, $query);
				while($row = mysqli_fetch_array($result)){
					echo '<t><img id="myImg" onClick="opnImg(this)" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" style="height:200px; margin:10px;" class="img-thumnail" /> </t>';
				}
				?>
		</div>
			
		<footer>Photos by Pratik, Copyright &copy; 2020</footer>
	</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File!!! Supported formats (gif,png,jpg,jpeg)');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 

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