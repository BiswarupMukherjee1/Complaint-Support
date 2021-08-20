<?php
	function find_all_students()
	{
		global $db;
		$sql='SELECT * FROM students';
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_student_by_reg_no($reg_no)
	{
		global $db;
		$sql='SELECT * FROM students ';
		$sql.='WHERE reg_no= \''.db_escape($db,$reg_no).'\' ';
		$result=mysqli_query($db,$sql);
		$result=mysqli_fetch_assoc($result);
		return $result;
	}

	function insert_into_students($student)
	{
		global $db;
		$hash_pass=password_hash($student['pass'],PASSWORD_BCRYPT);
		$sql='INSERT INTO STUDENTS ';
		$sql.='(name,email_id,block,room,room_type,mess,gender,pass) ';
		$sql.='VALUES ( ';
		//$sql.="'".db_escape($db,$student['reg_no'])."',";
		$sql.="'".db_escape($db,$student['name'])."',";
		$sql.="'".db_escape($db,$student['email_id'])."',";
		$sql.="'".db_escape($db,$student['block'])."',";
		$sql.="'".db_escape($db,$student['room'])."',";
		$sql.="'".db_escape($db,$student['room_type'])."',";
		$sql.="'".db_escape($db,$student['mess'])."',";
		$sql.="'".db_escape($db,$student['gender'])."',";
		$sql.="'".db_escape($db,$hash_pass)."')";
		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function update_student_by_reg_no($student)
	{
		global $db;
		$sql='UPDATE students SET ';
		$sql.='name=\''.db_escape($db,$student['name']).'\', ';
		$sql.='email_id=\''.db_escape($db,$student['email_id']).'\', ';
		$sql.='gender=\''.db_escape($db,$student['gender']).'\', ';
		$sql.='block=\''.db_escape($db,$student['block']).'\', ';
		$sql.='room=\''.db_escape($db,$student['room']).'\', ';
		$sql.='room_type=\''.db_escape($db,$student['room_type']).'\', ';
		$sql.='mess=\''.db_escape($db,$student['mess']).'\' ';
		$sql.='WHERE reg_no=\''.db_escape($db,$student['reg_no']).'\'';
		//echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;

	}

	function delete_student($reg_no)
	{
		global $db;
		$sql='DELETE FROM students WHERE reg_no =\''.db_escape($db,$reg_no).'\'';
		//echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function update_student_pass($reg_no,$pass)
	{
		$hash_pass=password_hash($pass,PASSWORD_BCRYPT);
		global $db;
		$sql="UPDATE student_pass SET password='$hash_pass' WHERE reg_no='$reg_no'";
		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}


	function find_all_employee()
	{
		global $db;
		$sql='SELECT * FROM employee ';
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_employee_by_eid($eid)
	{
		global $db;
		$sql='SELECT * FROM employee ';
		$sql.='WHERE eid= \''.db_escape($db,$eid).'\' ';
		$result=mysqli_query($db,$sql);
		$result=mysqli_fetch_assoc($result);
		return $result;
	}

	function find_employee_by_type($type)
	{
		global $db;
		$sql='SELECT * FROM employee ';
		$sql.='WHERE type= \''.db_escape($db,$type).'\' ';
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function insert_into_employee($employee)
	{
		global $db;
		$sql='INSERT INTO employee ';
		$sql.='(name,email_id,mob_num,type) ';
		$sql.='VALUES ( ';
		$sql.="'".db_escape($db,$employee['name'])."',";
		$sql.="'".db_escape($db,$employee['email_id'])."',";
		$sql.="'".db_escape($db,$employee['mob_num'])."',";
		$sql.="'".db_escape($db,$employee['type'])."')";

		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function update_employee_by_eid($employee)
	{
		global $db;
		$sql='UPDATE employee SET ';
		$sql.='name=\''.db_escape($db,$employee['name']).'\', ';
		$sql.='email_id=\''.db_escape($db,$employee['email_id']).'\', ';
		$sql.='type=\''.db_escape($db,$employee['type']).'\', ';
		$sql.='mob_num=\''.db_escape($db,$employee['mob_num']).'\' ';
		$sql.='WHERE eid=\''.db_escape($db,$employee['eid']).'\'';

		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}
	function delete_employee($eid)
	{
		global $db;
		$sql='DELETE FROM employee WHERE eid =\''.db_escape($db,$eid).'\'';
		//echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function insert_into_admin($employee)
	{
		global $db;
		$hash_pass=password_hash($employee['pass'],PASSWORD_BCRYPT);
		$sql='INSERT INTO admin ';
		$sql.='(name,email_id,mob_num,pass) ';
		$sql.='VALUES ( ';
		$sql.="'".db_escape($db,$employee['name'])."',";
		$sql.="'".db_escape($db,$employee['email_id'])."',";
		$sql.="'".db_escape($db,$employee['mob_num'])."',";
		$sql.="'".db_escape($db,$hash_pass)."')";


		//echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_admin_by_eid($eid)
	{
		global $db;
		$sql='SELECT * FROM admin ';
		$sql.='WHERE eid= \''.db_escape($db,$eid).'\' ';
		$result=mysqli_query($db,$sql);
		$result=mysqli_fetch_assoc($result);
		return $result;
	}

	function update_admin_by_eid($employee)
	{
		global $db;
		$sql='UPDATE admin SET ';
		$sql.='name=\''.db_escape($db,$employee['name']).'\', ';
		$sql.='email_id=\''.db_escape($db,$employee['email_id']).'\', ';
		$sql.='mob_num=\''.db_escape($db,$employee['mob_num']).'\' ';
		$sql.='WHERE eid=\''.db_escape($db,$employee['eid']).'\'';

		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_all_admins()
	{
		global $db;
		$sql='SELECT * FROM admin';
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function update_admin_pass($eid,$pass)
	{
		$hash_pass=password_hash($pass,PASSWORD_BCRYPT);
		global $db;
		$sql="UPDATE admin SET pass='$hash_pass' WHERE eid=$eid";
		$result=mysqli_query($db,$sql);
		echo $sql;
		return $result;
	}
	function find_admin_pass($eid)
	{
		global $db;
		$sql="SELECT * from admin WHERE eid='$eid'";
		$result=mysqli_query($db,$sql);
		$result=mysqli_fetch_assoc($result)??'';
		$result=$result['pass']??'';
		return $result;
	}

	function delete_admin($eid)
	{
		global $db;
		$sql='DELETE FROM admin WHERE eid =\''.db_escape($db,$eid).'\'';
		//echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_all_complains()
	{
		global $db;
		$sql="SELECT cid,eid,type,description,reg_no,date_format(dor,'%d-%M-%Y') as 'dor',date_format(doa,'%d-%M-%Y') as 'doa', status FROM complain";
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_complain_by_reg_no($reg_no)
	{
		global $db;
		$sql="SELECT cid,type,description,date_format(dor,'%d-%M-%Y') as 'dor',date_format(doa,'%d-%M-%Y') as 'doa', status FROM complain WHERE reg_no='$reg_no'";
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function find_complain_by_cid($cid)
	{
		global $db;
		$sql="SELECT cid,type,reg_no,description,date_format(dor,'%d-%M-%Y') as 'dor',date_format(doa,'%d-%M-%Y') as 'doa', status FROM complain WHERE cid='$cid'";
		$result=mysqli_query($db,$sql);
		$result=mysqli_fetch_assoc($result)??'';
		return $result;
	}

	function update_complain_by_cid($complain)
	{
		global $db;
		$sql='UPDATE complain SET ';
		$sql.='doa=\''.db_escape($db,$complain['doa']).'\', ';
		$sql.='status=\''.db_escape($db,$complain['status']).'\', ';
		$sql.='eid=\''.db_escape($db,$complain['eid']).'\' ';
		$sql.='WHERE cid=\''.db_escape($db,$complain['cid']).'\'';

		echo $sql;
		$result=mysqli_query($db,$sql);
		return $result;
	}

	function insert_into_complain_student($complain)
	{
		global $db;
		$sql='INSERT INTO complain ';
		$sql.='(type,description,dor,reg_no)';
		$sql.="VALUES (";
		$sql.="'".db_escape($db,$complain['type'])."',";
		$sql.="'".db_escape($db,$complain['description'])."',";
		$sql.="'".db_escape($db,$complain['dor'])."',";
		$sql.="'".db_escape($db,$complain['reg_no'])."')";
		$result=mysqli_query($db,$sql);
		return $result;
	}
?>
