<?php
	require_once('../../../private/initialize.php');
	$page_title='Update Info';
	require_login_student();
	$reg_no=$_SESSION['reg_no'];
	include_once(SHARED_PATH.'/header_student.php');
	$student=find_student_by_reg_no($reg_no);
?>
<?php	include_once(SHARED_PATH.'/header_student.php');	?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/forms.css')?>">
<div class="wrapper">
	<h1><img src="<?php echo url_for('/images/edit_user.svg'); ?>">Edit</h1>
	<a href='<?php echo url_for('/student/index.php'); ?>'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a>
	<div class="container">
		<form action="edit.php" method='post'>
			<div class="row">
				<div class="col-25">
					<label>
						Reg. No.:
					</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
						<?php echo $student['reg_no'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>
						Name:
					</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
					<?php echo $student['name'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>
						Email ID:
					</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
					<?php echo $student['email_id'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Gender:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
						<?php echo $student['gender'];?>
				</div>
			</div>

		 <div class="row">
				<div class="col-25">
					<label>Block:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
						<?php echo $student['block'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>
						Room No.:
					</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
					<?php echo $student['room'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Room Type:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
						<?php echo $student['room_type'];?>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Mess:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
						<?php echo $student['mess'];?>
				</div>
			</div>
				<div class="row">
					<div class="col-25">
					</div>
					<div class="col-75">
						<input type='submit' value='Edit'/ style="padding: 8px 30px;">
					</div>

		</form>
	</div>
</div>
<?php include_once(SHARED_PATH.'/footer.php'); ?>
