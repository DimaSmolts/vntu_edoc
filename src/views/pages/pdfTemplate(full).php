<!-- Додаємо титулку як окрему сторінку -->
<?php include __DIR__ . '/../components/pdfTemplate/titlePage.php'; ?>

<!-- Додаємо окрему сторінку з таблицею з посадами, іменами та підписами всіх хто розробив, схвалив та затвердив -->
<?php include __DIR__ . '/../components/pdfTemplate/approvedPage.php'; ?>

<!-- Додаємо окрему сторінку з описом навчальної дисципліни -->
<?php include __DIR__ . '/../components/pdfTemplate/educationalDisciplineDescriptionPage.php'; ?>

<!-- Всі наступні розділи будуть переноситись на наступну сторінку за потреби -->
<page backtop="20mm" backbottom="25mm" backleft="25mm" backright="10mm">
	<div class="empty"></div>
	<div class="topic-title">
		2. Передумови для вивчення дисципліни
	</div>
	<p class="indent inserted justify"><?= htmlspecialchars($details->prerequisites) ?></p>

	<div class="empty"></div>
	<div class="topic-title">
		3. Мета та завдання навчальної дисципліни
	</div>
	<p class="indent inserted justify"><?= htmlspecialchars($details->goal) ?></p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->tasks) ?></p>
	<p class="indent bold">Компетентності, якими повинен оволодіти здобувач в результаті вивчення дисципліни:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->competences) ?></p>
	<p class="indent bold">Програмні результати:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->programResults) ?></p>
	<p class="indent bold">Контрольні заходи:</p>
	<p class="indent inserted justify"><?= htmlspecialchars($details->controlMeasures) ?></p>

	<!-- Додаємо розділ 4. Програма навчальної дисципліни -->
	<?php include __DIR__ . '/../components/pdfTemplate/educationalDisciplineProgramTopic.php'; ?>

	<!-- Додаємо розділ 5. Структура навчальної дисципліни -->
	<?php include __DIR__ . '/../components/pdfTemplate/educationalDisciplineStructureTopic.php'; ?>

	<!-- Додаємо розділи 6-9 з описом всіх типів занять -->
	<?php include __DIR__ . '/../components/pdfTemplate/lessonsStructureTopics.php'; ?>

	<div class="empty"></div>
	<div class="topic-title">
		10. Індивідуальні завдання
	</div>
	<p class="indent inserted justify"><?= isset($details->individualTaskNotes) ? htmlspecialchars($details->individualTaskNotes) : "" ?></p>

	<div class="empty"></div>
	<div class="topic-title">
		11. Методи навчання
	</div>
	<p class="indent inserted justify"><?= isset($details->studingMethods) ? htmlspecialchars($details->studingMethods) : '' ?></p>

	<div class="empty"></div>
	<div class="topic-title">
		12. Методи контролю
	</div>
	<p class="indent inserted justify"><?= isset($details->examingMethods) ? htmlspecialchars($details->examingMethods) : '' ?></p>

	<!-- Додаємо розділ 13. Розподіл балів, які отримують студенти -->
	<?php include __DIR__ . '/../components/pdfTemplate/pointsDistributionTopic.php'; ?>

	<div class="empty"></div>
	<div class="topic-title">
		14. Методичне забезпечення
	</div>
	<p class="indent inserted justify"><?= isset($details->methodologicalSupport) ? htmlspecialchars($details->methodologicalSupport) : '' ?></p>

	<!-- Додаємо розділ 15. Критерії оцінювання знань, умінь та навичок здобувачів вищої освіти -->
	<?php include __DIR__ . '/../components/pdfTemplate/assessmentCriteriaTopic.php'; ?>

	<div class="empty"></div>
	<div class="topic-title">
		16. Академічні права та обов’язки
	</div>
	<p class="indent inserted justify"><?= isset($details->globalData->academicRightsAndResponsibilities) ? htmlspecialchars($details->globalData->academicRightsAndResponsibilities) : '' ?></p>

	<div class="empty"></div>
	<div class="topic-title">
		17. Рекомендована література
	</div>
	<?php if (isset($details->literature->main)): ?>
		<div class="sub-topic-title">
			Основна
		</div>
		<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->main; ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->supporting)): ?>
		<div class="sub-topic-title">
			Допоміжна
		</div>
		<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->supporting; ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->additional)): ?>
		<div class="sub-topic-title">
			Додаткова
		</div>
		<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->additional; ?></p>
	<?php endif; ?>
	<?php if (isset($details->literature->informationResources)): ?>
		<div class="sub-topic-title">
			Інформаційні ресурси
		</div>
		<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->informationResources; ?></p>
	<?php endif; ?>
</page>