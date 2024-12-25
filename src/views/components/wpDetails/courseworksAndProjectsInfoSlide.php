<?php
$title = "Курсовий. Складові оцінювання.";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<?php foreach ($semesters as $semester): ?>
		<?php if ($semester->isCourseworkExists): ?>
			<div class="coursework-container">
				<p id="semesterTitle<?= htmlspecialchars($semester->semesterId) ?>" class="block-title">
					Курсова робота до семестру <?= $semester->semesterNumber ? htmlspecialchars($semester->semesterNumber) : "" ?> (45 годин)
				</p>

				<div class="coursework-assesment-components-block" id="courseworkAssesmentComponents<?= htmlspecialchars($semester->semesterId) ?>">
					<p class="coursework-assesment-components-block-title">Складові оцінювання:</p>
					<label>Назва складової:</label>
					<label>Бали:</label>

					<?php if (isset($semester->courseworkAssessmentComponents)): ?>
						<?php
						$courseworkAssessmentComponents = json_decode($semester->courseworkAssessmentComponents, true)
						?>
						<?php foreach ($courseworkAssessmentComponents as $name => $points): ?>
							<div class="assesment-components-inputs">
								<input
									type="text"
									name="assesmentComponentName"
									value="<?= htmlspecialchars($name ?? '') ?>"
									oninput="updateCourseworkAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<input
									type="number"
									name="assesmentComponentPoints"
									value="<?= htmlspecialchars($points ?? '') ?>"
									oninput="updateCourseworkAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<button
									class="btn"
									onclick="removeCourseworkAssesmentComponentInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
									Видалити
								</button>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="assesment-components-inputs">
							<input
								type="text"
								name="assesmentComponentName"
								oninput="updateCourseworkAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<input
								type="number"
								name="assesmentComponentPoints"
								oninput="updateCourseworkAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<button
								class="btn"
								onclick="removeCourseworkAssesmentComponentInputs(event)">
								Видалити
							</button>
						</div>
					<?php endif; ?>
					<button
						class="btn"
						id="addCourseworkAssesmentComponent<?= htmlspecialchars($semester->semesterId) ?>"
						onclick="addCourseworkAssesmentComponentsInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
						Додати складову
					</button>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php foreach ($semesters as $semester): ?>
		<?php if ($semester->isCourseProjectExists): ?>
			<div class="course-project-container">
				<p id="semesterTitle<?= htmlspecialchars($semester->semesterId) ?>" class="block-title">
					Курсовий проєкт до семестру <?= $semester->semesterNumber ? htmlspecialchars($semester->semesterNumber) : "" ?> (60 годин)
				</p>

				<div class="course-project-assesment-components-block" id="courseProjectAssesmentComponents<?= htmlspecialchars($semester->semesterId) ?>">
					<p class="course-project-assesment-components-block-title">Складові оцінювання:</p>
					<label>Назва складової:</label>
					<label>Бали:</label>

					<?php if (isset($semester->courseProjectAssessmentComponents)): ?>
						<?php
						$courseProjectAssessmentComponents = json_decode($semester->courseProjectAssessmentComponents, true)
						?>
						<?php foreach ($courseProjectAssessmentComponents as $name => $points): ?>
							<div class="assesment-components-inputs">
								<input
									type="text"
									name="assesmentComponentName"
									value="<?= htmlspecialchars($name ?? '') ?>"
									oninput="updateCourseProjectAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<input
									type="number"
									name="assesmentComponentPoints"
									value="<?= htmlspecialchars($points ?? '') ?>"
									oninput="updateCourseProjectAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<button
									class="btn"
									onclick="removeCourseProjectAssesmentComponentInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
									Видалити
								</button>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="assesment-components-inputs">
							<input
								type="text"
								name="assesmentComponentName"
								oninput="updateCourseProjectAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<input
								type="number"
								name="assesmentComponentPoints"
								oninput="updateCourseProjectAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<button
								class="btn"
								onclick="removeCourseProjectAssesmentComponentInputs(event)">
								Видалити
							</button>
						</div>
					<?php endif; ?>
					<button
						class="btn"
						id="addCourseProjectAssesmentComponent<?= htmlspecialchars($semester->semesterId) ?>"
						onclick="addCourseProjectAssesmentComponentsInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
						Додати складову
					</button>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</form>