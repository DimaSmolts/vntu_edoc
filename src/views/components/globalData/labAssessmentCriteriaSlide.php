<?php
require_once __DIR__ . '/../../../helpers/getLessonTypeIdByName.php';

$lessonTypesId = getLessonTypeIdByName()->laboratory;

$title = "Критерії оцінювання лабораторних занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['laboratory']->FXAndF ?? '') ?></textarea>
	</label>
</form>