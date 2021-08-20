<?php
	require_once('../../../private/initialize.php');
	$page_title='Change Password';
	require_login_admin();
	if(!isset($_GET['id']))
	{
		redirect_to('manage_admins.php');
	}
	$eid=$_GET['id'];

	if(is_post_request())
	{
		$pass=$_POST['pass'];
		$result=update_admin_pass($eid,$pass);
		if($result)
		{
			redirect_to('manage_admins.php');
		}
		else
		{
			echo 'Update Failed';
		}
		//check for security if monkeying around with url could lead to something unexpected
	}
?>
<?php include_once(SHARED_PATH.'/header_admin.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/change_pass.css');?>">
<div class="wrapper">
	<a href='manage_admins.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a></br>
	<img class="delete" src="<?php echo url_for('/images/forgot_pass.svg'); ?>"></br>
	<h2>Change Password</h2>
		<div class="top">
			Update password for</br>
			admin with EID: <?php echo $eid;?>?
		</div>
		<form action='admin_pass.php?id=<?php echo $eid; ?>' method='post'>
			<label>New password:</label>
			<input type='text' name='pass' placeholder="Password...">
			<input type='submit' value='Change password'>
		</form>
	</div>
<?php include_once(SHARED_PATH.'/footer.php');?>
