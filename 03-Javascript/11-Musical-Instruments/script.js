class Notes {
	constructor(name, pitch) {
		if (pitch < 1 || pitch > 7) {
			return console.log("Invalid pitch");
		}

		this.nameList = ["do", "re", "mi", "fa", "sol", "la", "ti"];
		this.name = name;
		this.pitch = Math.min(Math.max(pitch, 1), 7);
	}

	show() {
		console.log(this.name, this.pitch);
	}
}

class Instrument {
	constructor() {
		this.notes = [];
	}

	addNote(name, pitch) {
		return (this.notes[this.notes.length] = new Notes(name, pitch));
	}

	removeLastNote() {
		return this.notes.pop();
	}

	changeNote(pos, name, pitch) {
		if (pos < 0 || pos >= this.notes.length) {
			return console.log("Invalid position");
		}
		this.notes[pos] = new Notes(name, pitch);
	}

	shuffleRecord(notes) {
		let m = notes.length,
			t,
			i;
		while (m) {
			i = Math.floor(Math.random() * m--);
			t = notes[m];
			notes[m] = notes[i];
			notes[i] = t;
		}
		return notes;
	}

	autoCompose(num) {
		this.notes = [];
		for (let i = 0; i < num; i++) {
			this.notes[i] = new Notes(
				this.nameList[Math.floor(Math.random() * 7)],
				Math.floor(Math.random() * 7) + 1
			);
		}
		return this.notes;
	}

	show() {
		const mappedNotes = [];
		this.notes.forEach(function (note) {
			mappedNotes.push({ name: note.name, pitch: note.pitch });
		});
		console.log(mappedNotes);
	}
}

class Piano extends Instrument {
	constructor(brand, model, color) {
		super();
		this.brand = brand;
		this.model = model;
		this.color = color;
	}
}

// Testing
let instrument = new Instrument();
instrument.addNote("do", 1);
instrument.addNote("re", 2);
instrument.addNote("mi", 3);
instrument.addNote("fa", 4);
instrument.addNote("sol", 5);
instrument.addNote("la", 6);
instrument.addNote("ti", 7);
instrument.show();
instrument.removeLastNote();
instrument.show();
instrument.changeNote(0, "do", 2);
instrument.show();
instrument.changeNote(1, "do", 2);
instrument.changeNote(2, "do", 2);
instrument.show();

//! (EXTRA MILES) UI NOT IMPLEMENTED YET
