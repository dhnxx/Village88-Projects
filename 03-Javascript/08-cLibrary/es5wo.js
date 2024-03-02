function Circles(num) {
	this.colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"];
	this.circleCount = num;

	// Randomize colors based on the color list
	this.randomizeColor = function () {
		return this.colors[Math.floor(Math.random() * this.colors.length)];
	};

	// Create and append to the container based on the attributes
	this.circleAttributes = function (color, canvas) {
		var circle = document.createElement("div");
		var size = Math.floor(Math.random() * 200 + 1) + 10;
		var x = Math.floor(Math.random() * (canvas.offsetWidth - 100));
		var y = Math.floor(Math.random() * (canvas.offsetHeight - 50));
		circle.classList.add("circle");

		circle.style.width = size + "px";
		circle.style.height = size + "px";
		circle.style.backgroundColor = color;
		circle.style.top = y - size / 2 + "px";
		circle.style.left = x - size / 2 + "px";
		circle.style.border = "2px solid black";

		canvas.appendChild(circle);

		// Shrinking animation
		setTimeout(function () {
			circle.style.width = "0";
			circle.style.height = "0";
			circle.style.top = y + size / 2 + "px"; // Adjusting top and left positions
			circle.style.left = x + size / 2 + "px";
			setTimeout(function () {
				circle.remove(); // Remove circle from DOM after animation
			}, 1000);
		}, 1000);
	};

	// Draw circle based on the given count
	this.draw_circles = function (canvasID) {
		var container = document.getElementById(canvasID);
		for (var i = 0; i < this.circleCount; i++) {
			this.circleAttributes(this.randomizeColor(), container);
		}
	};
}
