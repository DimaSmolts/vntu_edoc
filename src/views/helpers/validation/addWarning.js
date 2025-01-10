const addWarning = ({
	targetElement = null,
	targetElements = null,
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

	if (targetElements) {
		targetElements.forEach(element => {
			element.classList.add('not-valid-bg');
			if (isParentElementHighlight) {
				element.parentNode.classList.add('not-valid-bg');
			}
		});
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