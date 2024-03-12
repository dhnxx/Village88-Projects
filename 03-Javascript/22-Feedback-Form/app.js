const express = require("express");
const path = require("path");
const session = require("express-session");
const bodyParser = require("body-parser");
const app = express();


app.use(express.static(__dirname + "/static"));
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));

app.get("/", (request, response) => {
	response.render("index");
});

app.post("/result.php", (request, response) => {
	console.log("POST DATA:\n", request.body);
	response.render("result", { postData: request.body });
});

app.listen("4444", () => {
	console.log("localhost:4444");
});
