let assert = require("assert");
let challenges = require("./challenges.cjs");
challenges = new challenges();
describe("Return Sum", function () {
	it("should return the sum of two numbers", function () {
		assert.equal(challenges.sum(1, 2), 3);
	});
});
describe("Convert Celcius to Fahrenheit", function () {
	it("should return the Fahrenheit equivalent of a Celcius temperature", function () {
		assert.equal(challenges.celciusToFahrenheit(100), 212);
	});
});
describe("Fibonacci", function () {
	it("should return the nth number in the Fibonacci sequence", function () {
		assert.equal(challenges.fibonacci(6), 13);
	});
});
describe("Validate Credit Card", function () {
	it("should return true if the credit card number is valid", function () {
		assert.equal(challenges.isCreditCardValid([5, 2, 2, 8, 2]), true);
	});
});
describe("Zip It", function () {
	it("should return an array with alternating elements from the two arrays", function () {
		//used with deepEqual because the arrays are compared by reference
		assert.deepEqual(challenges.zipIt([1, 2, 3, 4], [10, 20]), [1, 10, 2, 20, 3, 4]);
	});
});
