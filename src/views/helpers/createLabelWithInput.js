const createLabelWithInput = ({ labelText, inputType, inputName, value, eventListener }) => {
	const label = document.createElement("label");
	const labelName = document.createElement("p");
	labelName.innerText = `${labelText}`;

	const input = document.createElement("input");
	input.type = inputType;
	input.name = inputName;
	input.value = value;
	input.addEventListener('input', eventListener);

	label.appendChild(labelName);
	label.appendChild(input);

	return label;
}