const createNewListItem = (data) => {
	const list = document.getElementById('listBlock');

	const item = createElement({ elementName: "li", classList: ["wp-list-item"] });
	const itemContentContainer = createElement({ elementName: "div", classList: ["wp-list-item-content"] });

	const disciplineName = createElement({ elementName: "b", innerText: data.disciplineName });

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

	itemContentContainer.appendChild(disciplineName);
	itemContentContainer.appendChild(createdAt);
	itemContentContainer.appendChild(editBtn);
	itemContentContainer.appendChild(duplicateBtn);

	item.appendChild(itemContentContainer);

	list.appendChild(item);
}