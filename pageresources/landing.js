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

function showList(element) {
	var el = element.parentElement.children[1];
	if(el.classList.contains("hidden-list")) el.classList.remove("hidden-list");
	else el.classList.add("hidden-list");
}

//window.addEventListener("focus", () => {
//	cover.classList.add('hidden-cover');
//});