<?php require_once('../../../private/initialize.php');
	  $page_title='Complain Status';
	  require_login_student();
	  $reg_no=$_SESSION['reg_no'];
	  include_once(SHARED_PATH.'/header_student.php');?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/tables.css');?>">
<style>
	th:nth-last-child(1),th:nth-last-child(2),th:nth-last-child(3){
		border: 1px groove #c4c4c4;
	}
	h2{
		margin-top: 55px;
	}
</style>
	<center>
		<div class="table">
			<a href='<?php echo url_for('/student/index.php')?>'>
				<img class="index" align='left' src="<?php echo url_for('/images/home.svg');?>">
			</a>
			<h2><img  src="<?php echo url_for('/images/status.svg');?>">Complaint Status</h2>
			<table>
		<tr>
			<th>CID</th>
			<th>Type</th>
			<th>Description</th>
			<th>DOR</th>
			<th>DOA</th>
			<th>Status</th>
		</tr>
		<?php $complain_set=find_complain_by_reg_no($reg_no);?>
		<?php while ($complain=mysqli_fetch_assoc($complain_set)){?>
		<tr>
			<td><?php echo $complain['cid']; ?></td>
			<td><?php echo $complain['type']; ?></td>
			<td><?php echo $complain['description']; ?></td>
			<td><?php echo $complain['dor']; ?></td>
			<td><?php echo $complain['doa']??'- - - -'; ?></td>
			<td><?php if($complain['status']==''){echo "Not Updated";}else{echo $complain['status'];}; ?></td>
		</tr>
		<?php } //while loop closed?>
		<?// maybe add something to ping admin?>
<?php include_once(SHARED_PATH.'/footer.php');?>
</center>
