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
	if (isset($_POST['btn'])) {

		$name = $_POST['name'];

		$sqltest = "SELECT * FROM state WHERE `state`.`name` LIKE '%$name%'";
		$restest = mysqli_query($db, $sqltest);
		$rowtest = mysqli_fetch_assoc($restest);

		if ($name !== $rowtest['name']) {
		
			$img_name = $_FILES['img']['name'];
			$img_papka = __dir__. "/images/" . $_FILES['img']['name'];
			$tmp_name = $_FILES['img']['tmp_name'];
			
			if (!file_exists("images")) {
				mkdir("images");
			}
			move_uploaded_file($tmp_name, $img_papka);
			
			$sql = "INSERT INTO `state` (`name`,`img_name`,`tmp_name`) VALUES ('$name', '$img_name', '$tmp_name')";
			$res = mysqli_query($db, $sql);
			if ($res) {
				header("Location: index.php");
				ob_end_flush();
			}else{
				echo "Ulanishda xatolik";
			}	
		}else{
			echo "Bunday davlat bazada mavjud!";
		}
	}
 ?>
	<div class="container">
		<div class="forma">
			<form class="insertforma" action="" method="POST" enctype="multipart/form-data">
				<label>Davlat nomi</label>
				<input type="text" name="name" required>
				<label>Davlat rasmi</label>
				<input type="file" name="img" required>
				<button class="btn" name="btn">Qo'shish</button>
			</form>
		</div>
	</div>
</body>
</html>