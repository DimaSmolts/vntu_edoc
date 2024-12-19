const createLabelWithInput = ({ labelText, inputType, inputName, value, eventListener, id, placeholder, labelId }) => {
	const label = createElement({ elementName: "label", id: labelId });

	const labelName = createElement({ elementName: "p", innerText: `${labelText}` });

	const input = createElement({
		elementName: "input",
		type: inputType,
		name: inputName,
		value,
		eventListenerType: 'input',
		eventListener,
		id,
		placeholder
	});

	label.appendChild(labelName);
	label.appendChild(input);

	return label;
}