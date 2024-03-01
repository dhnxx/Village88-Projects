function Bike(price, maxSpeed) {
	this.price = price;
	this.maxSpeed = maxSpeed;
	this.miles = 0;

	this.displayInfo = function () {
		console.log("Bike Price:", this.price);
		console.log("Max Speed:", this.maxSpeed);
		console.log("Miles Driven:", this.miles);
	};

	this.drive = function () {
		console.log("Driving...");
		this.miles += 10;
	};

	this.reverse = function () {
		if (this.miles > 0) {
			console.log("Reversing...");
			this.miles -= 5;
		} else {
			console.log("Can't Reverse Anymore");
		}
	};
}

let bike1 = new Bike("100", "50");
bike1.displayInfo();
bike1.drive();
bike1.drive();
bike1.reverse();
bike1.reverse();
bike1.reverse();
bike1.displayInfo();
