console.log('hello')

function toggle_visibility() {
	console.log("hide")
	document.getElementById("regform").style.display = "none"
}

function show_regform() {
	event.preventDefault()

	console.log("new reg clicked")
	document.getElementById("regform").style.display = "block"
	document.getElementById("loginform").style.display = "none"

}

function show_loginform() {
	event.preventDefault()
	console.log("login clicked")
	document.getElementById("regform").style.display = "none"
	document.getElementById("loginform").style.display = "block"

}