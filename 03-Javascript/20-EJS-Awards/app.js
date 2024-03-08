const express = require("express");
const app = express();

// Serve static files from the "public" directory
app.use(express.static(__dirname + "/static"));

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");

app.get("/", function (request, response) {
	response.render("index");
});

app.get("/awards", function (request, response) {
	const awards = [
		{ name: "Javascript", imgsrc: "/images/js.png", link: "/javascript-exam" },
		{ name: "PHP", imgsrc: "/images/php.png", link: "/php-exam" },
		{ name: "HTML/CSS", imgsrc: "/images/htmlcss.png", link: "/htmlcss-exam" },
	];
	response.render("awards", { data: awards });
});

app.get("/javascript-exam", function (request, response) {
	const data = {
		name: "Javascript",
		imgsrc: "/images/js.png",
		date: "01/01/2024",
		technologies: ["NodeJs", "Socket", "MongoDB", "Express"],
		awarder: "Ma'am Karen",
	};
	response.render("details", { details: data });
});

app.get("/php-exam", function (request, response) {
	const data = {
		name: "PHP",
		imgsrc: "/images/php.png",
		date: "01/01/2024",
		technologies: ["PHP", "Codeigniter", "Ajax", "Jquery"],
		awarder: "Ma'am Karen",
	};
	response.render("details", { details: data });
});

app.get("/htmlcss-exam", function (request, response) {
	const data = {
		name: "HTML/CSS",
		imgsrc: "/images/htmlcss.png",
		date: "01/01/2024",
		technologies: ["HTML", "CSS", "LESS", "BOOTSTRAP"],
		awarder: "Ma'am Karen",
	};
	response.render("details", { details: data });
});

app.listen(8000, () => {
	console.log("Listening from localhost:8000");
});
