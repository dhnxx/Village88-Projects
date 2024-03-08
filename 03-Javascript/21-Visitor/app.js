const express = require("express");
const path = require("path");
const session = require("express-session");
const app = express();

//* Session

app.use(
	session({
		secret: "test",
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);

app.use(express.static(__dirname + "/static"));
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");

app.get("/", (request, response) => {
	if (!request.session.name) {
		request.session.name = { number: 0, quote: "" };
	}
	request.session.name["number"] += 1;
	if (request.session.name["number"] % 2 === 0) {
		request.session.name["quote"] = "Even flowers need rain";
	} else {
		request.session.name["quote"] = "Beat the odds";
	}
	const data = request.session.name;

	response.render("main", { data: data });
});

app.get("/reset", (request, response) => {
	request.session.name["number"] = 0;
	response.redirect("/");
});

app.get("/repeat", (request, response) => {
	request.session.name["number"] -=1
	response.redirect("/");
});

app.listen(4444, () => {
	console.log("localhost:4444");
});
