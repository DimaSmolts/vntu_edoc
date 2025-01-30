const createNewListItem = (data) => {
	const list = document.getElementById('listBlock');

	const item = createElement({ elementName: "li", classList: ["wp-list-item"] });
	const itemContentContainer = createElement({ elementName: "div", classList: ["wp-list-item-content"] });

	const disciplineName = createElement({ elementName: "span", innerText: data.disciplineName });

	const specialtyNamesBlock = createElement({ elementName: "div", classList: ['specialties-names'] });

	if (data.specialtiesWithEducationalPrograms.length > 0) {
		data.specialtiesWithEducationalPrograms.forEach(specialtiesWithEducationalPrograms => {
			const block = createElement({ elementName: "span" });
			const specialtyName = createElement({
				elementName: "span",
				innerText: `${specialtiesWithEducationalPrograms.specialtyCode} ${specialtiesWithEducationalPrograms.specialtyName}. `
			});

			block.appendChild(specialtyName);

			specialtiesWithEducationalPrograms.educationalPrograms.forEach(educationalProgram => {
				const educationalProgramName = createElement({
					elementName: "span",
					innerText: `${educationalProgram.name} `
				});

				block.appendChild(educationalProgramName);
			});

			specialtyNamesBlock.appendChild(block);
		});
	}

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

	const deleteBtn = createElement({
		elementName: "button",
		classList: ["btn"],
		innerText: 'Видалити',
		eventListenerType: 'click',
		eventListener: (event) => {
			openApproveDeletingModal('робочу програму', () => deleteWP(event, data.id));
		}
	});

	itemContentContainer.appendChild(disciplineName);
	itemContentContainer.appendChild(specialtyNamesBlock);
	itemContentContainer.appendChild(academicYear);
	itemContentContainer.appendChild(createdAt);
	itemContentContainer.appendChild(editBtn);
	itemContentContainer.appendChild(duplicateBtn);
	itemContentContainer.appendChild(pdfBtn);
	itemContentContainer.appendChild(deleteBtn);

	item.appendChild(itemContentContainer);

	list.appendChild(item);
}