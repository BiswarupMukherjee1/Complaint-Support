<?php require_once('../../../private/initialize.php');
	  $page_title='Manage Students';
	  require_login_admin();
	  include_once(SHARED_PATH.'/header_admin.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/tables.css');?>">
<center>
	<div class="table">
		<a href='<?php echo url_for('/admin/index.php')?>'>
			<img class="index" align='left' src="<?php echo url_for('/images/home.svg');?>">
		</a>
		<h2><img src="<?php echo url_for('/images/manage.svg');?>">Manage Students</h2></br>
		<a href='new_student.php' class="new_btn">
			Add new student
		</a>
	<table>
		<tr>
			<th>Reg. Number</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Email ID</th>
			<th>Block</th>
			<th>Room No.</th>
			<th>Room type</th>
			<th>Mess</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php $student_set=find_all_students();?>
		<?php while ($student=mysqli_fetch_assoc($student_set)){?>
		<tr>
			<td><?php echo $student['reg_no']; ?></td>
			<td><?php echo $student['name'];?></td>
			<td><?php echo $student['gender'];?></td>
			<td><?php echo $student['email_id'];?></td>
			<td><?php echo $student['block'];?></td>
			<td><?php echo $student['room'];?></td>
			<td><?php echo $student['room_type'];?></td>
			<td><?php echo $student['mess'];?></td>
			<td>
				<a class="btn" href='edit_students.php?id=<?php echo $student['reg_no'];?>'>Edit</a>
			</td>
			<td>
				<a class="btn" href='delete_student.php?id=<?php echo $student['reg_no'];?>'>Delete</a>
			</td>
			<td>
				<a class="btn" href='student_pass.php?id=<?php echo $student['reg_no'];?>'>Change Password</a>
			</td>
		</tr>
		<?php } //while loop closed?>
	</div>
	<center>
<?php include_once(SHARED_PATH.'/footer.php');?>
