<?php
require_once __DIR__ . '/../../../helpers/getLessonTypeIdByName.php';

$lessonTypesId = getLessonTypeIdByName()->seminar;

$title = "Критерії оцінювання семінарських занять";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<label>A:
		<textarea
			id="A"
			name="A"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->A ?? '') ?></textarea>
	</label>
	<label>B:
		<textarea
			id="B"
			name="B"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->B ?? '') ?></textarea>
	</label>
	<label>C:
		<textarea
			id="C"
			name="C"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->C ?? '') ?></textarea>
	</label>
	<label>D:
		<textarea
			id="D"
			name="D"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->D ?? '') ?></textarea>
	</label>
	<label>E:
		<textarea
			id="E"
			name="E"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->E ?? '') ?></textarea>
	</label>
	<label>FX, F:
		<textarea
			id="FXAndF"
			name="FXAndF"
			rows="5"
			oninput="updateDefaultAssessmentCriteria(event, <?= htmlspecialchars($data->$lessonTypesId) ?>, null)"><?= htmlspecialchars($assessmentCriterias['seminar']->FXAndF ?? '') ?></textarea>
	</label>
</form>