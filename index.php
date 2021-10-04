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
		$sql = "SELECT * FROM state";
		$res = mysqli_query($db, $sql);
		$massiv = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$massiv[] = $row;
		}

	 ?>
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
</body>
</html>