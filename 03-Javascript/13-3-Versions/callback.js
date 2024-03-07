function emitRandomNumber(callback, attempts = 1, lastRandomNumber = 0) {
	//* Base case
	if (attempts > 10 || lastRandomNumber >= 80) {
		return;
	} else {
		setTimeout(() => {
			console.log(`Attempt #${attempts} EmitRandomNumber is called.`);
			console.log(`2 seconds have lapsed.`);
			lastRandomNumber = callback(attempts);
			console.log(`Random number generated is ${lastRandomNumber}`);
			console.log(`- - - - -`);
			emitRandomNumber(callback, attempts + 1, lastRandomNumber);
		}, 2000);
	}
}

emitRandomNumber((i) => {
	return Math.floor(Math.random() * 101);
});
