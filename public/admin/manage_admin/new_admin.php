<?php require_once('../../../private/initialize.php');
	  $page_title='New Admin';
	  require_login_admin();
	  include_once(SHARED_PATH.'/header_admin.php');
	  if(isset($_POST['name']))
	  {
		  $employee=[];
		  //$employee['eid']=$_POST['eid'];
		  $employee['name']=$_POST['name'];
		  $employee['email_id']=$_POST['email_id'];
		  //$employee['type']='ADMIN';
		  $employee['mob_num']=$_POST['mob_num'];
		  $employee['pass']=$_POST['pass'];

		  $result=insert_into_admin($employee);
		  if($result){
			  redirect_to('manage_admins.php');
		  }
		  else
		  {
			  //$error
			  echo 'Query Failed';
		  }
	  }
?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/forms.css')?>">
<div class="wrapper">
	<h1><img src="<?php echo url_for('/images/add_user.svg'); ?>">Add a Admin</h1>
	<a href='manage_admins.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a>
	<div class="container">
		<form action='new_admin.php' method='post'>
			<div class="row">
				<div class="col-25">
					<label>Name:</label>
				</div>
				<div class="col-75">
					<input type='text' name='name' placeholder="Name..." style="width: 35%;"><?php //echo $admin['name'];?>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Email ID:</label>
				</div>
				<div class="col-75">
					<input type='text' name='email_id' placeholder="Email..." style="width: 50%;"><?php //echo $admin['email_id'];?>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Mobile No. :</label>
				</div>
				<div class="col-75">
					<input type='text' name='mob_num' placeholder="Mobile No..." style="width: 20%;"><?php //echo $admin['mob_num'];?>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Password:</label>
				</div>
				<div class="col-75">
					<input type='text' name='pass' placeholder="Password..."><?php //echo $admin['pass'];?>
				</div>
			</div>
			<div class="row">
				<div class="col-25"></div>
				<div class="col-75">
					<input type='submit' value='Add Admin'/>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once(SHARED_PATH.'/footer.php'); ?>
