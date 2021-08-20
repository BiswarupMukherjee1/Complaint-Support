<?php require_once('../../../private/initialize.php');
	  $page_title='Edit Employee';
	  require_login_admin();
	  if(!isset($_GET['id']))
	  {
		  redirect_to('manage_employee.php');
	  }
	  $eid=$_GET['id'];
	  if(is_post_request())
	  {
		  $employee=[];
		  $employee['eid']=$eid;
		  $employee['name']=$_POST['name'];
		  $employee['email_id']=$_POST['email_id'];
		  $employee['type']=$_POST['type'];
		  $employee['mob_num']=$_POST['mob_num'];

		  $result=update_employee_by_eid($employee);
		  if($result){
			  redirect_to('manage_employee.php');
		  }
		  else
		  {
			  //$error
			  echo 'Query Failed';
		  }
	  }

	  $employee=find_employee_by_eid($eid);
	  include_once(SHARED_PATH.'/header_admin.php');
?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/forms.css')?>">
<div class="wrapper">
	<h1><img src="<?php echo url_for('/images/edit_user.svg'); ?>">Edit Employee</h1>
	<a href='manage_employee.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a>
	<div class="container">
		<form action='edit_employee.php?id=<?php echo $eid;?>' method='post'>
			<div class="row">
				<div class="col-25">
					<label>EID:</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
					<?php echo $eid;?>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Name:</label>
				</div>
				<div class="col-75">
					<input type='text' name='name' placeholder="Name..." style="width: 35%;" value="<?php echo $employee['name'];?>">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Email ID:</label>
				</div>
				<div class="col-75">
					<input type='text' name='email_id' placeholder="Email..." style="width: 50%;" value="<?php echo $employee['email_id'];?>">
				</div>
			</div>

			<?php $opt=['PLUMBER','ELECTRICIAN','CARPENTER','CTS','MESS-A','MESS-B','MESS-C']?>
			<div class="row">
				<div class='col-25'>
					<label>Type:</label>
				</div>
				<div class='col-75'>
					<div class="select" style="width:26%">
						<select name='type' style="width:100%">
							<?php foreach($opt as $option){?>
								<?php echo "<option value='$option' ";?>
								<?php if($option==$employee['type']){echo "selected";}?>
								<?php echo ">$option</option>";?>
							<?php }?>
						</select>
				</div>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label>Mobile No. :</label>
				</div>
				<div class="col-75">
					<input type='text' name='mob_num' placeholder="Mobile No..." style="width: 20%;" value="<?php echo $employee['mob_num'];?>">
				</div>
			</div>
			<div class="row">
				<div class="col-25"></div>
				<div class="col-75">
					<input type='submit' value='Edit Employee'/>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once(SHARED_PATH.'/footer.php'); ?>
