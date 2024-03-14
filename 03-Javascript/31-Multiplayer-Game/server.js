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

let defenders = []; // keep track of all defenders

io.on("connection", function (socket) {
	// place all initial defenders
	io.emit("initialDefenders", defenders);

	// place defender
	socket.on("clientPlacePlant", function (data) {
		defenders.push({ x: data.x, y: data.y });
		io.emit("serverPlacePlant", { x: data.x, y: data.y });
	});

	//place enemy
	socket.on("clientPlaceEnemy", function (data) {
		io.emit("serverPlaceEnemy", { y: data.y });
	});
});
