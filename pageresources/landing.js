// Reset cover
window.addEventListener("blur", () => {
	let cover = document.getElementById('cover');
	cover.classList.remove('hidden-cover');
	cover.style.display = '';
});

function hideCover() {
	let cover = document.getElementById('cover');
	cover.classList.add('hidden-cover');
	window.setTimeout(() => {cover.style.display = 'none'}, 500);
}

//window.addEventListener("focus", () => {
//	cover.classList.add('hidden-cover');
//});