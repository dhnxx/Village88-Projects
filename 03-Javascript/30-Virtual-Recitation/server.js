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

// io.on("connection", function (socket) {

// });
