document.addEventListener('DOMContentLoaded', function () {
	const hamburger = document.getElementById('hamburgerMenu');
	const body = document.body;

	hamburger.addEventListener('click', function () {
		this.classList.toggle('open');
		body.classList.toggle('small-screen');
	});
});
