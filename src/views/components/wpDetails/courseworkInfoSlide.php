<?php
$title = "Курсовий. Складові оцінювання.";
?>

<?php include __DIR__ . '/../header.php'; ?>

<form class="wp-form">
	<?php foreach ($semesters as $semester): ?>
		<?php if ($semester->isCourseworkExists): ?>
			<div class="coursework-container">
				<p id="semesterTitle<?= htmlspecialchars($semester->semesterId) ?>" class="mini-block-title">
					Курсовий до семестеру <?= $semester->semesterNumber ? htmlspecialchars($semester->semesterNumber) : "" ?>
				</p>
				<?php
				$hoursBlockColumnsClass = count($semester->educationalForms) === 1 ? 'hours-block-one-column' : 'hours-block-two-columns';
				$hours = [];

				foreach ($semester->courseworkHours as $courseworkHour) {
					$hours[$courseworkHour->courseworkFormName] = $courseworkHour->hours;
				}

				?>
				<div class="coursework-hours-block <?= htmlspecialchars($hoursBlockColumnsClass) ?>">
					<p class="hours-block-title">Кількість годин:</p>
					<?php foreach ($semester->educationalForms as $educationalForm): ?>
						<label><?= htmlspecialchars($educationalForm->name) ?>:
							<input
								type="text"
								name="hours"
								value="<?= htmlspecialchars($hours[$educationalForm->colName] ?? '') ?>"
								oninput="updateCourseworkHours(event, <?= htmlspecialchars($semester->semesterId) ?>, <?= htmlspecialchars($educationalForm->id) ?>)">
						</label>
					<?php endforeach; ?>
				</div>

				<div class="coursework-assesment-components-block" id="assesmentComponents<?= htmlspecialchars($semester->semesterId) ?>">
					<p class="coursework-assesment-components-block-title">Складові оцінювання:</p>
					<label>Назва складової:</label>
					<label>Бали:</label>

					<?php if (isset($semester->courseworkAssessmentComponents)): ?>
						<?php
						$courseworkAssessmentComponents = json_decode($semester->courseworkAssessmentComponents, true)
						?>
						<?php foreach ($courseworkAssessmentComponents as $name => $points): ?>
							<div class="coursework-assesment-components-inputs">
								<input
									type="text"
									name="assesmentComponentName"
									value="<?= htmlspecialchars($name ?? '') ?>"
									oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<input
									type="number"
									name="assesmentComponentPoints"
									value="<?= htmlspecialchars($points ?? '') ?>"
									oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
								<button
									class="btn"
									onclick="removeAssesmentComponentInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
									Видалити
								</button>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="coursework-assesment-components-inputs">
							<input
								type="text"
								name="assesmentComponentName"
								oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<input
								type="number"
								name="assesmentComponentPoints"
								oninput="updateAssesmentComponents(event, <?= htmlspecialchars($semester->semesterId) ?>)">
							<button
								class="btn"
								onclick="removeAssesmentComponentInputs(event)">
								Видалити
							</button>
						</div>
					<?php endif; ?>
					<button
						class="btn"
						id="addAssesmentComponent<?= htmlspecialchars($semester->semesterId) ?>"
						onclick="addAssesmentComponentsInputs(event, <?= htmlspecialchars($semester->semesterId) ?>)">
						Додати складову
					</button>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</form>