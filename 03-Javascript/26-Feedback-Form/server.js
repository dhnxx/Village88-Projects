const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();
const server = app.listen("4444", () => {
	console.log("localhost:4444");
});
const io = require("socket.io")(server);
const axios = require("axios").default;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(__dirname + "/static"));
app.use(
	session({
		secret: "user",
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);

app.set("view engine", "ejs");

io.on("connection", function (socket) {
	//2

	// socket.emit("greeting", {
	// 	msg: "Greetings, from server Node, brought to you by Sockets! -Server",
	// }); //3
	// socket.on("thankyou", function (data) {
	// 	//7
	// 	console.log(data.msg); //8 (note: this log will be on your server's terminal)
	// });

	socket.on("posting_form", function (data) {
		const objPair = data.msg.split("&");
		const parsedData = {};
		objPair.forEach((element) => {
			const [key, value] = element.split("=");
			parsedData[key] = decodeURIComponent(value);
		});
		console.log(parsedData);
		socket.emit("updated_message", {
			msg: `You emitted the following values to the server: ${JSON.stringify(parsedData)}`,
			randomNumber: Math.floor(Math.random() * 1000) + 1,
		});
	});
});

app.get("/", (request, response) => {
	response.render("index");
});
