<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/FieldOfStudyService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\FieldOfStudyService;

class FieldOfStudyApiController extends BaseController
{
	protected WPService $wpService;
	protected FieldOfStudyService $fieldOfStudyService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->fieldOfStudyService = new FieldOfStudyService();
	}

	public function createNewFieldOfStudy()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$fieldOfStudyName = trim($data['fieldOfStudyName']);

			if (!empty($fieldOfStudyName)) {
				$fieldOfStudyId = $this->fieldOfStudyService->createNewFieldOfStudy($fieldOfStudyName);

				$existedFieldsOfStudyIdsInWP = $this->wpService->getFieldsOfStudyByWpId($wpId);

				$fieldsOfStudyIds = isset($existedFieldsOfStudyIdsInWP) ? json_decode($existedFieldsOfStudyIdsInWP) : [];

				$fieldsOfStudyIds[] = $fieldOfStudyId;

				$this->wpService->updateWPDetails($wpId, 'fieldsOfStudyIds', json_encode($fieldsOfStudyIds));

				echo json_encode(['status' => 'success', 'fieldOfStudyId' => $fieldOfStudyId]);
			}
		}
	}

	public function searchFieldsOfStudy()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$fieldsOfStudy = $this->fieldOfStudyService->getFieldsOfStudy();

		echo json_encode($fieldsOfStudy);
	}
}
