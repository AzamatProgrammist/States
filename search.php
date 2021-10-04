<?php 
	include 'db.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Davlatlar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="header">
			<ul compact="menu">
				<li><a href="insert.php">Qo'shish</a></li>
			</ul>
			<form class="headerforma" action="search.php" method="POST">
				<input type="search" name="search">
				<input type="submit" name="submit">
			</form>
	</div>

	<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['search'];
		$sql = "SELECT * FROM state WHERE `name` LIKE '%$name%' ";
		$res = mysqli_query($db, $sql);
		$azamat = mysqli_num_rows($res);
		$massiv = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$massiv[] = $row;
		}

	}
		if (isset($_POST['btn'])) {
		$name = $_POST['search'];
		$sql = "SELECT * FROM viloyat WHERE `name` LIKE '%$name%' ";
		$res = mysqli_query($db, $sql);
		$azamat = mysqli_num_rows($res);
		$massiv = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$massiv[] = $row;
		}

	}
		if (isset($_POST['tum'])) {
		$name = $_POST['search'];
		$sql = "SELECT * FROM tuman WHERE `name` LIKE '%$name%' ";
		$res = mysqli_query($db, $sql);
		$azamat = mysqli_num_rows($res);
		$massiv = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$massiv[] = $row;
		}

	}
	 ?>
	  <?php if ($azamat > 0): ?>
		 <?php 
		 	foreach ($massiv as $mas): ?>
		 		<div class="container">

		 			<div class="box">
							<h3><?php echo $mas['name']; ?></h3>
							<img style="width: 200px; height: 200px; border-radius: 50%;" src="images/<?=$mas['img_name']; ?>" >
							<button class="btn"><a href="update.php?id=<?=$mas['id']; ?>">Update</a></button>
							<button class="btn"><a href="view.php?id=<?=$mas['id']; ?>">View</a></button>
						</div>	
		 		</div>
		 <?php endforeach; ?>
	 <?php else: ?>
		<h3>Bunday malumot opilmadi!</h3>
	<?php endif; ?>
</body>
</html>