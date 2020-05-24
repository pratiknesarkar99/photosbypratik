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

$connect = mysqli_connect("localhost", "root", "", "photosbypratikdb");
if(isset($_POST["insert"])){
	$name = $_FILES["file"]["name"];
	$temp = $_FILES["file"]["tmp_name"];

	move_uploaded_file($temp, "../videos/".$name);
	$url = "http://127.0.0.1/photosbypratik/videos/$name";

	$query = "INSERT INTO videos(name, url) VALUES ('$name', '$url')";
	if(mysqli_query($connect, $query)){
		echo '<script>alert("Video file: '.$name.' Inserted Successfully")</script>';
		$file = null;
	} else{
		echo '<script>alert("Insert Image Failed!!!")</script>';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<meta name="keywords" content="Pratik, Photos, Photographs, Images, Photos by Pratik">
		<meta name="author" content="Pratik Nesarkar">
		<title>Admin: Videos</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/sliderstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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
						<li><a href="nature.php">Nature</a></li>
						<li><a href="abstract.php">Abstract</a></li>
						<li class="current"><a href="videos.php">Videos</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="container2" style="margin-left:30px;">
			<h2 style="text-align: center; color: red;"> Insert videos to the Album</h2>

			<form method="POST" enctype="multipart/form-data">
				<br>
				<label>Select image to insert: </label>
				
				<input type="file" name="file" id="file"/>
				<br><br>
				<input class="button_1" type="submit" name="insert" id="insert" value="Insert" style="margin-top: 0px; margin-bottom: 20px;"/>
			</form>
		</div>

		<h1 style="margin-top:80px; text-align: center; color: red;">Videos in the Collection</h1>
		<div class="container" style="border:2px red solid">
				<?php
				$query = "SELECT * FROM videos order by id ASC";
				$result = mysqli_query($connect, $query);
				while($row = mysqli_fetch_array($result)){
					$name = $row['name'];
					$url = $row['url'];

					echo "<header style='width: 70%; margin-left: 15%;'>";
					echo "<h3>File Name: <span style='font-size: larger; color:red;'>$name</span></h3>";
					echo "</header>";
					echo "<div id='videos'> <video width='70%' controls>";
					echo "<source style='border:2px;' src='$url' type='video/mp4'>";
					echo "<source src='$url' type='video/ogg'></video></div>";
				}					
				?>
		</div>			
	</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var file_name = $('#file').val();  
           if(file_name == '')  
           {  
                alert("Please Select a video file!!!");  
                return false;  
           }  
           else  
           {  
                var extension = $('#file').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['mp4','mov','mkv','webm']) == -1)  
                {  
                     alert('Invalid File Type!!! Supported formats (mp4, mov, mkv, webm)');  
                     $('#file').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 