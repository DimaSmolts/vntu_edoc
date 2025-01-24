<div class="topic-title">
	17. Рекомендована література
</div>
<?php if (isset($details->literature->main)): ?>
	<div class="sub-topic-title">
		Основна
	</div>
	<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->main; ?></p>
<?php endif; ?>
<?php if (isset($details->literature->additional)): ?>
	<div class="sub-topic-title">
		Додаткова
	</div>
	<p class="inserted justify" style="width: 100%, font-size: 14pt;"><?= $details->literature->additional; ?></p>
<?php endif; ?>