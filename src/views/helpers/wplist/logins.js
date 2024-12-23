const studentLogin = async () => {
	await fetch('api/studentLogin', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(window.location.href = "wplist");
}

const teacherLogin = async (id) => {
	await fetch(`api/teacherLogin/?id=${id}`, {
		method: 'GET',
		headers: {       
			'Content-Type': 'application/json'
		}
	})
		.then(window.location.href = "wplist");
}

const logOut = async () => {
	await fetch('api/logOut', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(window.location.href = "wplist");
}