const express = require("express");
const path = require("path");

const app = express();

// Serve static files from the "public" directory
app.use(express.static(__dirname + "/static"));


app.get("/", function (request, response) {
	response.end("THIS IS THE INDEX");
});

app.get("/movies.html", function (request, response) {
	response.end();
});

app.get("/theaters.html", function (request, response) {
	response.end();
});

app.get("/form.html", function (request, response) {
	response.end();
});

app.listen(8000, () => {});
