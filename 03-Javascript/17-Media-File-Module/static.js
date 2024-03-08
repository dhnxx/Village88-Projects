const { get } = require("http");

module.exports = function (request, response) {
	const fs = require("fs");
	const path = require("path");

	let content = checkRequestType(path.extname(request.url));
	let utf8Check = "";
	// Check if the filetype is not image, assigning utf8
	if (content && content["fileType"] !== "img") {
		utf8Check = "utf8";
	}

	if (content) {
		const filePath = `.${request.url}`;
		fs.readFile(`${filePath}`, utf8Check, function (errors, contents) {
			if (errors) {
				response.end("File not found!!!");
			} else {
				response.writeHead(200, content["contentType"]);
				response.write(contents);
				response.end();
			}
		});
	} else {
		// If no corresponding file is found
		response.end("File not found!!!");
	}
};

function checkRequestType(url) {
	const fileTypes = {
		// Images
		".jpeg": { contentType: "image/jpeg", fileType: "img" },
		".jpg": { contentType: "image/jpg", fileType: "img" },
		".png": { contentType: "image/png", fileType: "img" },
		// CSS
		".css": { contentType: "stylesheet/style.css", fileType: "css" },
		// HTML
		".html": { contentType: "text/html", fileType: "html" },
	};

	if (fileTypes[url]) {
		return fileTypes[url];
	} else {
		return false;
	}
}
