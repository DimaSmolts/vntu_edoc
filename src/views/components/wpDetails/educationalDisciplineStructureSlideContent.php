<?php
$educationalFormsInSemesters = [];

foreach ($semesters as $semester) {
	foreach ($semester->educationalForms as $educationalForm) {
		$educationalFormsInSemesters[$educationalForm->colName] = $educationalForm->name;
	}
}

$educationalFormsInSemestersAmount = count($educationalFormsInSemesters);
?>

<div>
	<?php if (!empty($semesters)): ?>
		<div class="block">
			<p class="block-title">Теми лекцій:</p>
			<table>
				<tr>
					<th class="lesson-number-column center-text-align">№ з/п</th>
					<th class="center-text-align">Назва теми</th>
					<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
						<th class="center-text-align lesson-hours-column">К-ть годин</br> (<?= htmlspecialchars($name) ?> форма)</th>
					<?php endforeach; ?>
				</tr>
				<?php foreach ($semesters as $semester): ?>
					<?php if (!empty($semester->lections)): ?>
						<tr>
							<td class="lesson-number-column"></td>
							<th class="center-text-align">Семестр <?= htmlspecialchars($semester->semesterNumber ?? '') ?></th>
							<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
								<td class="center-text-align disabled-cell"></td>
							<?php endforeach; ?>
						</tr>
						<?php foreach ($semester->lections as $lection): ?>
							<?php
							$educationalFormHours = [];

							if (!empty($lection->educationalFormHours)) {
								foreach ($lection->educationalFormHours as $form) {
									$educationalFormHours[$form->lessonFormName] = $form->hours;
								}
							}
							?>
							<tr>
								<td class="lesson-number-column center-text-align"><?= htmlspecialchars($lection->lessonNumber ?? '') ?></td>
								<td><?= htmlspecialchars($lection->lessonName ?? '') ?></td>
								<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
									<?php
									$educationalFormId = null;

									if (!empty($semester->educationalForms)) {
										foreach ($semester->educationalForms as $form) {
											if ($form->colName === $colName) {
												$educationalFormId = $form->id;
											}
										}
									}
									?>
									<?php if (isset($educationalFormId)): ?>
										<td class="lesson-hours-column table-input-cell">
											<input
												type="number"
												min="1"
												class="center-text-align "
												value="<?= isset($educationalFormHours[$colName]) ? htmlspecialchars($educationalFormHours[$colName]) : "" ?>"
												oninput="updateHours(event, <?= htmlspecialchars($lection->lessonId) ?>, <?= htmlspecialchars($educationalFormId) ?>)">
										</td>
									<?php else: ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endif; ?>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
		</div>

		<div class="lesson-themes-btn-block">
			<button
				class="btn"
				id="seminarAddBtn"
				<?php if ($structure->isSeminarsExist || $isSeminarVisible): ?>
				disabled
				<?php endif; ?>
				onclick="createNewLessonTable(event, 'seminar')">Додати семінарські</button>
			<button
				class="btn"
				id="practicalAddBtn"
				<?php if ($structure->isPracticalsExist || $isPracticalVisible): ?>
				disabled
				<?php endif; ?>
				onclick="createNewLessonTable(event, 'practical')">Додати практичні</button>
			<button
				class="btn"
				id="laboratoryAddBtn"
				<?php if ($structure->isLabsExist || $isLaboratoryVisible): ?>
				disabled
				<?php endif; ?>
				onclick="createNewLessonTable(event, 'laboratory')">Додати лабораторні</button>
		</div>

		<div
			id="seminarContainer"
			class="<?php if ($structure->isSeminarsExist || $isSeminarVisible): ?>lesson-table-visible<?php else: ?>lesson-table-invisible<?php endif; ?>">
			<div class="lesson-title-block">
				<p class="block-title lesson-title-block-name">Теми семінарських занять:</p>
				<button
					class="btn"
					type="button"
					onclick="openApproveDeletingModal('ВСІ семінарські заняття', () => deleteAllLessonsByType(
						event,
						'seminar',
						<?= json_encode($modulesIds) ?>
					))">
					Видалити всі семінарські
				</button>
			</div>
			<table>
				<tbody id="seminarTable">
					<tr>
						<th class="lesson-number-column center-text-align">№ з/п</th>
						<th class="center-text-align">Назва теми</th>
						<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
							<th class="center-text-align lesson-hours-column">К-ть годин</br> (<?= htmlspecialchars($name) ?> форма)</th>
						<?php endforeach; ?>
						<th class="add-lesson-column table-without-border"></th>
					</tr>
					<?php
					$seminarIdx = 0;
					?>
					<?php foreach ($semesters as $semester): ?>
						<?php if (!empty($semester->modules)): ?>
							<?php foreach ($semester->modules as $module): ?>
								<tr id="seminarModule<?= htmlspecialchars($seminarIdx) ?>">
									<td class="lesson-number-column"></td>
									<th class="center-text-align">Модуль <?= htmlspecialchars($module->moduleNumber ?? '') ?> (Семестр <?= htmlspecialchars($semester->semesterNumber ?? '') ?>)</th>
									<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endforeach; ?>
									<td class="add-lesson-column table-without-border">
										<button
											class="btn new-lesson-btn"
											type="button"
											onclick="createNewLesson(
												<?= htmlspecialchars($module->id) ?>,
												<?= htmlspecialchars($seminarIdx++) ?>,
												'seminar',
												<?= htmlspecialchars(json_encode($semester->educationalForms, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
												<?= htmlspecialchars(json_encode($educationalFormsInSemesters, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
											Додати нову тему (мод. <?= htmlspecialchars($module->moduleNumber ?? '') ?>)
										</button>
									</td>
								</tr>
								<?php if (!empty($module->seminars)): ?>
									<?php foreach ($module->seminars as $seminar): ?>
										<?php
										$educationalFormHours = [];

										if (!empty($seminar->educationalFormHours)) {
											foreach ($seminar->educationalFormHours as $form) {
												$educationalFormHours[$form->lessonFormName] = $form->hours;
											}
										}
										?>
										<tr id="lesson<?= htmlspecialchars($seminar->lessonId) ?>">
											<td class="table-input-cell lesson-number-column center-text-align">
												<input
													type="number"
													name="lessonNumber"
													class="center-text-align"
													value="<?= htmlspecialchars($seminar->lessonNumber ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($seminar->lessonId) ?>)">
											</td>
											<td class="table-input-cell">
												<input
													type="text"
													name="name"
													value="<?= htmlspecialchars($seminar->lessonName ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($seminar->lessonId) ?>)">
											</td>
											<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
												<?php
												$educationalFormId = null;

												if (!empty($semester->educationalForms)) {
													foreach ($semester->educationalForms as $form) {
														if ($form->colName === $colName) {
															$educationalFormId = $form->id;
														}
													}
												}
												?>
												<?php if (isset($educationalFormId)): ?>
													<td class="lesson-hours-column table-input-cell">
														<input
															type="number"
															min="1"
															class="center-text-align "
															value="<?= isset($educationalFormHours[$colName]) ? htmlspecialchars($educationalFormHours[$colName]) : "" ?>"
															oninput="updateHours(event, <?= htmlspecialchars($seminar->lessonId) ?>, <?= htmlspecialchars($educationalFormId) ?>)">
													</td>
												<?php else: ?>
													<td class="center-text-align disabled-cell"></td>
												<?php endif; ?>
											<?php endforeach; ?>
											<td class="add-lesson-column table-without-border">
												<button
													class="btn remove-lesson-btn"
													type="button"
													onclick="openApproveDeletingModal('заняття', () => deleteLesson(event, <?= htmlspecialchars($seminar->lessonId) ?>))">
													Видалити
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div
			id="practicalContainer"
			class="<?php if ($structure->isPracticalsExist || $isPracticalVisible): ?>lesson-table-visible<?php else: ?>lesson-table-invisible<?php endif; ?>">
			<div class="lesson-title-block">
				<p class="block-title lesson-title-block-name">Теми практичних занять:</p>
				<button
					class="btn"
					type="button"
					onclick="openApproveDeletingModal('ВСІ практичні заняття', () => deleteAllLessonsByType(
						event,
						'practical',
						<?= json_encode($modulesIds) ?>
					))">
					Видалити всі практичні
				</button>
			</div>
			<table>
				<tbody id="practicalTable">
					<tr>
						<th class="lesson-number-column center-text-align">№ з/п</th>
						<th class="center-text-align">Назва теми</th>
						<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
							<th class="center-text-align lesson-hours-column">К-ть годин</br> (<?= htmlspecialchars($name) ?> форма)</th>
						<?php endforeach; ?>
						<th class="add-lesson-column table-without-border"></th>
					</tr>
					<?php
					$practicalIdx = 0;
					?>
					<?php foreach ($semesters as $semester): ?>
						<?php if (!empty($semester->modules)): ?>
							<?php foreach ($semester->modules as $module): ?>
								<tr id="practicalModule<?= htmlspecialchars($practicalIdx) ?>">
									<td class="lesson-number-column"></td>
									<th class="center-text-align">Модуль <?= htmlspecialchars($module->moduleNumber ?? '') ?> (Семестр <?= htmlspecialchars($semester->semesterNumber ?? '') ?>)</th>
									<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endforeach; ?>
									<td class="add-lesson-column table-without-border">
										<button
											class="btn new-lesson-btn"
											type="button"
											onclick="createNewLesson(
												<?= htmlspecialchars($module->id) ?>,
												<?= htmlspecialchars($practicalIdx++) ?>,
												'practical',
												<?= htmlspecialchars(json_encode($semester->educationalForms, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
												<?= htmlspecialchars(json_encode($educationalFormsInSemesters, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
											Додати нову тему (мод. <?= htmlspecialchars($module->moduleNumber ?? '') ?>)
										</button>
									</td>
								</tr>
								<?php if (!empty($module->practicals)): ?>
									<?php foreach ($module->practicals as $practical): ?>
										<?php
										$educationalFormHours = [];

										if (!empty($practical->educationalFormHours)) {
											foreach ($practical->educationalFormHours as $form) {
												$educationalFormHours[$form->lessonFormName] = $form->hours;
											}
										}
										?>
										<tr id="lesson<?= htmlspecialchars($practical->lessonId) ?>">
											<td class="table-input-cell lesson-number-column center-text-align">
												<input
													type="number"
													name="lessonNumber"
													class="center-text-align"
													value="<?= htmlspecialchars($practical->lessonNumber ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($practical->lessonId) ?>)">
											</td>
											<td class="table-input-cell">
												<input
													type="text"
													name="name"
													value="<?= htmlspecialchars($practical->lessonName ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($practical->lessonId) ?>)">
											</td>
											<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
												<?php
												$educationalFormId = null;

												if (!empty($semester->educationalForms)) {
													foreach ($semester->educationalForms as $form) {
														if ($form->colName === $colName) {
															$educationalFormId = $form->id;
														}
													}
												}
												?>
												<?php if (isset($educationalFormId)): ?>
													<td class="lesson-hours-column table-input-cell">
														<input
															type="number"
															min="1"
															class="center-text-align "
															value="<?= isset($educationalFormHours[$colName]) ? htmlspecialchars($educationalFormHours[$colName]) : "" ?>"
															oninput="updateHours(event, <?= htmlspecialchars($practical->lessonId) ?>, <?= htmlspecialchars($educationalFormId) ?>)">
													</td>
												<?php else: ?>
													<td class="center-text-align disabled-cell"></td>
												<?php endif; ?>
											<?php endforeach; ?>
											<td class="add-lesson-column table-without-border">
												<button
													class="btn remove-lesson-btn"
													type="button"
													onclick="openApproveDeletingModal('заняття', () => deleteLesson(event, <?= htmlspecialchars($practical->lessonId) ?>))">
													Видалити
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div
			id="laboratoryContainer"
			class="<?php if ($structure->isLabsExist || $isLaboratoryVisible): ?>lesson-table-visible<?php else: ?>lesson-table-invisible<?php endif; ?>">
			<div class="lesson-title-block">
				<p class="block-title lesson-title-block-name">Теми лабораторних занять:</p>
				<button
					class="btn"
					type="button"
					onclick="openApproveDeletingModal('ВСІ лабораторні заняття', () => deleteAllLessonsByType(
						event,
						'laboratory',
						<?= json_encode($modulesIds) ?>
					))">
					Видалити всі лабораторні
				</button>
			</div>
			<table>
				<tbody id="laboratoryTable">
					<tr>
						<th class="lesson-number-column center-text-align">№ з/п</th>
						<th class="center-text-align">Назва теми</th>
						<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
							<th class="center-text-align lesson-hours-column">К-ть годин</br> (<?= htmlspecialchars($name) ?> форма)</th>
						<?php endforeach; ?>
						<th class="add-lesson-column table-without-border"></th>
					</tr>
					<?php
					$laboratoryIdx = 0;
					?>
					<?php foreach ($semesters as $semester): ?>
						<?php if (!empty($semester->modules)): ?>
							<?php foreach ($semester->modules as $module): ?>
								<tr id="laboratoryModule<?= htmlspecialchars($laboratoryIdx) ?>">
									<td class="lesson-number-column"></td>
									<th class="center-text-align">Модуль <?= htmlspecialchars($module->moduleNumber ?? '') ?> (Семестр <?= htmlspecialchars($semester->semesterNumber ?? '') ?>)</th>
									<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
										<td class="center-text-align disabled-cell"></td>
									<?php endforeach; ?>
									<td class="add-lesson-column table-without-border">
										<button
											class="btn new-lesson-btn"
											type="button"
											onclick="createNewLesson(
												<?= htmlspecialchars($module->id) ?>,
												<?= htmlspecialchars($laboratoryIdx++) ?>,
												'laboratory',
												<?= htmlspecialchars(json_encode($semester->educationalForms, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>,
												<?= htmlspecialchars(json_encode($educationalFormsInSemesters, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8') ?>
											)">
											Додати нову тему (мод. <?= htmlspecialchars($module->moduleNumber ?? '') ?>)
										</button>
									</td>
								</tr>
								<?php if (!empty($module->labs)): ?>
									<?php foreach ($module->labs as $lab): ?>
										<?php
										$educationalFormHours = [];

										if (!empty($lab->educationalFormHours)) {
											foreach ($lab->educationalFormHours as $form) {
												$educationalFormHours[$form->lessonFormName] = $form->hours;
											}
										}
										?>
										<tr id="lesson<?= htmlspecialchars($lab->lessonId) ?>">
											<td class="table-input-cell lesson-number-column center-text-align">
												<input
													type="number"
													name="lessonNumber"
													class="center-text-align"
													value="<?= htmlspecialchars($lab->lessonNumber ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($lab->lessonId) ?>)">
											</td>
											<td class="table-input-cell">
												<input
													type="text"
													name="name"
													value="<?= htmlspecialchars($lab->lessonName ?? '') ?>"
													oninput="updateLessonInfo(event, <?= htmlspecialchars($lab->lessonId) ?>)">
											</td>
											<?php foreach ($educationalFormsInSemesters as $colName => $name): ?>
												<?php
												$educationalFormId = null;

												if (!empty($semester->educationalForms)) {
													foreach ($semester->educationalForms as $form) {
														if ($form->colName === $colName) {
															$educationalFormId = $form->id;
														}
													}
												}
												?>
												<?php if (isset($educationalFormId)): ?>
													<td class="lesson-hours-column table-input-cell">
														<input
															type="number"
															min="1"
															class="center-text-align "
															value="<?= isset($educationalFormHours[$colName]) ? htmlspecialchars($educationalFormHours[$colName]) : "" ?>"
															oninput="updateHours(event, <?= htmlspecialchars($lab->lessonId) ?>, <?= htmlspecialchars($educationalFormId) ?>)">
													</td>
												<?php else: ?>
													<td class="center-text-align disabled-cell"></td>
												<?php endif; ?>
											<?php endforeach; ?>
											<td class="add-lesson-column table-without-border">
												<button
													class="btn remove-lesson-btn"
													type="button"
													onclick="openApproveDeletingModal('заняття', () => deleteLesson(event, <?= htmlspecialchars($lab->lessonId) ?>))">
													Видалити
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php else: ?>
		<p>Недостатньо даних, додайте принаймні один семестр.</p>
	<?php endif; ?>
</div>