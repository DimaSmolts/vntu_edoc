const createCheckboxWithLabelAtTheBeginning = ({ labelText, inputName, checked, eventListener }) => {
	const label = createElement({ elementName: "label" });

	const labelName = createElement({ elementName: "p", innerText: `${labelText}` });

	const checkbox = createElement({
		elementName: "input",
		type: 'checkbox',
		classList: ['label-with-checkbox'],
		name: inputName,
		checked,
		eventListenerType: 'click',
		eventListener
	});

	label.appendChild(labelName);
	label.appendChild(checkbox);

	return label;
}