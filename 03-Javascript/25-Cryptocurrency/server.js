const express = require("express");
const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();
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

app.get("/", (request, response) => {
	response.render("index");
});

app.get("/request/:filter/:page", async function (request, response) {
	let data = {};
	await new Promise((resolve) => setTimeout(resolve, 5000));
	try {
		if (request.params.filter === "exchange") {
			if (request.params.page === "all") {
				let response = await axios.get(
					"https://api.coingecko.com/api/v3/exchanges?per_page=100&page=1"
				);
				data = response.data;
			} else {
				let response = await axios.get(
					"https://api.coingecko.com/api/v3/exchanges?per_page=15&page=" +
						request.params.page
				);
				data = response.data;
			}
		} else if (request.params.filter === "asset_platforms") {
			let response = await axios.get("https://api.coingecko.com/api/v3/asset_platforms");
			data = response.data;
		}

		console.log({ data });
		response.json(data); // Send data in the response
	} catch (error) {
		console.log(error);
	}
});

app.listen("4444", () => {
	console.log("localhost:4444");
});
