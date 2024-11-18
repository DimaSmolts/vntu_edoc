const createLabelWithInput = ({ labelText, inputType, inputName, value, eventListener }) => {
	const label = createElement({ elementName: "label" });

	const labelName = createElement({ elementName: "p", innerText: `${labelText}` });

	const input = createElement({
		elementName: "input",
		type: inputType,
		name: inputName,
		value,
		eventListenerType: 'input',
		eventListener
	});

	label.appendChild(labelName);
	label.appendChild(input);

	return label;
}