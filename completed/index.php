<?php

try {
	
	$objDb = new PDO('mysql:host=localhost;dbname=dependency', 'root', 'password');
	$objDb->exec('SET CHARACTER SET utf8');
	
	$sql = "SELECT * 
			FROM `categories`
			WHERE `master` = 0";
	$statement = $objDb->query($sql);
	$list = $statement->fetchAll(PDO::FETCH_ASSOC);
	
} catch(PDOException $e) {
	echo 'There was a problem';
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Dependable dropdown menu</title>
	<meta name="description" content="Dependable dropdown menu" />
	<meta name="keywords" content="Dependable dropdown menu" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>


<div id="wrapper">

	<form action="" method="post">
		
		<select name="gender" id="gender" class="update">
			<option value="">Select one</option>
			<?php if (!empty($list)) { ?>
				<?php foreach($list as $row) { ?>
					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['name']; ?>
					</option>
				<?php } ?>
			<?php } ?>
		</select>
		
		<select name="category" id="category" class="update"
			disabled="disabled">
			<option value="">----</option>
		</select>
		
		<select name="colour" id="colour" class="update"
			disabled="disabled">
			<option value="">----</option>
		</select>
		
	</form>

</div>


<script src="/js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="/js/core.js" type="text/javascript"></script>
</body>
</html>