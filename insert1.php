<?php 
	include 'db.php';
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Qo'shish</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	
 	if (isset($_GET['id'])) {
 		$idi = $_GET['id'];
 		$sql1 = "SELECT * FROM state WHERE `id` = $idi";
 		$res1 = mysqli_query($db, $sql1);
 		$row1 = mysqli_fetch_assoc($res1);
 	}

	if (isset($_POST['btn'])) {

		$name = $_POST['name'];
		$img_name = $_FILES['img']['name'];
		$img_papka = __dir__. "/images/" . $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		
		if (!file_exists("images")) {
			mkdir("images");
		}
		move_uploaded_file($tmp_name, $img_papka);
		
		$sql2 = "INSERT INTO `viloyat` (`name`, `state_id`, `img_name`, `tmp_name`) VALUES ( '$name', '$idi', '$img_name', '$tmp_name')";
		$res2 = mysqli_query($db, $sql2);
		if ($res2) {
			header("Location: index.php");
			ob_end_flush();
		}
		
	}
 ?>
	<div class="container">
		<div class="forma">
			<form class="insertforma" action="" method="POST" enctype="multipart/form-data">
				<label>Davlat nomi</label>
				<input type="text" name="name1" value="<?=$row1['name']; ?>" required>
				<label>Viloyat nomi</label>
				<input type="text" name="name" required>
				<label>Viloyat rasmi</label>
				<input type="file" name="img" required>
				<button class="btn" name="btn">Qo'shish</button>
			</form>
		</div>
	</div>
</body>
</html>
