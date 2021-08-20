<?php
	require_once('../../../private/initialize.php');
	$page_title='Delete Employee';
	require_login_admin();
	if(!isset($_GET['id']))
	{
		redirect_to('manage_employee.php');
	}
	$eid=$_GET['id'];

	if(is_post_request())
	{
		$ans=$_POST['ans'];
		$ans=$ans[4];
		if($ans=='Y'){
			$result=delete_employee($eid);
			if($result)
			{
				redirect_to('manage_employee.php');
			}
			else
			{
				echo 'Delete Failed';
			}
		}
		else{
			redirect_to('manage_employee.php');
		}
	}
?>

<?php include_once(SHARED_PATH.'/header_admin.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/delete.css');?>">
<div class="wrapper">
	<a href='manage_employee.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a></br>
	<img class="delete" src="<?php echo url_for('/images/delete.svg'); ?>"></br>
	<h2>Delete Employee</h2>
	<label>
		Are you sure you want to delete </br>
		employee with EID: <?php echo $eid;?>?
	</label>
		<form action='delete_employee.php?id=<?php echo $eid; ?>' method='post'>
			<input type='submit'  value='&#10004; Yes' name='ans'>
			<input type='submit' value='&#10006; No' name='ans'>
		</form>
	</div>
<?php include_once(SHARED_PATH.'/footer.php');?>
