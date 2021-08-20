<?php require_once('../../../private/initialize.php');
	require_login_student();
	$reg_no=$_SESSION['reg_no'];
	$page_title='Write Complaint';
	$student=find_student_by_reg_no($reg_no);
	if(is_post_request())
	{
		$complain=[];
		$complain['type']=$_POST['type'];
		$complain['description']=$_POST['description'];
		$complain['reg_no']=$reg_no;
		$complain['dor']=date("Y-m-d");
		//print_r($complain);
		$result=insert_into_complain_student($complain);
		if($result)
		{
			redirect_to('status.php');
		}
		else
		{

		}
	}
?>
<?php include_once(SHARED_PATH.'/header_student.php')?>

<link rel='stylesheet' media="all" href="<?php echo url_for('/stylesheets/complain.css'); ?>">
<div class="wrapper">
	<a href='<?php echo url_for('/student/index.php')?>'>
		<img class="back" align='left' src="<?php echo url_for('/images/home.svg');?>"></br>
	</a>
	<center>
		<h1><img src="<?php echo url_for('/images/writing.svg'); ?>">Write Complaint</h1>
	</center>
	<h2>Your Details</h2>
	<div class="row">
		<div class="col-25">
			<label>
				Reg. No.
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $reg_no; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Name:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['name'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Gender:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['gender'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Email:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['email_id'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Block:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['block'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Room Number:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['room'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Room Type:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['room_type'];?></br>
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label>
				Mess:
			</label>
		</div>
		<div class="col-75">
			:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $student['mess'];?></br>
		</div>
	</div>
	<div	class="row">
		<div	class="col-25">
		</div>
		<div	class="col-75">
			<a class='new_btn' href='<?php echo url_for('/student/update_info/edit.php');?>'>Edit</a>
		</div>
	</div>
	<h2 style="margin-top:40px; border-top-style: dashed; padding-top: 20px;">Complaint Details</h2>
	<form action='write_complaint.php' method = 'post'>
	<div	class="row">
		<div	class="col-25">
			<?php $opt=['PLUMBER','ELECTRICIAN','CARPENTER','CTS','MESS-A','MESS-B','MESS-C']?>
			<label>Type</label>
		</div>
		<div	class="col-75">
			<div class="select">
			<select name='type'>
				<?php foreach($opt as $option){?>
					<?php echo "<option value='$option'";
					/*if($employee['type']==$option)
					{
					echo 'selected';
				}*/
				echo ">$option</option>";?>
			<?php }?>
		</select>
	</div>
		</div>
	</div>
	<div	class="row">
		<div	class="col-25">
			<label>Description</label>
		</div>
		<div	class="col-75">
			<textarea type='text' name='description' placeholder="Try to keep it short..."></textarea>
		</div>
	</div>
	<div	class="row">
		<div	class="col-25">
		</div>
		<div	class="col-75">
			<input type="submit" value="Submit">
		</div>
	</div>
</form>
</div>

<?php include_once(SHARED_PATH.'/footer.php')?>
