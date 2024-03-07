async function emitRandomNumber(attempts = 1, previousRandomNumber = 0) {
	try {
		if (attempts > 10 || previousRandomNumber >= 80) {
			throw "END OF PROGRAM";
		} else {
			await new Promise((resolve) => setTimeout(resolve, 2000));
			console.log(`Attempt #${attempts}. emitRandomNumber is called.`);
			console.log(`2 seconds have lapsed.`);
			const randomNumber = Math.floor(Math.random() * 101);
			console.log(`Random number generated is ${randomNumber}.`);
			console.log(`- - - - -`);
			if (randomNumber >= 80) {
				return randomNumber;
			} else {
				return await emitRandomNumber(attempts + 1, randomNumber);
			}
		}
	} catch (error) {
		throw error;
	}
}

async function doEmit() {
	try {
		const randomNumber = await emitRandomNumber();
		console.log(`Random number generated successfully: ${randomNumber}`);
	} catch (error) {
		// DO NOTHING
	}
}

doEmit();
