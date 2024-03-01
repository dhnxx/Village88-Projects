function $query(tag) {
	const elements = document.querySelectorAll(tag);

	const methods = {
		click: function (callback) {
			for (let i = 0; i < elements.length; i++) {
				elements[i].addEventListener("click", callback);
			}
		},
		hide: function () {
			for (let i = 0; i < elements.length; i++) {
				elements[i].style.display = "none";
			}
		},
		show: function () {
			for (let i = 0; i < elements.length; i++) {
				elements[i].style.display = "block";
			}
		},
	};

	return methods;
}


