const addTheme = async(event, moduleId, btnId, themeId) => {
	event.preventDefault()

	const newThemeBlock = await addNewTheme(moduleId);

	const themesContainer = document.getElementById(themeId);
	const addThemeBtn = document.getElementById(btnId);

	themesContainer.insertBefore(newThemeBlock, addThemeBtn);
}

const addModule = async (event, semesterId, btnId, moduleId) => {
	event.preventDefault()

	const newModuleBlock = await addNewModule(semesterId);

	const modulesContainer = document.getElementById(moduleId);
	const addModuleBtn = document.getElementById(btnId);

	console.log({ event, newModuleBlock, modulesContainer, addModuleBtn })

	modulesContainer.insertBefore(newModuleBlock, addModuleBtn);
}