// Regular function declaration in ES5
function print_str1(str) {
	console.log(str);
}
print_str1("I love Javascript!!!");

// Function expression in ES5
var print_str2 = function (str) {
	console.log(str);
};
print_str2("I love Javascript!!!");

// Arrow function in ES6
const print_str3 = (str) => {
	console.log(str);
};
print_str3("I love Javascript!!!");

// Method inside an object in ES5
var obj = {
	print: function (str) {
		console.log(str);
	},
};
obj.print("I love Javascript!!!");

// Method inside an object in ES6
const obj2 = {
	print(str) {
		console.log(str);
	},
};
obj2.print("I love Javascript!!!");

// Closure in ES5
function print_str4() {
	return function (str) {
		console.log(str);
	};
}
var print4 = print_str4();
print4("I love Javascript!!!");

// Immediate function in ES5
(function (str) {
	console.log(str);
})("I love Javascript!!!");

// Prototype in ES5
function Print() {}
Print.prototype.print = function (str) {
	console.log(str);
};
var printer = new Print();
printer.print("I love Javascript!!!");

// Callback function in ES5
function print5(str, callback) {
	callback(str);
}
function printToConsole(str) {
	console.log(str);
}
print5("I love Javascript!!!", printToConsole);
