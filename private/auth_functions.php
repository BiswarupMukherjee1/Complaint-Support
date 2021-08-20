<?php
	function login_admin($admin)
	{
		session_regenerate_id();
		//protects from session fixation
		$_SESSION['eid']=$admin['eid'];
		$_SESSION['aname']=$admin['name'];
		return true;

	}

	function login_student($student)
	{
		session_regenerate_id();
		//protects from session fixation
		$_SESSION['reg_no']=$student['reg_no'];
		$_SESSION['sname']=$student['name'];
		return true;

	}

	function log_out_admin()
	{
		unset($_SESSION['eid']);
		unset($_SESSION['aname']);
		return true;
	}

	function log_out_student()
	{
		unset($_SESSION['reg_no']);
		unset($_SESSION['sname']);
		return true;
	}

	function is_logged_in_admin()
	{
		return isset($_SESSION['eid']);
	}

	function is_logged_in_student()
	{
		return isset($_SESSION['reg_no']);
	}

	function require_login_admin()
	{
		if(!is_logged_in_admin())
		{
			redirect_to(url_for('/homepage.php'));
		}
	}

	function require_login_student()
	{
		if(!is_logged_in_student())
		{
			redirect_to(url_for('/homepage.php'));
		}
	}
?>
