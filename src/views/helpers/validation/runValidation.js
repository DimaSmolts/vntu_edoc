const runValidation = ({ selfworkData }) => {
	console.log(selfworkData);

	selfworkData.forEach(semester => {
		if (semester.selfworks.length > 0) {
			semester.selfworks.forEach((selfwork) => {
				if (semester.educationalForms.length > 0) {
					semester.educationalForms.forEach(educationalForm => {
						let selfworkHours;

						const selfworkInput = document.getElementById(`selfwork${selfwork.lessonId}InputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`);

						if (selfwork?.educationalFormHours) {
							Object.values(selfwork.educationalFormHours).forEach(educationalFormHours => {
								if (educationalFormHours.lessonFormName === educationalForm.colName) {
									selfworkHours = educationalFormHours.hours;
								}
							})
						}

						validateSelfworkHours({
							element: selfworkInput,
							value: selfworkHours ?? 0,
							educationalFormId: educationalForm.educationalFormId,
							semesterId: semester.semesterId,
							semesterNumber: semester.semesterNumber
						})
					})
				}
			})
		}

		if (semester.educationalForms.length > 0) {
			semester.educationalForms.forEach(educationalForm => {
				let lectionHours, laboratoryHours, practicalHours, seminarHours;

				const lectionInput = document.getElementById(`lectionInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`)

				if (semester?.lectionSelfworkTask?.educationalFormHours) {
					Object.values(semester.lectionSelfworkTask.educationalFormHours).forEach(educationalFormHours => {
						if (educationalFormHours.educationalFormName === educationalForm.colName) {
							lectionHours = educationalFormHours.hours;
						}
					})
				}

				validateLessonSelfworkHours({
					element: lectionInput,
					value: lectionHours ?? 0,
					lessonHours: semester.totalHoursForLections[educationalForm.colName],
					lessonTypeId: getLessonTypeIdByName('lection'),
					educationalFormId: educationalForm.educationalFormId,
					semesterId: semester.semesterId,
					semesterNumber: semester.semesterNumber
				})

				const laboratoryInput = document.getElementById(`laboratoryInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`)

				if (semester?.labSelfworkTask?.educationalFormHours) {
					Object.values(semester.labSelfworkTask.educationalFormHours).forEach(educationalFormHours => {
						if (educationalFormHours.educationalFormName === educationalForm.colName) {
							laboratoryHours = educationalFormHours.hours;
						}
					})
				}

				validateLessonSelfworkHours({
					element: laboratoryInput,
					value: laboratoryHours ?? 0,
					lessonHours: semester.labsAmount,
					lessonTypeId: getLessonTypeIdByName('laboratory'),
					educationalFormId: educationalForm.educationalFormId,
					semesterId: semester.semesterId,
					semesterNumber: semester.semesterNumber
				})

				const practicalInput = document.getElementById(`practicalInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`)

				if (semester?.practicalSelfworkTask?.educationalFormHours) {
					Object.values(semester.practicalSelfworkTask.educationalFormHours).forEach(educationalFormHours => {
						if (educationalFormHours.educationalFormName === educationalForm.colName) {
							practicalHours = educationalFormHours.hours;
						}
					})
				}

				validateLessonSelfworkHours({
					element: practicalInput,
					value: practicalHours ?? 0,
					lessonHours: semester.practicalsAmount,
					lessonTypeId: getLessonTypeIdByName('practical'),
					educationalFormId: educationalForm.educationalFormId,
					semesterId: semester.semesterId,
					semesterNumber: semester.semesterNumber
				})

				const seminarInput = document.getElementById(`seminarInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`)

				if (semester?.seminarSelfworkTask?.educationalFormHours) {
					Object.values(semester.seminarSelfworkTask.educationalFormHours).forEach(educationalFormHours => {
						if (educationalFormHours.educationalFormName === educationalForm.colName) {
							seminarHours = educationalFormHours.hours;
						}
					})
				}

				validateLessonSelfworkHours({
					element: seminarInput,
					value: seminarHours ?? 0,
					lessonHours: semester.seminarsAmount,
					lessonTypeId: getLessonTypeIdByName('seminar'),
					educationalFormId: educationalForm.educationalFormId,
					semesterId: semester.semesterId,
					semesterNumber: semester.semesterNumber
				})
			})
		}

		if (semester.additionalTasks.length > 0) {
			if (semester.educationalForms.length > 0) {
				semester.educationalForms.forEach(educationalForm => {
					let additionalTaskHours;

					const additionalTaskInput = document.getElementById(`additionalTaskInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`);

					if (semester?.additionalTasks[0]?.educationalFormHours) {
						Object.values(semester.additionalTasks[0].educationalFormHours).forEach(educationalFormHours => {
							if (educationalFormHours.educationalFormName === educationalForm.colName) {
								additionalTaskHours = educationalFormHours.hours;
							}
						})
					}

					validateAdditionalTasksSelfworkHours({
						element: additionalTaskInput,
						value: additionalTaskHours ?? 0,
						educationalFormId: educationalForm.educationalFormId,
						semesterId: semester.semesterId,
						semesterNumber: semester.semesterNumber,
						tasksAmount: semester.additionalTasks.length
					})
				})
			}
		}

		if (semester.isCalculationAndGraphicWorkExists) {
			if (semester.educationalForms.length > 0) {
				semester.educationalForms.forEach(educationalForm => {
					let calculationAndGraphicTypeTaskHours;

					const calculationAndGraphicTypeTaskInput = document.getElementById(`calculationAndGraphicTypeTaskInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`);

					if (semester?.calculationAndGraphicTypeTask?.educationalFormHours) {
						Object.values(semester.calculationAndGraphicTypeTask.educationalFormHours).forEach(educationalFormHours => {
							if (educationalFormHours.educationalFormName === educationalForm.colName) {
								calculationAndGraphicTypeTaskHours = educationalFormHours.hours;
							}
						})
					}

					calculationAndGraphicTypeTaskSelfworkHours({
						element: calculationAndGraphicTypeTaskInput,
						value: calculationAndGraphicTypeTaskHours ?? 0,
						educationalFormId: educationalForm.educationalFormId,
						semesterId: semester.semesterId,
						semesterNumber: semester.semesterNumber
					})
				})
			}
		}

		if (semester.isCalculationAndGraphiTaskExists) {
			if (semester.educationalForms.length > 0) {
				semester.educationalForms.forEach(educationalForm => {
					let calculationAndGraphicTypeTaskHours;

					const calculationAndGraphicTypeTaskInput = document.getElementById(`calculationAndGraphicTypeTaskInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`);

					if (semester?.calculationAndGraphicTypeTask?.educationalFormHours) {
						Object.values(semester.calculationAndGraphicTypeTask.educationalFormHours).forEach(educationalFormHours => {
							if (educationalFormHours.educationalFormName === educationalForm.colName) {
								calculationAndGraphicTypeTaskHours = educationalFormHours.hours;
							}
						})
					}

					calculationAndGraphicTypeTaskSelfworkHours({
						element: calculationAndGraphicTypeTaskInput,
						value: calculationAndGraphicTypeTaskHours ?? 0,
						educationalFormId: educationalForm.educationalFormId,
						semesterId: semester.semesterId,
						semesterNumber: semester.semesterNumber
					})
				})
			}
		}

		if (semester.colloquiumAmount > 0 || semester.controlWorkAmount > 0) {
			if (semester.educationalForms.length > 0) {
				semester.educationalForms.forEach(educationalForm => {
					let moduleControlHours;

					const moduleControlInput = document.getElementById(`moduleControlInputEF${educationalForm.educationalFormId}Sem${semester.semesterId}`);

					if (semester?.moduleTask?.educationalFormHours) {
						Object.values(semester.moduleTask.educationalFormHours).forEach(educationalFormHours => {
							if (educationalFormHours.educationalFormName === educationalForm.colName) {
								moduleControlHours = educationalFormHours.hours;
							}
						})
					}

					validateModuleControlSelfworkHours({
						element: moduleControlInput,
						value: moduleControlHours ?? 0,
						educationalFormId: educationalForm.educationalFormId,
						semesterId: semester.semesterId,
						semesterNumber: semester.semesterNumber,
						moduleControlAmount: semester.colloquiumAmount + semester.controlWorkAmount
					})
				})
			}
		}
	});

	dispatchValidationWarningsChange();

	// validateLessonSelfworkHours({
	// 	event,
	// 	lessonHours,
	// 	lessonTypeId,
	// 	educationalFormId,
	// 	semesterNumber,
	// })
}