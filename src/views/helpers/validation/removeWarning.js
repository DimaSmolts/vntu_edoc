const removeWarning = ({
	targetElement = null,
	name,
	isParentElementHighlight = true,
	labelId = null
}) => {
	if (targetElement) {
		targetElement.classList.remove('not-valid-bg');
		if (isParentElementHighlight) {
			targetElement.parentNode.classList.remove('not-valid-bg');
		}
	}

	if (labelId) {
		const label = document.getElementById(labelId);

		label.classList.remove('not-valid-bg');
	}

	validationMap.delete(name);
}