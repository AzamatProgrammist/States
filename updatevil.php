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
		$id = $_GET['id'];
		$sql = "SELECT * FROM viloyat WHERE `id` = '$id'";
		$res = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($res);
	}

	if (isset($_POST['btn'])) {
		$name = $_POST['name'];
		$id = $_POST['id'];
		$state_id = $_POST['state_id'];
		$size = $_FILES['img']['size'];
		if ($size !== 0) {
			$img_name = $_FILES['img']['name'];
			$img_papka = __dir__. "/images/" .$_FILES['img']['name'];
			$tmp_name = $_FILES['img']['tmp_name'];
			move_uploaded_file($tmp_name, $img_papka);
		}else{
			$img_name = $_POST['img_name'];
			$tmp_name = $_POST['tmp_name'];
		}
		if (!file_exists("images")) {
			mkdir("images");
		}

		$sql = "UPDATE `viloyat` SET `name` = '$name', `img_name` = '$img_name', `tmp_name` = '$tmp_name' WHERE `viloyat`.`id` = $id";
			$res = mysqli_query($db, $sql);
			if ($res) {
				header("Location: index.php");
				ob_end_flush();
			}
	}


 ?>
	<div class="container">
		<div class="forma">
			<form class="insertforma" action="" method="POST" enctype="multipart/form-data">
				<label>Viloyat nomi</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>" required>
				<input type="hidden" name="state_id" value="<?php echo $row['state_id']; ?>" required>
				<label>Viloyat rasmi</label>
				<input type="file" name="img">
				<input type="hidden" name="img_name" value="<?php echo $row['img_name']; ?>" required>
				<input type="hidden" name="tmp_name" value="<?php echo $row['tmp_name']; ?>" required>
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>" required>

				<button class="btn" name="btn">Qo'shish</button>
			</form>
		</div>
	</div>
</body>
</html>