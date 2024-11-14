<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WP.php';

use App\Services\WPService;

class WPApiController
{
	protected WPService $wpService;

	function __construct()
	{
		$this->wpService = new WPService();
	}

	public function createNewWP()
	{
		header('Content-Type: application/json');

		$newWPId = $this->wpService->createNewWP();

		header("Location: wpdetails?id=" . $newWPId);
		exit();
	}

	public function updateWPDetails()
	{
		header('Content-Type: application/json');
		
		$this->wpService->updateWPDetails();

		exit();
	}
}
