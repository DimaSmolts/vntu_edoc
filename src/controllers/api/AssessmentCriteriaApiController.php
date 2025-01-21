<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/AssessmentCriteriaService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\AssessmentCriteriaService;

class AssessmentCriteriaApiController extends BaseController
{
	protected WPService $wpService;
	protected AssessmentCriteriaService $assessmentCriteriaService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->assessmentCriteriaService = new AssessmentCriteriaService();
	}

	public function updateAssessmentCriteria()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$field = $data['field'];
			$value = $data['value'];
			$lessonTypeId = isset($data['lessonTypeId']) ? intval($data['lessonTypeId']) : null;
			$taskTypeId = isset($data['taskTypeId']) ? intval($data['taskTypeId']) : null;

			$this->assessmentCriteriaService->updateAssessmentCriteria($wpId, $field, $value, $lessonTypeId, $taskTypeId);
		}
	}

	public function updateDefaultAssessmentCriteria()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$isAdmin = $this->checkIfCurrentUserIsAdmin();

		if (!$isAdmin) {
			$this->showDoNotHaveAccessGlobalDataPage();

			exit();
		}

		$wpId = intval($data['wpId']);
		$field = $data['field'];
		$value = $data['value'];
		$lessonTypeId = isset($data['lessonTypeId']) ? intval($data['lessonTypeId']) : null;
		$taskTypeId = isset($data['taskTypeId']) ? intval($data['taskTypeId']) : null;
		$isGeneral = isset($data['isGeneral']) ? $data['isGeneral'] : null;
		$isAdditionalTask = isset($data['isAdditionalTask']) ? $data['isAdditionalTask'] : null;

		if ($isGeneral) {
			$this->assessmentCriteriaService->updateGeneralAssessmentCriteria($field, $value);
		} else if ($isAdditionalTask) {
			$this->assessmentCriteriaService->updateAdditionalTaskAssessmentCriteria($field, $value);
		} else {
			$this->assessmentCriteriaService->updateAssessmentCriteria(null, $field, $value, $lessonTypeId, $taskTypeId);
		}
	}
}
