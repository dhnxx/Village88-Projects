const express = require("express");
const app = express();

function firstPlusLength(arr) {
	let first = arr[0];
	let length = arr.length;
	let result = first + length;

	return result;
}

app.get("/", function (req, res) {
	let a = firstPlusLength([0, 1, 2, 3, 4]);
	let b = firstPlusLength([3, 0, 2, 5]);
	let c = firstPlusLength([-5, 0, 2, 5]);
	let d = firstPlusLength([1, 2]);

	// should print out 5, 7, -1, 3
	res.send("<h1>" + a + ", " + b + ", " + c + ", " + d + "</h1>");
});

app.listen(3000, function () {
	console.log("Server is running on port 3000");
});
