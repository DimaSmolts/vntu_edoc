const removeWarning = ({ targetElement = null, name }) => {
	if (targetElement) {
		targetElement.classList.remove('not-valid-bg');
		targetElement.parentNode.classList.remove('not-valid-bg');
	}

	validationMap.delete(name);
}