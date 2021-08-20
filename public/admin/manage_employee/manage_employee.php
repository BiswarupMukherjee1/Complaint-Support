<?php require_once('../../../private/initialize.php');
	  $page_title='Manage Employee';
	  require_login_admin();
	  include_once(SHARED_PATH.'/header_admin.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/tables.css');?>">
<style>
	th:nth-last-child(3){
		border: 1px groove #c4c4c4;
	}
	h2{
		margin-top: 55px;
	}
	.btn{
		padding: 10px;
	}
</style>
	<center>
		<div class="table">
			<a href='<?php echo url_for('/admin/index.php')?>'>
				<img class="index" align='left' src="<?php echo url_for('/images/home.svg');?>">
			</a>
			<h2><img src="<?php echo url_for('/images/manage.svg');?>">Manage Employee</h2></br>
				<a href='new_employee.php' class="new_btn">
					Add new Employee
				</a>
			<table>
				<tr>
					<th>EID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Mobile Number</th>
					<th>Email ID</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<?php $employee_set=find_all_employee();?>
				<?php while ($employee=mysqli_fetch_assoc($employee_set)){?>
				<tr>
					<td><?php echo $employee['eid']; ?></td>
					<td><?php echo $employee['name'];?></td>
					<td><?php echo $employee['type'];?></td>
					<td><?php echo $employee['mob_num'];?></td>
					<td><?php echo $employee['email_id'];?></td>

					<td>
						<a class="btn" href='edit_employee.php?id=<?php echo $employee['eid'];?>'>Edit</a>
					</td>
					<td>
						<a class="btn" href='delete_employee.php?id=<?php echo $employee['eid'];?>'>Delete</a>
					</td>

				</tr>
				<?php } //while loop closed?>
			</div>
<?php include_once(SHARED_PATH.'/footer.php');?>
</center>
