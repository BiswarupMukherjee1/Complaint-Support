<?php if(!isset($page_title)){$page_title='CMS';}
	//$id=$_SESSION['id']??'';
	//$name=$_SESSION['name']??'';
	//echo $id;
	//echo $name;
?>
<!doctype html>
<html lang="en">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta charset="utf-8">
		<!--<link rel ="stylesheet" media="all" href ="<?php //echo url_for('stylesheets/staff.css')?>"/><!-- a browser path -->
	</head>
	<center>
	<body>
	<a href='<?php echo url_for('/log_out.php')?>'><button>Log Out</button></a>
		
