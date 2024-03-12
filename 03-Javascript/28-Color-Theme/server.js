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

let color;

// Random Color
function randomColor() {
	const rgb = ["a", "b", "c", "d", "e", "f", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
	color = "#"; //this is what we'll return!
	for (
		let i = 0;
		i < 6;
		i++ // 6 is total number of characters in hex
	) {
		let x = Math.floor(Math.random() * 16); // 16 for hex
		color += rgb[x];
	}
	return color;
}

function updateColor(color) {
	io.emit("backgroundColor", { bgColor: color });
}

const events = [
	{ name: "lightMode", color: "#EDEDED" },
	{ name: "randomMode" },
	{ name: "darkMode", color: "#454545" },
];

io.on("connection", function (socket) {
	// Initial Connection
	updateColor(color);

	events.forEach((event) => {
		socket.on(event.name, (data) => {
			event.name === "randomMode" ? (color = randomColor()) : (color = event.color);
			updateColor(color);
		});
	});
});
