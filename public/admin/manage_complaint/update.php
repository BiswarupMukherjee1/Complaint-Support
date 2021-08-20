<?php require_once('../../../private/initialize.php');
	  $page_title='Update Complaint';
	  require_login_admin();
	  if(!isset($_GET['id']))
	  {
		  redirect_to('manage_complaint.php');
	  }
	  $cid=$_GET['id'];
	  if(is_post_request())
	  {
		  $complain=[];
      $complain['cid']=$cid;
		  $complain['doa']=$_POST['doa'];
		  $complain['eid']=$_POST['eid'];
		  $complain['status']=$_POST['status']??'Not Updated';
      echo print_r($complain);
		  $result=update_complain_by_cid($complain);
		  if($result){
			  redirect_to('manage_complaint.php');
		  }
		  else
		  {
			  //$error
			  echo 'Query Failed';
		  }
	  }

	  $complain=find_complain_by_cid($cid);

	  include_once(SHARED_PATH.'/header_admin.php');
?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/forms.css')?>">
<div class="wrapper">
  <h1><img  src="<?php echo url_for('/images/status.svg');?>">Update Complaint</h1>
  <a href='manage_complaint.php'>
		<img class="back" src="<?php echo url_for('/images/back.svg'); ?>">
	</a>
  <form action='update.php?id=<?php echo $cid; ?>' method = 'post'>
  <div class="row">
    <div class="col-25">
      <label>
        Reg. No.:
      </label>
    </div>
    <div class="col-75" style="margin-top:30px;">
      <label>
        <?php echo $complain['reg_no'];?>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>
        Type:
      </label>
    </div>
    <div class="col-75" style="margin-top:30px;">
      <label>
        <?php echo $complain['type'];?>
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label>
        Description:
      </label>
    </div>
    <div class="col-75" style="margin-top:30px;">
      <label>
        <?php echo $complain['description'];?>
      </label>
    </div>
  </div>
  <div	class="row">
    <div	class="col-25">
      <label>DOA</label>
    </div>
    <div	class="col-75">
      <div class="select">
      <input type='date' name='doa' />
    </div>
    </div>
  </div>
  <div	class="row">
    <div	class="col-25">
      <label>Employee</label>
    </div>
    <div	class="col-75">
      <div class="select" style="width:30%;">
      <select name='eid' style="width:100%;">
        <?php
        $type=$complain['type'];
        $employee_set= find_employee_by_type($type);?>
        <?php while($employee = mysqli_fetch_assoc($employee_set)){?>
          <?php echo "<option value='".$employee['eid']."'";
          /*if($employee['type']==$option)
          {
          echo 'selected';
        }*/
        echo ">".$employee['name']."</option>";?>
      <?php }?>
    </select>
      </div>
   </div>
  </div>
  <?php $opt=['Not Updated','Prompted','Solved']?>
  <div class="row">
    <div class='col-25'>
      <label>Status</label>
    </div>
    <div class='col-75'>
      <div class="select" style="width:26%">
        <select name='status' style="width:100%">
          <?php foreach($opt as $option){?>
            <?php echo "<option value='$option' ";?>
            <?php //if($option==$employee['type']){echo "selected";}?>
            <?php echo ">$option</option>";?>
          <?php }?>
        </select>
    </div>
    </div>
  </div>
  <div class="row">
    <div	class="col-25">
    </div>
    <div	class="col-75">
      <input type="submit" value="Update">
    </div>
  </div>
  </form>
</div>
