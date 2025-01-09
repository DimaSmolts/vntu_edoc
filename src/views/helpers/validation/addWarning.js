const addWarning = ({
	targetElement = null,
	group,
	name,
	message,
	isParentElementHighlight = true,
	labelId = null,
	slideNumber
}) => {
	if (targetElement) {
		targetElement.classList.add('not-valid-bg');
		if (isParentElementHighlight) {
			targetElement.parentNode.classList.add('not-valid-bg');
		}
	}

	if (labelId) {
		const label = document.getElementById(labelId);

		label.classList.add('not-valid-bg');
	}

	if (!validationMap.get(name)) {
		validationMap.set(name, {
			group,
			message,
			slideNumber,
			targetElement
		});
	}
}