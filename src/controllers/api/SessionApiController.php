<?php

namespace App\Controllers;

class SessionApiController
{
	function __construct() {}

	public function teacherLogin()
	{
		$_SESSION['u_uid'] = "123";
		$_SESSION['isteacher'] = 1;
	}

	public function studentLogin()
	{
		$_SESSION['u_uid'] = "456";
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
