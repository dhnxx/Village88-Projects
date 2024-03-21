class Challenges {
	sum(a, b) {
		return a + b;
	}

	celciusToFahrenheit(cDegrees) {
		return (cDegrees * 9) / 5 + 32;
	}

	fibonacci(n) {
		if (n <= 1) {
			return 1;
		}
		return this.fibonacci(n - 1) + this.fibonacci(n - 2);
	}

	isCreditCardValid(digitArr) {
		let lastDigit = digitArr.pop();
		let sum = 0;

		for (let i = digitArr.length - 1; i >= 0; i--) {
			if (i % 2 != 0) {
				digitArr[i] *= 2;

				if (digitArr[i] > 9) {
					digitArr[i] -= 9;
				}
			}

			sum += digitArr[i];
		}

		sum += lastDigit;

		if (sum % 10 == 0) {
			return true;
		} else return false;
	}
	zipIt(arr1, arr2) {
		const totalArr = arr1.length + arr2.length - 1;
		let ans = [];

		for (let i = 0; i <= totalArr; i++) {
			if (i <= arr1.length - 1) {
				ans.push(arr1[i]);
			}

			if (i <= arr2.length - 1) {
				ans.push(arr2[i]);
			}
		}

		return ans;
	}
}

module.exports = Challenges;
