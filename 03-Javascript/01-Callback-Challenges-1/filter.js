function filter(array, fun) {
	let result = [];
	let newArray = [];
	for (let i = 0; i < array.length; i++) {
		result[i] = fun(array[i]);
		if (result[i] === true) {
			newArray[newArray.length] = array[i];
		}
	}
	return newArray;
}
/*1*/
let result1 = filter([1, 2, 3, 4, 15], function (val) {
	return val < 10;
}); //this filters each value in the array and only allows values that are less than 10
console.log(result1); //this should log [1,2,3,4]

/*2*/
let result2 = filter([1, 2, 3, 4, 15], function (val) {
	return val < 3;
}); //only allows values that is less than 3
console.log(result2); //this should log [1,2]
