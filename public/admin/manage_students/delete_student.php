<?php
	require_once('../../../private/initialize.php');
	$page_title='Delete Student';
	require_login_admin();
	if(!isset($_GET['id']))
	{
		redirect_to('manage_students.php');
	}
	$reg_no=$_GET['id'];
	if(is_post_request())
	{
		$ans=$_POST['ans'];
		$ans=$ans[4];
		if($ans=='Y'){
			$result=delete_student($reg_no);
			if($result)
			{
				redirect_to('manage_students.php');
			}
			else
			{
				echo 'Delete Failed';
			}
		}
		else{
			redirect_to('manage_students.php');
		}
	}
?>
<?php include_once(SHARED_PATH.'/header_admin.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/delete.css');?>">
<div class="wrapper">
	<a href='manage_students.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a></br>
	<img class="delete" src="<?php echo url_for('/images/delete.svg'); ?>"></br>
	<h2>Delete Student</h2>
	<label>
		Are you sure you want to delete </br>
		student with Registration Number <?php echo $reg_no;?>?</br>
	</label>
	<form action='delete_student.php?id=<?php echo $reg_no; ?>' method='post'>
		<input type='submit'  value='&#10004; Yes' name='ans'>
		<input type='submit' value='&#10006; No' name='ans'>
	</form>
</div>
<?php include_once(SHARED_PATH.'/footer.php');?>
