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

		$disciplineName = $_POST['disciplineName'] ?? null;

		$newWPId = $this->wpService->createNewWP();

		header("Location: wpdetails?id=" . $newWPId);

		exit();
	}

	public function updateWPDetails()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->wpService->updateWPDetails($id, $field, $value);

		exit();
	}
}
