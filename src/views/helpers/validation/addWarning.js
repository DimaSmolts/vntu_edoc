const addWarning = ({ targetElement = null, group, name, message }) => {
	if (targetElement) {
		targetElement.classList.add('not-valid-bg');
		targetElement.parentNode.classList.add('not-valid-bg');
	}

	if (!validationMap.get(name)) {
		validationMap.set(name, {
			group,
			message
		});
	}
}