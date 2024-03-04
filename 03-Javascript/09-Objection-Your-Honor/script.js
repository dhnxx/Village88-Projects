class Person {
	#name;
	#age;
	constructor(name, age) {
		this.#name = name;
		this.#age = age;
	}
	getName() {
		return this.#name;
	}

	getAge() {
		return this.#age;
	}
}

class TrialCourt {
	static initiateTrial(defendant, prosecutor) {
		console.log("Name: " + defendant.getName());
		console.log("Age: " + defendant.getAge() + " years old");
		console.log("Case Title: " + defendant.caseAssigned.getCaseTitle());
		console.log("Filed by " + prosecutor.getName());
		let verdict = TrialCourt.getVerdict(
			defendant.getAge(),
			defendant.caseAssigned.getMinMaxAge()
		);
		console.log("Verdict: " + verdict);
		if (verdict) {
			console.log("Release Date: " + case1.computeReleaseDate());
		}
	}

	static getVerdict(defendantAge, minMax) {
		if (defendantAge >= minMax.minValue && defendantAge <= minMax.maxValue) {
			return "GUILTY";
		} else {
			return "NOT GUILTY";
		}
	}
}

class Prosecutor extends Person {
	constructor(name, age) {
		super(name, age);
	}

	prosecute(defendant, caseTitle) {
		defendant.caseAssigned = caseTitle;
	}
}

class Defendant extends Person {
	caseAssigned;
	constructor(name, age) {
		super(name, age);
	}
}

class Case {
	#title;
	#years;
	#months;
	#days;
	minAge;
	maxAge;
	#month = [
		"January",
		"February",
		"March",
		"April",
		"May",
		"June",
		"July",
		"August",
		"September",
		"October",
		"November",
		"December",
	];
	constructor(title, years, months, days, minAge, maxAge) {
		this.#title = title;
		this.#years = years;
		this.#months = months;
		this.#days = days;
		this.minAge = minAge;
		this.maxAge = maxAge;
	}

	computeReleaseDate() {
		// let releaseDate = new Date(); //! Current Day
		let releaseDate = new Date(2020,11,17); //! Assume date is December 17, 2020
		releaseDate.setFullYear(releaseDate.getFullYear() + this.#years);
		releaseDate.setMonth(releaseDate.getMonth() + this.#months);
		releaseDate.setDate(releaseDate.getDate() + this.#days);
		return (
			releaseDate.getDate() +
			" " +
			this.#month[releaseDate.getMonth()] +
			" " +
			releaseDate.getFullYear()
		);
	}

	getCaseTitle() {
		return this.#title;
	}

	getMinMaxAge() {
		return { minValue: this.minAge, maxValue: this.maxAge };
	}
}

// // let’s say the imprisonment term for this case is 3 years, 3 months, 3 days
// // and the age of someone who can be convicted is between 18 to 75 years old.
// let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
// let prosecutor = new Prosecutor ("John", 30);
// let defendant1 = new Defendant ("Girlie", 5);

// prosecutor.prosecute(defendant1, case1);

// TrialCourt.initiateTrial(defendant1, prosecutor);
// /*
//     Name: Girlie
//     Age: 5 years old
//     Case Title: Malicious Mischief
//     Filed by: John
//     Verdict: NOT GUILTY
// */

// let’s say imprisonment term for this case is 3 years, 3 months, 3 days
// and the age of someone who can be convicted is between 18 to 75 years old.
let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
let prosecutor = new Prosecutor("John", 30);
let defendant2 = new Defendant("Onel", 25);

prosecutor.prosecute(defendant2, case1);
// let’s say today is December 17, 2020
TrialCourt.initiateTrial(defendant2, prosecutor);
//    Name: Onel
//    Age: 25 years old
//    Case Title: Malicious Mischief
//    Filed by: John
//    Verdict: GUILTY
//    Release date:  21 March 2024
