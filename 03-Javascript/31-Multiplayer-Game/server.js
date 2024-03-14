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
	socket.emit("initialDefenders", defenders);
	console.log(defenders);

	// place defender
	socket.on("clientPlacePlant", function (data) {
		for (let i = 0; i < defenders.length; i++) {
			if (defenders[i].x == data.x && defenders[i].y == data.y) {
				console.log("already placed");
				return;
			}
		}
		defenders.push({ x: data.x, y: data.y });
		io.emit("serverPlacePlant", { x: data.x, y: data.y });
	});

	//place enemy
	socket.on("clientPlaceEnemy", function (data) {
		io.emit("serverPlaceEnemy", { y: data.y });
	});
});
