class Bike {
	#price;
	#maxSpeed;
	#miles = 0;

	constructor(price, maxSpeed) {
		this.#price = price;
		this.#maxSpeed = maxSpeed;
	}

	displayInfo() {
		console.log("Bike Price:", this.#price);
		console.log("Max Speed:", this.#maxSpeed);
		console.log("Miles Driven:", this.#miles);
	}

	drive() {
		console.log("Driving...");
		this.#miles += 10;
	}

	reverse() {
		if (this.#miles > 0) {
			console.log("Reversing...");
			this.#miles -= 5;
		} else {
			console.log("Can't Reverse Anymore");
		}
	}
}

let bike1 = new Bike("100", "50");
bike1.displayInfo();
bike1.drive();
bike1.drive();
bike1.reverse();
bike1.reverse();
bike1.reverse();
bike1.displayInfo();
