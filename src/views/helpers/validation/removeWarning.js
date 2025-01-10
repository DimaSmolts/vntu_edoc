const removeWarning = ({
	targetElement = null,
	targetElements = null,
	name,
	isParentElementHighlight = true
}) => {
	if (targetElement) {
		targetElement.classList.remove('not-valid-bg');
		if (isParentElementHighlight) {
			targetElement.parentNode.classList.remove('not-valid-bg');
		}
	}

	if (targetElements) {
		targetElements.forEach(element => {
			element.classList.remove('not-valid-bg');
			if (isParentElementHighlight) {
				element.parentNode.classList.remove('not-valid-bg');
			}
		});
	}

	validationMap.delete(name);
}