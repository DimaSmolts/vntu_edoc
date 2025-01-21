<?php
require_once __DIR__ . '/../../../helpers/getLessonTypeIdByName.php';

$lessonTypesId = getLessonTypeIdByName()->practical;

$title = "Критерії оцінювання практичних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['practical']->FXAndF ?? '') ?></textarea>
	</label>
</form>