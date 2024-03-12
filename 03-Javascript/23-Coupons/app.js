const express = require("express");
const path = require("path");
const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();

app.use(express.static(__dirname + "/static"));
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));

app.use(
	session({
		secret: "coupon",
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);

app.get("/", (request, response) => {
	let data = {};
	if (request.session["name"] || request.session["count"]) {
		data = {
			name: request.session["name"],
			count: request.session["count"],
			randomNumber: request.session["randomNumber"],
		};
	}

	response.render("index", { data: data });
});

app.post("/coupon", (request, response) => {
	const randomSevenDigits = Math.floor(1000000 + Math.random() * 9000000);
	if (!request.session["name"] || !request.session["count"]) {
		request.session["name"] = "";
		request.session["count"] = 10;
		request.session["randomNumber"] = randomSevenDigits;
	}
	// If user name is submitted
	if (request.body.user_name) {
		request.session["name"] = request.body.user_name;
	}

	// If reset button is submitted/clicked
	if (request.body.reset) {
		console.log("reset clicked");
		request.session.destroy();
	}

	// If claim button is submitted/clicked
	if (request.body.claim) {
		console.log("claim clicked");
		request.session["count"] -= 1;
		request.session["randomNumber"] = randomSevenDigits;
		console.log("claimed coupon, count:", request.session["count"]);
	}

	response.redirect("/");
});

app.listen("4444", () => {
	console.log("localhost:4444");
});
