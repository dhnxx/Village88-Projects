class StringModule {
	concat(word1, word2) {
		console.log(word1 + word2);
		return word1 + word2;
	}

	repeat(word, times) {
		let result = "";
		for (let i = 0; i < times; i++) {
			result += word;
		}
		console.log(result);
		return result;
	}

	toString(input) {
		let result = input.toString();
		console.log(result, typeof result);
	}

	charAt(word, index) {
		console.log(word[index]);
		return word;
	}
}

module.exports = StringModule;
