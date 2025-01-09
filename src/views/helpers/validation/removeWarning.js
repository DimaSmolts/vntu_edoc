const removeWarning = ({
	targetElement = null,
	name,
	isParentElementHighlight = true
}) => {
	if (targetElement) {
		targetElement.classList.remove('not-valid-bg');
		if (isParentElementHighlight) {
			targetElement.parentNode.classList.remove('not-valid-bg');
		}
	}

	validationMap.delete(name);
}