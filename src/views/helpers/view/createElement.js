const createElement = ({
	elementName,
	id,
	innerText,
	classList,
	type,
	name,
	value,
	rows,
	eventListenerType,
	eventListener
}) => {
	const element = document.createElement(elementName);

	if (id) {
		element.id = id;
	}

	if (innerText) {
		element.innerText = innerText;
	}

	if (classList && classList.length !== 0) {
		classList.forEach(className => {
			element.classList.add(className);
		});
	}

	if (type) {
		element.type = type;
	}

	if (name) {
		element.name = name;
	}

	if (value) {
		element.value = value;
	}

	if (rows) {
		element.rows = rows;
	}

	if (eventListenerType && eventListener) {
		element.addEventListener(eventListenerType, eventListener);
	}

	return element;
}