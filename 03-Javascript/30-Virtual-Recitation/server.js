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

let logs = [];
io.on("connection", function (socket) {
	io.emit("initial", { logs });
	socket.on("joined", function (data) {
		let storeData = { message: `Socket ID ${socket.id} is present.`, status: "join" };
		io.emit("message", storeData);
		logs.push(storeData);
	});
	socket.on("disconnect", () => {
		let storeData = { message: `Socket ID ${socket.id} left.`, status: "leave" };
		io.emit("message", storeData);
		logs.push(storeData);
	});
	socket.on("raise", () => {
		let storeData = { message: `Socket ID ${socket.id} raised hands 👋.`, status: "raise" };
		io.emit("message", storeData);
		logs.push(storeData);
	});
});
