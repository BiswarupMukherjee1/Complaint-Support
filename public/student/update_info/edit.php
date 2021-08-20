<?php require_once('../../../private/initialize.php');
	  $page_title='Edit';
	  require_login_student();
	  $reg_no=$_SESSION['reg_no'];
	  $student=find_student_by_reg_no($reg_no);
	  if(isset($_POST['name']))
	  {
		  $student=[];
		  $student['reg_no']=$reg_no;
		  $student['name']=$_POST['name']??'';
		  $student['email_id']=$_POST['email_id']??'';
		  $student['gender']=$_POST['gender']??'';
		  $student['room']=$_POST['room']??'';
		  $student['block']=$_POST['block']??'';
		  $student['room_type']=$_POST['room_type']??'';
		  $student['mess']=$_POST['mess']??'';

		  $result=update_student_by_reg_no($student);
		  if($result){
			  redirect_to('update_info.php');
		  }
		  else
		  {
			  echo 'Query Failed';
		  }

	  }

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
						Registration No.:
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
				<div class="col-75">
					<input type='text' name='name' value='<?php echo $student['name'];?>' placeholder="Name..." style="width: 35%;">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>
						Email ID:
					</label>
				</div>
				<div class="col-75">
					<input type='text' name='email_id' value='<?php echo $student['email_id'];?>' placeholder="Email..." style="width: 50%;">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Gender:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
					<label for="male" style="padding-left:0;">
						<input type="radio" id="male" name="gender" value="Male" <?php if($student['gender']=='Male'){echo 'checked';} ?>>
						<span class="checkmark"></span>
						Male
					</label>
					<label for="female">
						<input type="radio" id="female" name="gender" value="Female" <?php if($student['gender']=='Female'){echo 'checked';} ?>>
						<span class="checkmark"></span>
						Female
					</label>
					<label for="other">
						<input type="radio" id="other" name="gender" value="Other" <?php if($student['gender']=='Other'){echo 'checked';} ?>>
						<span class="checkmark"></span>
						Other
					</label>
				</div>
			</div>

		 <div class="row">
				<div class="col-25">
					<label>Block:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
					<label for="A" style="padding-left:0;">
						<input type="radio" id="A" name="block" value="A"  <?php if($student['block']=='A'){echo 'checked';}?>>
						<span class="checkmark"></span>
						A
					</label>
					<label for="B">
						<input type="radio" id="B" name="block" value="B"  <?php if($student['block']=='B'){echo 'checked';}?>>
						<span class="checkmark"></span>
						B
					</label>
					<label for="C">
						<input type="radio" id="C" name="block" value="C"  <?php if($student['block']=='C'){echo 'checked';}?>>
						<span class="checkmark"></span>
						C
					</label>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>
						Room No.:
					</label>
				</div>
				<div class="col-75">
					<input type='text' name='room' value='<?php echo $student['room'];?>' placeholder="Room Num..." style="width: 13%;">
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Room Type:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
					<label for="NAC" style="padding-left:0;">
						<input type="radio" id="NAC" name="room_type" value="NAC" <?php if($student['room_type']=='NAC'){echo 'checked';}?>>
						<span class="checkmark"></span>
						NAC
					</label>
					<label for="AC">
						<input type="radio" id="AC" name="room_type" value="AC" <?php if($student['room_type']=='AC'){echo 'checked';}?>>
						<span class="checkmark"></span>
						AC
					</label>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Mess:</label>
				</div>
				<div class="col-75" style="margin-top: 30px;">
					<label for="SPECIAL" style="padding-left:0;">
						<input type="radio" id="SPECIAL" name="mess" value="SPECIAL" 	<?php if($student['mess']=='SPECIAL'){echo 'checked';}?>>
						<span class="checkmark"></span>
						SPECIAL
					</label>
					<label for="NON-VEG">
						<input type="radio" id="NON-VEG" name="mess" value="NON-VEG" 	<?php if($student['mess']=='NON-VEG'){echo 'checked';}?>>
						<span class="checkmark"></span>
						NON-VEG
					</label>
					<label for="VEG">
						<input type="radio" id="VEG" name="mess" value="VEG" 	<?php if($student['mess']=='VEG'){echo 'checked';}?>>
						<span class="checkmark"></span>
						VEG
					</label>
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
