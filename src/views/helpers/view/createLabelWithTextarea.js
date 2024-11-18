const createLabelWithTextarea = ({ labelText, rows = 10, inputName, value, eventListener }) => {
	const label = createElement({ elementName: "label" });

	const labelName = createElement({ elementName: "p", innerText: `${labelText}` });

	const textarea = createElement({
		elementName: "textarea",
		rows,
		name: inputName,
		value,
		eventListenerType: 'input',
		eventListener
	});

	label.appendChild(labelName);
	label.appendChild(textarea);

	return label;
}