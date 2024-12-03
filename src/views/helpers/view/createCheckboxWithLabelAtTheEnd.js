const createCheckboxWithLabelAtTheEnd = ({ labelText, inputName, value, eventListener }) => {
	const label = createElement({ elementName: "label" });

	const labelName = createElement({ elementName: "p", innerText: `${labelText}` });

	const checkbox = createElement({
		elementName: "input",
		type: 'checkbox',
		classList: ['checkbox'],
		name: inputName,
		value,
		eventListenerType: 'click',
		eventListener
	});

	label.appendChild(checkbox);
	label.appendChild(labelName);

	return label;
}