// get the http module:
const http = require("http");
// fs module allows us to read and write content for responses!!
const fs = require("fs");
// creating a server using http module:
const server = http.createServer(function (request, response) {
	// see what URL the clients are requesting:
	console.log("client request URL: ", request.url);
	// this is how we do routing:
	if (request.url === "/") {
		fs.readFile("views/movies.html", "utf8", function (errors, contents) {
			response.writeHead(200, { "Content-Type": "text/html" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/stylesheets/style.css") {
		fs.readFile("./stylesheets/style.css", "utf8", function (errors, contents) {
			response.writeHead(200, { "Content-type": "text/css" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/frozen.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/frozen.jpg", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/jpg" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/frozen2.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/frozen2.jpg", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/jpg" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/stitch.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/stitch.jpeg", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/jpg" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/movies/new") {
		fs.readFile("views/form.html", "utf8", function (errors, contents) {
			response.writeHead(200, { "Content-type": "text/html" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/theaters") {
		fs.readFile("views/theaters.html", "utf8", function (errors, contents) {
			response.writeHead(200, { "Content-type": "text/html" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/smf.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/smf.png", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/png" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/smsjdm.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/smsjdm.jpg", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/jpg" });
			response.write(contents);
			response.end();
		});
	} else if (request.url === "/images/ftc.jpg") {
		// notice we won't include the utf8 encoding
		fs.readFile("./images/ftc.jpg", function (errors, contents) {
			response.writeHead(200, { "Content-type": "image/jpg" });
			response.write(contents);
			response.end();
		});
	}

	// request didn't match anything:
	else {
		response.end("File not found!!!");
	}
});
// tell your server which port to run on
server.listen(6789);
// print to terminal window
console.log("Running in localhost at port 6789");
