<div class="sessions-btns-container">
	<?php if (!$isLoggedIn): ?>
		<button class="btn" type="button" onclick="studentLogin()">Увійти як студент</button>
		<button class="btn" type="button" onclick="teacherLogin(682)">Увійти як викладач</button>
		<button class="btn" type="button" onclick="teacherLogin(2)">Увійти як викладач-адмін</button>
	<?php endif; ?>
</div>