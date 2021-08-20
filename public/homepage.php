<?php
	require_once('../private/initialize.php');
	?>
<html>
<header>
<title>Homepage</title>
<link rel="stylesheet" media="all" href="stylesheets/homepage.css">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</header>
<body>
	<div>
		<img src="images/cms.svg">
		<nav>
			<a href="student_login.php">Student Login</a>
			<a href="admin_login.php">Admin Login</a>
		</nav>
	</div>
<footer>
		&copy;<?php echo date('Y'); ?> CMS
</footer>
</body>
</html>
