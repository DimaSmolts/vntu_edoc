<?php
$title = "Програма навчальної дисципліни";

$semestersIds = [];

if (!empty($details->semesters)) {
	foreach ($details->semesters as $semesterData) {
		$semestersIds[] = $semesterData->id;
	}
}
?>

<?php include __DIR__ . '/../header.php'; ?>

<form
	class="wp-form"
	id='educationalDisciplineSemesterControlMethodsContent'
	data-semestersIds=<?= json_encode($semestersIds) ?>>
</form>