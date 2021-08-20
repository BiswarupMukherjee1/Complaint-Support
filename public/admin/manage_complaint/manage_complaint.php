<?php require_once('../../../private/initialize.php');
	require_login_admin();
	$page_title='Manage Complaint';
//	$student=find_student_by_reg_no($reg_no);
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
<?php include_once(SHARED_PATH.'/header_admin.php')?>

<link rel='stylesheet' media="all" href="<?php echo url_for('/stylesheets/manage_complaint.css'); ?>">
<style>
	th:nth-last-child(3),th:nth-last-child(2){
		border: 1px groove #c4c4c4;
	}
	h2{
		margin-top: 55px;
	}
	.btn{
		padding: 10px;
	}
</style>
<div class="wrapper">
  <center>
    <div class="table">
      <a href='<?php echo url_for('/admin/index.php')?>'>
        <img class="index" align='left' src="<?php echo url_for('/images/home.svg');?>">
      </a>
      <h2><img  src="<?php echo url_for('/images/status.svg');?>">Manage Complaint</h2>
      <table>
    <tr>
      <th>CID</th>
      <th>Type</th>
      <th>Description</th>
      <th>Reg NO.</th>
      <th>DOR</th>
      <th>Status</th>
      <th>DOA</th>
      <th>EID</th>
      <th>&nbsp;</th>
    </tr>
    <?php $complain_set=find_all_complains();?>
    <?php while ($complain=mysqli_fetch_assoc($complain_set)){?>
    <tr>
      <td><?php echo $complain['cid']; ?></td>
      <td><?php echo $complain['type']; ?></td>
      <td><?php echo $complain['description']; ?></td>
      <td><?php echo $complain['reg_no']; ?></td>
      <td><?php echo $complain['dor']; ?></td>
      <td><?php if($complain['doa']==''){echo "Not updated"; }else{echo $complain['status'];}; ?></td>
      <td><?php echo $complain['doa']??'- - - -'; ?></td>
      <td><?php echo $complain['eid']??'- - -'; ?></td>
      <td>
        <a class="btn" href='update.php?id=<?php echo $complain['cid'];?>'>Update</a>
      </td>
    </tr>
    <?php } //while loop closed?>
    <?// maybe add something to ping admin?>
<?php include_once(SHARED_PATH.'/footer.php')?>
