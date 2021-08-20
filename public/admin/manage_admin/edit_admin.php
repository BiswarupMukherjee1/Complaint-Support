<?php require_once('../../../private/initialize.php');
	  $page_title='Edit Admin';
	  require_login_admin();
	  if(!isset($_GET['id']))
	  {
		  redirect_to('manage_admins.php');
	  }
	  $eid=$_GET['id'];
	  if(is_post_request())
	  {
		  $admin=[];
		  $admin['eid']=$eid;
		  $admin['name']=$_POST['name'];
		  $admin['email_id']=$_POST['email_id'];
		  $admin['mob_num']=$_POST['mob_num'];

		  $result=update_admin_by_eid($admin);
		  if($result)
		  {
				redirect_to('manage_admins.php');
		  }
		  else
		  {
			  //$error
			  echo 'Query Failed';
		  }
	  }

	  $admin=find_admin_by_eid($eid);
	  include_once(SHARED_PATH.'/header_admin.php');
?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/forms.css')?>">
<div class="wrapper">
	<h1><img src="<?php echo url_for('/images/edit_user.svg'); ?>">Edit Admin</h1>
	<a href='manage_admins.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a>
	<div class="container">
		<form action='edit_admin.php?id=<?php echo $eid; ?>' method='post'>
			<div class="row">
				<div class="col-25">
					<label>EID:</label>
				</div>
				<div class="col-75" style="margin-top:30px;">
					<?php echo $admin['eid']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Name:</label>
				</div>
				<div class="col-75">
					<input type='text' name='name' value='<?php echo $admin['name'];?>' placeholder="Name..." style="width: 35%;">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Email ID:</label>
				</div>
				<div class="col-75">
					<input type='text' name='email_id' value='<?php echo $admin['email_id'];?>' placeholder="Email..." style="width: 50%;">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label>Mobile No. :</label>
				</div>
				<div class="col-75">
					<input type='text' name='mob_num' value='<?php echo $admin['mob_num'];?>' placeholder="Mobile No..." style="width: 20%;">
				</div>
			</div>
			<div class="row">
				<div class="col-25"></div>
				<div class="col-75">
					<input type='submit' value='Edit Admin'/>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once(SHARED_PATH.'/footer.php'); ?>
