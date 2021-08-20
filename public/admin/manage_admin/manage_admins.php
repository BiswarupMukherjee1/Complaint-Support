<?php require_once('../../../private/initialize.php');
	  $page_title='Manage Admin';
	  require_login_admin();
	  include_once(SHARED_PATH.'/header_admin.php');
		//what happens when all admin are deleted
?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/tables.css');?>">
<style>
	h2{
		margin-top: 55px;
	}
</style>
<center>
	<div class="table">
		<a href='<?php echo url_for('/admin/index.php')?>'>
			<img class="index" align='left' src="<?php echo url_for('/images/home.svg');?>">
		</a>
		<h2><img src="<?php echo url_for('/images/manage.svg');?>">Manage Admin</h2></br>
		<a href='new_admin.php' class="new_btn">
			Add new Admin
		</a>
	<table>
		<tr>
			<th>EID</th>
			<th>Name</th>
			<th>Email ID</th>
			<th>Mobile No.</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php $employee_set=find_all_admins();?>
		<?php while ($employee=mysqli_fetch_assoc($employee_set)){?>
		<tr>
			<td><?php echo $employee['eid']; ?></td>
			<td><?php echo $employee['name'];?></td>
			<td><?php echo $employee['email_id'];?></td>
			<td><?php echo $employee['mob_num'];?></td>
			<td>
				<a class='btn' href='edit_admin.php?id=<?php echo $employee['eid'];?>'>Edit</a>
			</td>
			<td>
				<a class='btn' href='delete_admin.php?id=<?php echo $employee['eid'];?>'>Delete</a>
			</td>
			<td>
				<a class='btn' href='admin_pass.php?id=<?php echo $employee['eid'];?>'>Change Password</a>
			</td>
		</tr>
		<?php } //while loop closed?>
</center>
<?php include_once(SHARED_PATH.'/footer.php');?>
