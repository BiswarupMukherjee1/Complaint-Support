<?php if(!isset($page_title)){$page_title='CMS';}
	$aid=$_SESSION['eid']??'';
	$aname=$_SESSION['aname']??'';
	require_login_admin();
?>
<!doctype html>
<html lang="en">
<head>
	<title><?php echo $page_title; ?></title>
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
	<style>
		div{
			display:block;
		}
		.head{
			position: sticky;
			top: 0;
			display: flex;
			justify-content: space-between;
			margin: 0;
			background-color: #E8EEF2;
			box-shadow: 0px 5px 5px gray;
		}
		.logo{
			width: 52px;
			padding-left: 20px;
			padding-top: 5px;
			padding-right: 20px;
		}
		.head_a{
			display: flex;
			align-items: center;
			padding: 0px 20px;
		}
		.icon{
				width: 25px;
				padding: 0;
		}
		.txt{
			display: inline;
			padding: 0 20px;
		}
		a{
			text-decoration: none;
		}
		body{
			margin: 0;
			font-family: 'Ubuntu', sans-serif;
		}
		h1,h2,footer{
			font-family: 'Roboto', sans-serif;
		}
		footer{
			position: fixed;
			bottom: 0;
		}
	</style>
	<meta charset="utf-8">
<head>
	<body>
		<div class="head">

			<a href="<?php echo url_for('/admin/index.php'); ?>"><img class="logo" src="<?php echo url_for('/images/cms.svg');?>"></a>
			<a class="head_a" href='<?php echo url_for('/log_out_admin.php');?>'>
				<img class="icon" src="<?php echo url_for('/images/logout.svg');?>">
				<div class="txt">Log Out</div>
			</a>
			<div class="head_a">
				<img class="icon" src="<?php echo url_for('/images/user.svg');?>">
				<div class="txt"><?php echo "$aid $aname"; ?></div>
			</div>
			<a class="head_a" href='<?php echo url_for("admin/manage_admin/edit_admin.php?id=$eid");?>'>
				<img class="icon" src="<?php echo url_for('/images/writing.svg');?>">
				<div class="txt">Update Profile</div>
			</a>
		</div>
