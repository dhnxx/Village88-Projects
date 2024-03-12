const express = require("express");
const app = express();
const server = app.listen("4444", () => {
	console.log("localhost:4444");
});
const io = require("socket.io")(server);

app.use(express.static(__dirname + "/static"));
app.set("view engine", "ejs");

app.get("/", (request, response) => {
	response.render("index");
});

let messages = [];
const guessWord = "socket";

function randomUnderscore(word) {
	// Ensure the word length is greater than 2 before replacing characters
	if (word.length <= 2) {
		return word; // Cannot replace characters if word length is 2 or less
	}

	// Choose two random indices to replace characters
	let index1 = Math.floor(Math.random() * word.length); // Random index between 0 and length - 1
	let index2 = Math.floor(Math.random() * word.length); // Random index between 0 and length - 1

	// Ensure both indices are unique
	while (index2 === index1) {
		index2 = Math.floor(Math.random() * word.length); // Random index between 0 and length - 1
	}

	// Replace characters at the chosen indices with underscores
	let wordWithUnderscores = "";
	for (let i = 0; i < word.length; i++) {
		if (i === index1 || i === index2) {
			wordWithUnderscores += "_";
		} else {
			wordWithUnderscores += word[i];
		}
	}

	return wordWithUnderscores;
}
const wordWithUnderscores = randomUnderscore(guessWord);

io.on("connection", function (socket) {
	// Send the word to be guessed with underscores

	socket.emit("guessWord", { guessWord: wordWithUnderscores });

	// Fetch all previous messages
	if (messages) {
		socket.emit("fetchMessages", { messages: messages });
	}

	// Add and verify message for the answer
	socket.on("message", function (data) {
		io.emit("updateMessage", { name: data.name, message: data.message });
		messages.push(data);

		if (data.message === guessWord) {
			io.emit("systemMessage", {
				message: `${data.name} won! "${guessWord}" is the exact word`,
			});
		}
	});
});
