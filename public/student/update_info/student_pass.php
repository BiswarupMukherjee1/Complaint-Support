<?php
	require_once('../../../private/initialize.php');
	$page_title='Change Password';
	require_login_student();

	if(is_post_request())
	{
		$pass=$_POST['pass'];
		$result=update_student_pass($reg_no,$pass);
		if($result)
		{
			redirect_to('../index.php');
		}
		else
		{
			echo 'Update Failed';
		}
		//check for security if monkeying around with url could lead to something unexpected
	}
?>
<?php include_once(SHARED_PATH.'/header_student.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/change_pass.css');?>">
<center>
<div class="wrapper">
	<a href='#'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a></br>
	<img class="delete" src="<?php echo url_for('/images/forgot_pass.svg'); ?>"></br>
	<h2>Change Password</h2>
		<form action='student_pass.php?id=<?php echo $reg_no; ?>' method='post'>
			<label>New password:</label>
			<input type='password' name='pass' placeholder="Password...">
			<input type='submit' value='Change password'>
		</form>
</div>
<?php include_once(SHARED_PATH.'/footer.php');?>
</center>
