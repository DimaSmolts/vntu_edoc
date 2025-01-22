const createNewListItem = (data) => {
	const list = document.getElementById('listBlock');

	const item = createElement({ elementName: "li", classList: ["wp-list-item"] });
	const itemContentContainer = createElement({ elementName: "div", classList: ["wp-list-item-content"] });

	const disciplineName = createElement({ elementName: "span", innerText: data.disciplineName });
	const specialtyName = createElement({ elementName: "span", innerText: data.specialtyName });
	const academicYear = createElement({ elementName: "span", innerText: data.academicYear, classList: ['academic-year'] });
	const createdAt = createElement({ elementName: "span", innerText: data.createdAt });

	const editBtn = createElement({
		elementName: "a",
		classList: ["btn"],
		innerText: 'Відредагувати',
		type: "button",
		href: `wpdetails?id=${data.id}`
	});

	const duplicateBtn = createElement({
		elementName: "button",
		classList: ["btn"],
		innerText: 'Дублювати',
		eventListenerType: 'click',
		eventListener: () => {
			duplicateWP(data.id);
		}
	});

	const pdfBtn = createElement({
		elementName: "a",
		classList: ["btn"],
		innerText: 'PDF',
		type: "button",
		href: `pdf?id=${data.id}`,
		target: "_blank"
	});

	itemContentContainer.appendChild(disciplineName);
	itemContentContainer.appendChild(specialtyName);
	itemContentContainer.appendChild(academicYear);
	itemContentContainer.appendChild(createdAt);
	itemContentContainer.appendChild(editBtn);
	itemContentContainer.appendChild(duplicateBtn);
	itemContentContainer.appendChild(pdfBtn);

	item.appendChild(itemContentContainer);

	list.appendChild(item);
}