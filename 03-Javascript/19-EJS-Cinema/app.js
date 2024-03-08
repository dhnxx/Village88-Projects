const express = require("express");
const app = express();

// Serve static files from the "public" directory
app.use(express.static(__dirname + "/static"));

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");

app.get("/", function (request, response) {
	response.render("index");
});

app.get("/movies", function (request, response) {
	response.render("movies");
});

app.get("/theaters", function (request, response) {
	response.render("theaters");
});

app.get("/form", function (request, response) {
	response.render("form");
});

app.listen(8000, () => {});
