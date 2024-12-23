<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WPService.php';

use App\Services\WPService;

class BaseController
{
	protected WPService $wpService;

	function __construct()
	{
		$this->wpService = new WPService();
	}

	public function getSessionInfo()
	{
		if (isset($_SESSION['u_uid'])) {
			return (object) [
				"id" => $_SESSION['u_uid'],
				"hasAccess" => $_SESSION['isteacher']
			];
		}

		return null;
	}

	public function checkIfUserLoggedIn()
	{
		$sessionInfo = $this->getSessionInfo();
		return (bool) $sessionInfo;
	}

	public function checkIfCurrentUserIsTeacher()
	{
		$sessionInfo = $this->getSessionInfo();

		return empty($sessionInfo) || $sessionInfo->hasAccess;
	}

	public function checkIfCurrentUserIsAdmin()
	{
		$sessionInfo = $this->getSessionInfo();

		return empty($sessionInfo) || $sessionInfo->id === '2';
	}

	public function checkIfCurrentUserHasAccessToWP($creatorId)
	{
		$sessionInfo = $this->getSessionInfo();

		return empty($sessionInfo) || $sessionInfo->id === "$creatorId";
	}

	public function showDoNotHaveAccessPage($isLoggedIn)
	{
		$showReturnBtn = false;
		$showEditGlobalDataBtn = false;

		require __DIR__ . '/../views/pages/doNotHaveAccessPage.php';
	}

	public function showDoNotHaveAccessGlobalDataPage()
	{
		$isLoggedIn = true;
		$showReturnBtn = true;
		$showEditGlobalDataBtn = false;

		require __DIR__ . '/../views/pages/doNotHaveAccessGlobalDataPage.php';
	}

	public function showDoNotHaveAccessDetailsPage()
	{
		$isLoggedIn = true;
		$showReturnBtn = true;
		$showEditGlobalDataBtn = false;

		require __DIR__ . '/../views/pages/doNotHaveAccessDetailsPage.php';
	}

	public function showWPDetailsNotExistsPage()
	{
		$isLoggedIn = true;
		$showReturnBtn = true;
		$showEditGlobalDataBtn = false;

		require __DIR__ . '/../views/pages/wpDetailsNotExistsPage.php';
	}
}
