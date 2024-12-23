<div class="page-title-container">
	<?php if ($showReturnBtn): ?>
		<a class="btn to-list-btn" type="button" href="wplist">До списку</a>
	<?php endif; ?>
	<?php if ($isLoggedIn): ?>
		<button class="btn log-out-btn" type="button" onclick="logOut()">Вийти з акаунта</button>
	<?php endif; ?>
	<h2 class="page-title"><?= htmlspecialchars($title) ?></h2>
</div>