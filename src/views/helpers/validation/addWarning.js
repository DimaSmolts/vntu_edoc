const addWarning = ({
	targetElement = null,
	group,
	name,
	message,
	isParentElementHighlight = true,
	slideNumber
}) => {
	if (targetElement) {
		targetElement.classList.add('not-valid-bg');
		if (isParentElementHighlight) {
			targetElement.parentNode.classList.add('not-valid-bg');
		}
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