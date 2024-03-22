const express = require("express");
const app = express();
const server = app.listen(4444, () => {
	console.log("localhost:4444");
});
const io = require("socket.io")(server);

app.use(express.static(__dirname + "/static"));
app.set("view engine", "ejs");

app.get("/", (request, response) => {
	response.render("index");
});

let players = []; // store the players including self
let blocks = []; // store the blocks
let cursors = []; // store the cursors
io.on("connection", function (socket) {
	// players
	socket.emit("self", socket.id);
	
	function updatePlayers() {
		io.emit("updatePlayers", players);
	}

	function initBlocks() {
		io.emit("updateBlocks", blocks);
	}

	initBlocks();

	socket.on("newPlayer", function (playerName) {
		players.push({ id: socket.id, name: playerName });
		updatePlayers();
	});

	socket.on("disconnect", function () {
		players = players.filter((player) => player.id !== socket.id);
		updatePlayers();
	});

	// Send the cursor position to all other clients
	socket.on("cursor", function (data) {
		socket.broadcast.emit("newCursor", { id: socket.id, x: data.x, y: data.y });
	});

	// Send the block position to all other clients
	socket.on("block", function (data) {
		blocks.push(data);
		io.emit("newBlock", data);
	});

	// Reset block;
	socket.on("reset", function () {
		blocks = [];
		io.emit("resetCanvas");
	});
});
