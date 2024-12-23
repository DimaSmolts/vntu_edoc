<?php

namespace App\Controllers;

class SessionApiController
{
	function __construct() {}

	public function adminLogin()
	{
		$_SESSION['u_uid'] = 2;
		$_SESSION['isteacher'] = 1;
	}

	public function teacherLogin()
	{
		$id = $_GET['id'];

		$_SESSION['u_uid'] = $id;
		$_SESSION['isteacher'] = 1;
	}

	public function studentLogin()
	{
		$_SESSION['u_uid'] = 3;
		$_SESSION['isteacher'] = 0;
	}

	public function getInfo()
	{
		echo json_encode(["id" => $_SESSION['u_uid'], "hasAccess" => $_SESSION['isteacher']]);
	}

	public function logOut()
	{
		session_unset();
		session_destroy();
	}
}
