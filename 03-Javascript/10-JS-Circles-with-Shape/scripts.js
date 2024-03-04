document.addEventListener("DOMContentLoaded", function () {
	class Shapes {
		container;
		currentColor;
		currentShape;
		colorList;
		shapeList;

		constructor(canvas) {
			this.container = canvas;
			this.colorList = document.getElementsByClassName("color-list");
			this.shapeList = document.getElementsByClassName("shape-list");
			this.currentColor = "green";
			this.currentShape = "square";
		}

		changeShape(shape, color) {
			this.currentShape = shape;
			let currentShapeIndicator = document.querySelector(`[data-shape=${shape}]`);
			for (let i = 0; i < this.shapeList.length; i++) {
				this.shapeList[i].classList.remove("red", "blue", "green", "selected");
			}
			if (shape === "triangle") {
				//
			} else {
				currentShapeIndicator.classList.add(color, "selected");
			}

			//! FIX TRIANGLE SHAPE
		}

		changeColor() {
			for (let i = 0; i < this.colorList.length; i++) {
				this.colorList[i].addEventListener("click", () => {
					for (let j = 0; j < this.colorList.length; j++) {
						this.colorList[j].classList.remove("selected");
					}
					this.colorList[i].classList.add("selected");
					this.currentColor = this.colorList[i].dataset.color;
					this.changeShape(this.currentShape, this.currentColor);
				});
			}
		}

		generateShape(x, y) {
			let shape = document.createElement("div");
			let size = Math.floor(Math.random() * 190 + 1) + 10;
			shape.style.width = size + "px";
			shape.style.height = size + "px";
			shape.style.top = y - size / 2 + "px";
			shape.style.left = x - size / 2 + "px";
			shape.style.position = "absolute";

			setTimeout(() => {
				shape.style.width = "0";
				shape.style.height = "0";
				shape.style.top = y + size / 2 + "px";
				shape.style.left = x + size / 2 + "px";
				setTimeout(() => {
					shape.remove();
				}, 1000);
			}, 1000);
			return shape;
		}
	}

	class Square extends Shapes {
		generateShape(x, y, canvas, obj) {
			let shape = super.generateShape(x, y);
			shape.classList.add("square", obj.currentColor);
			canvas.appendChild(shape);
		}
	}

	class Circle extends Shapes {
		generateShape(x, y, canvas, obj) {
			let shape = super.generateShape(x, y);
			shape.classList.add("circle", obj.currentColor);
			shape.style.borderRadius = "100px";
			canvas.appendChild(shape);
		}
	}

	class Triangle extends Shapes {
		generateShape(x, y, canvas, obj) {
			let shape = super.generateShape(x, y);
			let size = Math.floor(Math.random() * 190 + 1) + 10;

			shape.classList.add("triangle-" + obj.currentColor);
			shape.style.width = "0";
			shape.style.height = "0";
			shape.style.borderLeft = size / 2 + "px solid transparent";
			shape.style.borderRight = size / 2 + "px solid transparent";
			shape.style.borderBottom = size + "px solid " + obj.currentColor;

			canvas.appendChild(shape);
		}
	}

	// Instantiate the shape classes
	let square = new Square();
	let circle = new Circle();
	let triangle = new Triangle();

	// Instantiate the Shapes class and add color event listeners
	let canvas = document.getElementById("canvas");
	let obj1 = new Shapes(canvas);
	obj1.changeColor();

	function handleShapeClick(x, y) {
		// Instantiate the shape class based on the shape type
		if (obj1.currentShape === "square") {
			square.generateShape(x, y, canvas, obj1);
		} else if (obj1.currentShape === "circle") {
			circle.generateShape(x, y, canvas, obj1);
		} else if (obj1.currentShape === "triangle") {
			triangle.generateShape(x, y, canvas, obj1);
		}
	}

	// Get the shape list elements
	let shapeList = document.getElementsByClassName("shape-list");

	for (let i = 0; i < shapeList.length; i++) {
		// Get the shape type from the dataset attribute
		let shapeType = shapeList[i].dataset.shape;
		// Attach event listener for each shape element
		shapeList[i].addEventListener("click", function (event) {
			obj1.changeShape(shapeType, obj1.currentColor);
		});
	}

	canvas.addEventListener("click", function (event) {
		handleShapeClick(event.pageX, event.pageY);
	});
});
