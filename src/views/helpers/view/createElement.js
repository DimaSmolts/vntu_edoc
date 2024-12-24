const createElement = ({
	elementName,
	id,
	innerText,
	innerHTML,
	classList,
	type,
	name,
	value,
	rows,
	eventListenerType,
	eventListener,
	href,
	checked,
	style,
	placeholder,
	data
}) => {
	const element = document.createElement(elementName);

	if (id) {
		element.id = id;
	}

	if (innerText) {
		element.innerText = innerText;
	}

	if (innerHTML) {
		element.innerHTML = innerHTML;
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

	if (href) {
		element.href = href;
	}

	if (checked) {
		element.checked = checked;
	}

	if (style) {
		element.style = style;
	}

	if (placeholder) {
		element.placeholder = placeholder;
	}

	if (data) {
		Object.entries(data).forEach(([key, value]) => {
			element.dataset[key] = value;
		})
	}

	return element;
}